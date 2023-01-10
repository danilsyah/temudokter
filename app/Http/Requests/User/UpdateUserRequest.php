<?php

namespace App\Http\Requests\User;

use App\Models\User;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use Gate;
// this rule only at update request
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // create middleware from kernel at here
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
                'required','email:dns', 'max:255', Rule::unique('users')->ignore($this->user)
                // Rule unique only work for other record id
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
