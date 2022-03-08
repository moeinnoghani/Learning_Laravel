<?php

class LoginSmsRule implements ISmsParametersValidation
{

    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function validate()
    {
        $this->request->validate([
            'parameters.time' => 'required',
        ]);
    return true;
    }
}
