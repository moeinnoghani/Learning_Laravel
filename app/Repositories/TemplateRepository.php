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

    public function get()
    {

    }

    public function getTemplateByName(string $template)
    {
//        return $this->model->where('template_name',$template)->first();
        return $this->model->whereName($template)->first();
    }


}
