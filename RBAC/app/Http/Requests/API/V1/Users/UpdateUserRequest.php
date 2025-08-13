<?php

namespace App\Http\Requests\API\V1\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $this->user->id,
            'password' => 'sometimes|required|string|min:6',
        ];
    }
}
