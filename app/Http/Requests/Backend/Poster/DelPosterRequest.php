<?php

namespace App\Http\Requests\Backend\Poster;

use Illuminate\Foundation\Http\FormRequest;

class DelPosterRequest extends FormRequest
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
            'id' => ['required'],
            'film_id' => ['required'],
            'path_sm' => ['required'],
            'path_lg' => ['required']
        ];
    }
}
