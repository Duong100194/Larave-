<?php

namespace App\Http\Requests;

use http\Client\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class CreateUserRequest extends FormRequest
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
    public function rules(Request $request)
    {
//        return [
//            'user' => 'required|max:50',
//            'username' => 'required|max:50',
//            'email' => 'required|email:rfc,dns',
//            'address' => 'max:250',
//        ];
        try {
            $this->validate($request, [
                'user' => 'required|max:50',
                'username' => 'required|max:50',
                'email' => 'required|email:rfc,dns',
                'address' => 'max:250',
            ]);
            return response()->json([
                'status' => 'success',
                'msg'    => 'Okay',
            ], 201);
        }
        catch (ValidationException $exception) {
            return response()->json([
                'status' => 'error',
                'msg'    => 'Error',
                'errors' => $exception->errors(),
            ], 422);
        }
    }
}
