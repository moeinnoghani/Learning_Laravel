<?php

namespace App\Repositories;

use App\Models\Template;

class TemplateRepository
{

    private Template $model;

    public function __construct()
    {
        $this->model = new Template();
    }

}
