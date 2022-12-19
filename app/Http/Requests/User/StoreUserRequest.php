<?php

namespace App\Http\Requests\User;

use App\Models\User;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // create middleware from kernel at here
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'string', 'max:255',
            ],
            'email' => [
                'required','email:dns','unique:users', 'max:255',
            ],
            'password' => [
                'min:8', 'string', 'max:255', 'mixedCase',
            ],
            // 'password_confirm' => [
            //     'same:password',
            // ],
        ];
    }
}
