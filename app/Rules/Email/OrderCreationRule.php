<?php

namespace App\Rules\Email;

class OrderCreationRule implements IEmailParametersValidation
{

    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function validation()
    {
        $this->request->validate([
            'parameters.order_id' => 'required|integer',
            'subject_parameters.order_id' => 'required|integer'
        ]);
        return true;
    }
}
