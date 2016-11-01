<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequestUpdate extends FormRequest
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
       $id = $this->upload;
    

        return [

            'deskripsi' => 'required|unique:pictures,deskripsi,'.$id.'|max:255',



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