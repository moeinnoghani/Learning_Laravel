<?php

namespace App\Http\Controllers;

use App\Models\Cycle;
use App\Models\Service;
use App\Models\User;
use App\Repositories\CycleRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private UserRepository $userRepository;
    private CycleRepository $cycleRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->cycleRepository = new CycleRepository();
    }

    public function getServicesHours(Request $request, $user_id)
    {
        $user = $this->userRepository->getUser($user_id);
        $activeServices = $this->getActiveServices($user_id);

        $credit = $user->credit;
        $cycles = $this->cycleRepository->getCycle();

        $hour = 0;
        $totalAmount = 0;

        $totalAmount = $this->getTotalAmount($activeServices, $totalAmount, $cycles);
        list($hour, $credit) = $this->getHours($credit, $totalAmount);
        $serviceArrays = $this->setHours($activeServices, [], $hour);

        $totalAmount = 0;
        while (true) {
            $activeServices->each(function ($service) use (&$totalAmount, &$cycles, $credit, &$activeServices) {
                if ($cycles[$service->product_id] + $totalAmount <= $credit) {
                    $totalAmount += $cycles[$service->product_id];
                } else {
                    $activeServices = $activeServices->where('id', '<>', $service->id);
                }
            });


            if ($totalAmount == 0) {
                break;
            }

            list($hour, $credit) = $this->getHours($credit, $totalAmount);

            $serviceArrays = $this->setHours($activeServices, $serviceArrays, $hour);
            $totalAmount = 0;
        }
        dd($serviceArrays);

    }


    private function setHours($activeServices, array $array, int $hour)
    {
        $activeServices->each(function ($service) use (&$hour, &$array) {
            $array[$service->id] = ($array[$service->id] ?? 0) + $hour;
        });
        return $array;
    }

    private function getHours(int $credit, int $totalAmount)
    {
        $hour = (int)($credit / $totalAmount);
        $credit = $credit % $totalAmount;

        return array($hour, $credit);
    }

    private function getActiveServices($user)
    {
        return $this->userRepository->getActiveServices($user);
    }

    private function getTotalAmount($activeServices, $totalAmount, $cycles)
    {
        $activeServices->each(function ($service) use (&$totalAmount, $cycles) {
            $totalAmount += $cycles[$service->product_id];
        });
        return $totalAmount;
    }
}
