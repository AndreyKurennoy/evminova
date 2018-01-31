<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'firstName' => "required",
            'lastName' => "required",
            'description' => "required",
            'photo' => "required"
        ];
    }

    public function messages()
    {
        return [
            'firstName.required' => 'Не указано имя!',
            'lastName.required' => 'Не указана фамилия!',
            'description.required' => 'Не указано описание!',
            'photo.required' => 'Не выбрано фото!'
        ];
    }
}
