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
}
