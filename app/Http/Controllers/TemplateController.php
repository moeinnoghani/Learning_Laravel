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

    public function store(Request $request)
    {
        $validatedRequest = $request->validate([
            'name' => 'required|string|unique:templates,name',
            'view_map' => 'nullable|string',
            'subject' => 'required|string',
            'is_active' => 'integer'
        ]);

        return new TemplateResource($this->templateRepository->create($validatedRequest));
    }

    public function update(Request $request, Template $template_id)
    {
        $validatedRequest = $request->validate([
            'name' => 'required|string',
            'view_map' => 'nullable|string',
            'subject' => 'string',
            'is_active' => 'integer'
        ]);

        return new TemplateResource($this->templateRepository->update($template_id, $validatedRequest));

    }

}
