<?php

namespace App\Http\Requests\Backend\Film;

use Illuminate\Foundation\Http\FormRequest;

class AddNameFilmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->request->set(
            'name',
            app()->PrepareTextForDb->text($this->request->get('name'))
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => [],
            'name' => 'required',
        ];
    }
}
