<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminAdvertUpdateRequest extends FormRequest
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
        return [
            'home_top_bar_advert' => ['nullable', 'image', 'max:10000'],
            'home_middle_page_advert' => ['nullable', 'image', 'max:10000'],
            'news_details_page_advert' => ['nullable', 'image', 'max:10000'],
            'news_page_advert' => ['nullable', 'image', 'max:10000'],
            'side_bar_advert' => ['nullable', 'image', 'max:10000'],
            'home_top_bar_advert_url' => ['nullable', 'url'],
            'home_middle_page_advert_url' => ['nullable', 'url'],
            'news_details_page_advert_url' => ['nullable', 'url'],
            'news_page_advert_url' => ['nullable', 'url'],
            'side_bar_advert_url' => ['nullable', 'url'],
        ];
    }
}
