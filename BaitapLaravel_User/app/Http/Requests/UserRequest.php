<?php

namespace App\Http\Requests;

use http\Client\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

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
            'user' => 'required|max:50',
            'username' => 'required|max:50',
            'email' => 'required|email:rfc,dns',
            'address' => 'max:250',
        ];
    }

    /** change message content
     * @return string[]
     */
    public function messages(){
        return [
            'user.required'       => 'Userを入力してください。',
            'user.max'            => 'Userを入力してくださいは50文字以下でお願いします。',
            'username.required'   => 'Usernameを入力してください。',
            'username.max'        => 'Usernameは50文字以下でお願いします。',
            'email.required'      => 'Emailを入力してください。',
            'email.email'         => '正しいEmailアドレスを入力してください。',
            'address.max'         => 'Addressは250文字以下でお願いします。',
        ];
    }
}
