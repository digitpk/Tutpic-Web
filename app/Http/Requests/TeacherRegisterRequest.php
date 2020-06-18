<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRegisterRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed',
            'subjects'=>'required|array|min:1',
            'levels'=>'required|array|min:1',
        ];
    }

    public function attributes()
    {
        return [
            'levels'=>'classes',
        ];
    }
}
