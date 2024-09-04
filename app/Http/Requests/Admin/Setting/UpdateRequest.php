<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'email' => 'string|max:100',
            'mobile' => 'string|max:20',
            'phone' => 'string|max:20',
            'fb_url' => 'string|max:100',
            'yt_url' => 'string|max:255',
            'tlg_url' => 'string|max:100',
            'address' => 'string|max:255'
        ];
    }
}
