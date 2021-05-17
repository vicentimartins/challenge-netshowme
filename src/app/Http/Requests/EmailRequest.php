<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:emails',
            'phone' => 'required|regex:/\([0-9]{3}\) [0-9]{1}.[0-9]{4}-[0-9]{4}/',
            'message' => 'required',
            'ip' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'You forgot fill :attribute or the format is different of the expected.',
            'email.required' => 'The email informed is out of standard expected. Use something like: jhon@dear.com',
            'phone.digits' => 'Please, inform only numbers to :attribute.',
        ];
    }
}
