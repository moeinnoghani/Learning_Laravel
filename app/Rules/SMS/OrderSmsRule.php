<?php

class OrderSmsRule implements ISmsParametersValidation
{

    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function validate()
    {
        // TODO: Implement validate() method.
    }
}
