<?php

namespace App\Rules;

use App\Rules\Email\IEmailParametersValidation;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class SmsRule implements Rule
{
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
        $ruleClassPath = 'App\Rules\Email\\' . Str::studly($this->request->type) . 'Rule';
        if (class_exists($ruleClassPath)) {
            $typeRule = new $ruleClassPath($this->request);
            if ($typeRule instanceof IEmailParametersValidation) {
                return $typeRule->validation();
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
        return 'The validation error message.';
    }
}
