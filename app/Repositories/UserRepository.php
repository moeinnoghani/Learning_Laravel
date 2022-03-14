<?php

namespace App\Repositories;

use App\Models\User;

use App\Models\Service;

class UserRepository
{
    private User $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function getActiveServices($user)
    {
        return $this->getUser($user)
            ->services()
            ->where('status', Service::STATUS_ACTIVE)
            ->orderBy('expired_at')->get();
    }

    public function getUser($user_id)
    {
        return $this->model->with(['services'])->whereId($user_id)->first();
    }


}
