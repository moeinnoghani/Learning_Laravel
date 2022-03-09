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


    public function getTemplateByName(string $template)
    {
//        return $this->model->where('template_name',$template)->first();
        return $this->model->whereName($template)->first();
    }

    public function index($actives = true)
    {
        if ($actives) {
            return $this->model->where('is_active', $actives)->get();
        } else {
            return $this->model->all();
        }
    }

    public function get($template_id)
    {
        return $this->model->whereId($template_id)->first();
    }

    public function create($request)
    {
        return $this->model->create($request);
    }

    public function update(Template $template, $fieldsForUpdate)
    {
        return tap($template)->update($fieldsForUpdate);

    }

}
