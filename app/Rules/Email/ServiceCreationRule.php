<?php

namespace App\Rules\Email;

class ServiceCreationRule implements IEmailParametersValidation
{

    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function validation()
    {
        $this->request->validate([
                'parameters.service_id' => 'required|integer',
                'subject_parameters.service_id' => 'required|integer',
            ]
        );
        return true;
    }
}
