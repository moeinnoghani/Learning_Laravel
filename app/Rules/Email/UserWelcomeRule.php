<?php

namespace App\Rules\Email;

class UserWelcomeRule implements IEmailParametersValidation
{

    private $request;

    public function __construct($request)
    {
//        dd($request);
        $this->request = $request;
    }

    public function validation()
    {
        $this->request->validate([
            'parameters.fullname'=>'required|string'
            ]
        );

        return true;

    }
}
