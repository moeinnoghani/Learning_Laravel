<?php

namespace App\Repositories;

use App\Models\SMS;

class SMSRepository
{

    private SMS $model;

    public function __construct()
    {
        $this->model = new SMS();
    }

}
