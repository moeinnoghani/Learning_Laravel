<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Rules\TemplateValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function send(Request $request)
    {

        $request->validate([
            'email' => 'required|array',
            'email.*' => 'email',
            'fullname' => 'required|string',
            'parameters' => 'required|array',
            'template' => ['required','string',new TemplateValidation]
        ]);


        SendEmailJob::dispatch($request);


    }
}
