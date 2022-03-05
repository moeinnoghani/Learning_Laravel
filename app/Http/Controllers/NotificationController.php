<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Repositories\TemplateRepository;
use App\Rules\TemplateRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    private TemplateRepository $templateRepository;

    public function __construct(TemplateRepository $templateRepository)
    {
        $this->templateRepository = new TemplateRepository();
    }

    public function send(Request $request)
    {

        $request->validate([
            'email' => 'required|array',
            'email.*' => 'email',
            'parameters' => ['required', 'array', new TemplateRule($request)],
            'template' => ['required', 'string', 'exists:templates,name'],
            'subject_parameters' => 'array'
        ]);

        $template = $this->templateRepository->getTemplateByName($request->template);

       if (!$template->is_active){
         return  response()->json(
               [
                   'errors'=>[
                       'status_code' =>'403',
                       'title'=>'inactive template',
                       'description'=>'your chosen template is not active'
                   ]
               ]
           );
       }


        SendEmailJob::dispatch($template->toArray(),$request->all());


    }
}
