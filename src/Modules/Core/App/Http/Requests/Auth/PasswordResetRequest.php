<?php

namespace Modules\Core\App\Http\Requests\Auth;


use Modules\Core\App\Http\Requests\BaseRequest;

class PasswordResetRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|exists:users',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email address is required',
            'email.email' => 'Invalid email address'
        ];
    }
}
