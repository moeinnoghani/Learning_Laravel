<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    private TemplateController $templateController;

    public function __construct()
    {
        $this->templateController = new TemplateController();
    }

    public function index()
    {

    }
}
