<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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

            'name'=> ['required', 'max:200'],
            'price'=> ['required', 'numeric', 'min:0'],
            'category'=> ['required', 'string'],
            'image_one'=> ['image', 'max:1024'],
            'image_two'=> ['image', 'max:1024'],
            'image_three'=> ['image', 'max:1024'],
            'image_four'=> ['image', 'max:1024'],
            'description'=> ['required', 'min:10']

        ];
    }
}
