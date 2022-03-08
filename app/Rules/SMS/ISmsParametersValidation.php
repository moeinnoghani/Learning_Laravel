<?php

interface ISmsParametersValidation
{
    public function __construct($request);

    public function validate();

}
