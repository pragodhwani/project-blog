<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;


class CreatePostsRequest extends Request
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
            'category_id'=>'required',
            'title'=>'required',
            'body'=>'required',
            'photo_id'=>' mimes:jpeg,jpg,png | required  | max:1000'
        ];
    }
}
