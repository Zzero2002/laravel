<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:3','unique:posts'],
            'description' => ['required', 'min:10'],
            'post_creator' =>['required'],
            'image'=>['image','mimes:png,jpg','max:2048']
        ];
    }

   /**
 * Get the error messages for the defined validation rules.
 *
  * @return array
  */
// public function messages()
// {
//     return [
//            'title.required' => 'my custom validation error message',
//             'title.min' => 'we have made override for min'
//     ];
// }

}
