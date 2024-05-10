<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AlphaAsciiWithSpaces implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        if (!preg_match('/^[a-zA-Z\s]+$/', $value)){
            $fail('The field :attribute must contain just alphabetics characters and spaces');
        }
    }

}
