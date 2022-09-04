<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
          'title' =>  ['required', 'string', 'max:244'],
          'description' =>  ['required', 'string', 'max:244'],
          'category_id' =>  ['required', 'string', 'exists:categories,id'],
        ];
    }

    public function messages()
    {
    return 
       [ 'title.required' =>  'The title field is required', 
         'description.required' => 'The description field is required',
         'category_id.required' => 'Please select a  category for the post',
    ];

    }
}
