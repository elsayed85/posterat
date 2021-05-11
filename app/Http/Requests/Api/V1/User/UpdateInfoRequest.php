<?php

namespace App\Http\Requests\Api\V1\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'first_name' => ['sometimes', 'string', 'max:150'],
            'last_name' => ['sometimes', 'string', 'max:150'],
            'phone' => ['sometimes', 'numeric', 'digits:8', 'unique:users,phone,' . auth()->id() . ',id'],
            'email' => ['sometimes', 'string', 'email', 'max:150', 'unique:users,email,' . auth()->id() . ',id'],
            'bio' => ['sometimes', 'nullable', 'string', 'max:150'],
            'whatsapp' => ['sometimes', 'nullable', 'integer'],
        ];
    }
}
