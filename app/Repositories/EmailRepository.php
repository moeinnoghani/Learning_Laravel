<?php

namespace App\Repositories;

use App\Models\Email;

class EmailRepository
{

    private Email $model;

    public function __construct()
    {
        $this->model = new Email();
    }

    public function create($request)
    {
        $request['status'] = Email::STATUS_PENDING;
        return $this->model->create($request);
    }

    public function getPending($limit = 5)
    {
        return $this->model->where('status', Email::STATUS_PENDING)->limit($limit)->get();
    }
}
