<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersRequest extends Request
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
            'name' => 'required',
            'password'=>'required | min:8',
            'email'=>'required',
            'role_id'=>'required',
            'is_active'=>'required',
            'photo_id'=>' mimes:jpeg,jpg,png | required  | max:1000'
        ];
    }
}
