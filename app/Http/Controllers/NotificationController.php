<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Rules\TemplateRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function send(Request $request)
    {

        $request->validate([
            'email' => 'required|array',
            'email.*' => 'email',
            'parameters' => 'required|array',
            'template' => ['required','string',new TemplateRule($request)],
        ]);


        SendEmailJob::dispatch($request->all());


    }
}
