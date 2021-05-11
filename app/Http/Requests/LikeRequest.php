<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LikeRequest extends FormRequest
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
                'ad_id' => 'sometimes|numeric',
                'user_id' => 'sometimes|numeric',
            ];
        } elseif ($this->isMethod("PUT") || $this->isMethod("PATCH")) {
            return [
                'ad_id' => 'sometimes|numeric',
                'user_id' => 'sometimes|numeric',
            ];
        }
        return [];
    }

}
