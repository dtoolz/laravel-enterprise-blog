<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLanguageUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $languageId = $this->route('language');
        return [
            'lang' => ['required', 'max:255', 'unique:languages,lang,'.$languageId],
            'name' => ['required', 'max:255'],
            'slug' => ['required', 'max:255', 'unique:languages,slug,'.$languageId],
            'default' => ['required', 'boolean'],
            'status' => ['required', 'boolean']
        ];
    }
}
