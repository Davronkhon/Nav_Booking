<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Time implements Rule
{
    public function passes($attribute, $value)
    {
        return preg_match('/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/', $value);
    }

    public function message()
    {
        return 'The :attribute is not a valid time.';
    }
}
