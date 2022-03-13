<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function getServicesHours(Request $request,User $id)
    {
//        $users = $this->userRepository->getUser($id);

        $activeServices = $this->getActiveServices($id);
        dd($activeServices);

    }


    private function setHours($activeServices, array $array, int $hour)
    {
        $activeServices->each(function ($service) use ($hour, &$array) {
            $array[$service->id] = ($array[$service->id] ?? 0);
        });

        return $array;
    }

    private function getHours(int $credit, int $totalAmount)
    {
        $hour = int($credit / $totalAmount);
        $newCredit = $credit % $totalAmount;

        return array($hour, $newCredit);
    }

    private function getActiveServices(User $user)
    {
//        return Service::where('status', Service::STATUS_ACTIVE)->where('expired_at', '<', now())->get();

//        dd($this->userRepository->getActiveServices($user));
        return $this->userRepository->getActiveServices($user);
    }
}
