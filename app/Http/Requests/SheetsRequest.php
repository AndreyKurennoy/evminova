<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SheetsRequest extends FormRequest
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
            'title' => "required",
            'body' => "required",
            'slug' => "required",
            'meta_description' => "required",
            'meta_keywords' => "required",
            'seo_title' => "required"

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Не указан заголовок страницы!',
            'slug.required' => 'Не указана ссылка страницы!',
            'body.required' => 'Не указан контент страницы!',
            'meta_description.required' => 'Не указано мета описание страницы!',
            'meta_keywords.required' => 'Не указаны мета ключи страницы!',
            'seo_title.required' => 'Не указан title страницы!',
        ];
    }
}