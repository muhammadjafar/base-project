<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class FileUpdate implements Rule
{
    protected $rule = [];
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($rule)
    {
        $this->rule = $rule;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $imageValidator = Validator::make([$attribute => $value], [
            $attribute => $this->rule,
        ]);
        $stringValidator = Validator::make([$attribute => $value], [
            $attribute => ['string'],
        ]);
        if ($imageValidator->fails() && $stringValidator->fails()) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute not valid.';
    }
}
