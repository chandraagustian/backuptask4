<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
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
      $id = $this->pages;

        return [

            'deskripsi' => 'required|unique:pictures,deskripsi,'.$id.'|max:255',

            'foto' => 'required',

        ];

    }

    public function messages()

    {

        return [

           'deskripsi.required' => 'Title is required, at least fill a character',

            'deskripsi.unique' => 'deskripsi must unique, take another deskripsi'
            

        ];

    }
}