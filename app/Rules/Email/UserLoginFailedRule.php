<?php

namespace App\Rules\Email;

class UserLoginFailedRule implements IEmailParametersValidation
{

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function validation()
    {
        $this->request->validate([
            'parameters.fullname' => 'required|string',
            'parameters.tries' => 'required|integer'
        ]);

        return true;
    }
}
