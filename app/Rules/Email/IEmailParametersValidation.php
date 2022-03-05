<?php

namespace App\Rules\Email;

interface IEmailParametersValidation
{
    public function __construct($request);

    public function validation();
}
