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

    public function getActiveServices(User $user)
    {
        return Service::where('status', Service::STATUS_ACTIVE)->where('expired_at', '<', now())->get();
    }

    public function getUser($user_id)
    {
        return $this->model->whereId($user_id)->first();
    }


}
