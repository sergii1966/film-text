<?php

namespace App\Http\Requests\Backend\Poster;

use Illuminate\Foundation\Http\FormRequest;

class AddPosterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function getRedirectUrl()
    {
        return parent::getRedirectUrl() . '#edit-images-film';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'poster' => ['required', 'mimes:jpeg,jpg,png,webp','max:10000000000'],
            'film_id' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
                'poster.required' => __('Виберіть зображення'),
                'poster.mimes' => __('Невірний формат'),
        ];
    }
}
