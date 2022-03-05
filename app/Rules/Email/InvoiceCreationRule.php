<?php

namespace App\Rules\Email;

class InvoiceCreationRule implements IEmailParametersValidation
{

    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function validation()
    {
        $this->request->validate([
            'parameters.fullname' => 'required|string',
            'parameters.invoice_id' => 'required|integer',

        ]);
        return true;
    }
}
