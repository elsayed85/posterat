<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
//            'phone' => 'required|digits:8|unique:users,phone,'.$this -> id,
//            'email'  => 'required|email|unique:users,email,'.$this -> id,
            'password' => ['nullable','string', 'min:8', 'confirmed',
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/'],      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            'bio' => 'nullable|max:150',
           // 'password_confirmation' => 'required|same:password'
            // required and has to match the password field

        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'الاسم الاول مطلوب.',
            'last_name.required' => 'الاسم الاخير مطلوب.',
            'phone.digits' => 'رقم الهاتف لابد أن يكون 8 أرقام',
            'email.required' => 'البريد الالكتروني مطلوب.',
            'email.unique' => 'البريد الالكتروني مسجل من قبل.',
            'password_confirmation.confirmed' => 'إعادة كلمة المرور غير متوافقة',
        ];
    }
}
