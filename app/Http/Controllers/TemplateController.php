<?php

namespace App\Http\Controllers;

use App\Http\Resources\TemplateResource;
use App\Models\Template;
use App\Repositories\TemplateRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TemplateController extends Controller
{

    private TemplateRepository $templateRepository;

    public function __construct()
    {
        $this->templateRepository = new TemplateRepository();
    }

    public function index()
    {
        return TemplateResource::collection($this->templateRepository->index(false));

    }


    public function get(Template $template_id)
    {

//        return new TemplateResource($this->templateRepository->get($template_id));
        return new TemplateResource($template_id);

    }

}
