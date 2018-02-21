<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 21.02.18
 * Time: 9:52
 */

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'name' => "required",
            'email' => "required|email",
            'body' => "required",
            'problem' => "required",
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Не указан email!',
            'email.email' => 'Email указан не верно!',
            'name.required' => 'Не указано имя!',
            'body.required' => 'Не указан текст отзыва!',
            'problem.required' => 'Не указана проблема!'
        ];
    }
}