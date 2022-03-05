<?php

namespace App\Rules;

use App\Rules\Email\IEmailParametersValidation;
use http\Exception\RuntimeException;
use Illuminate\Contracts\Validation\Rule;

//use Psy\Util\Str;
use \Illuminate\Support\Str;

class TemplateRule implements Rule
{


    private $request;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
//dd($value);
        $ruleClassPath = 'App\Rules\Email\\' . Str::studly($this->request->template) . 'Rule';
        if (class_exists($ruleClassPath)) {
            $templateRule = new $ruleClassPath($this->request);
            if ($templateRule instanceof IEmailParametersValidation) {
                return $templateRule->validation();
            }
        } else {
            return false;
        }


    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'this template is not supported';
    }
}
