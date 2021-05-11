<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
        if ($this->isMethod("POST")) {
            return [
                'name_en' => ['required', 'min:2', 'max:30'],
                'name_ar' => ['required', 'min:2', 'max:30'],
                'coordinate' => ['nullable', 'max:50'],
                'published' => ['required', 'in:0,1'],
            ];
        } elseif ($this->isMethod("PUT") || $this->isMethod("PATCH")) {
            return [
                'name_en' => ['sometimes', 'min:2', 'max:30'],
                'name_ar' => ['sometimes', 'min:2', 'max:30'],
                'coordinate' => ['sometimes' , 'nullable', 'max:50'],
                'published' => ['sometimes', 'in:0,1'],
            ];
        }
        return [];
    }
}
