<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StroreUserRequest extends FormRequest
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
<<<<<<< HEAD
        return
        [
            'id'=>'required',
            'user'=>'required',
            'username'=>'required',
            'email'=>'required'

=======
        return [
            'user' => 'required|max:50',
            'username' => 'required|max:50',
            'email' => 'required|email:rfc,dns',
            'address' => 'max:50',
>>>>>>> 95cf131e3637e8226d357a748c20143d51ec004d
        ];
    }
}
