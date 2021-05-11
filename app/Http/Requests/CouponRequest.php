<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
                'promo_code' => 'required|max:10',
                'discount_type' => 'required|in:percent,value',
                'discount_limit' => 'required|max:8|numeric',
                'discount_value' => 'required|max:8|numeric',
                'user_id' => 'required|numeric',
            ];
        } elseif ($this->isMethod("PUT") || $this->isMethod("PATCH")) {
            return [
                'promo_code' => 'sometimes|max:10',
                'discount_type' => 'sometimes|in:percent,value',
                'discount_limit' => 'sometimes|max:8|numeric',
                'discount_value' => 'sometimes|max:8|numeric',
                'user_id' => 'sometimes|numeric',
            ];
        }
        return [];
    }
}
