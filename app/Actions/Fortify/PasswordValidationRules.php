<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Rules\Password;
use Illuminate\Validation\Rules\Password as Pass;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    protected function passwordRules()
    {
        // password minimal 8 characters mengandung angka, huruf besar dan kecil
        return ['required', 'string', new Password, 'confirmed', Pass::min(8)->numbers()->mixedCase()];
    }
}
