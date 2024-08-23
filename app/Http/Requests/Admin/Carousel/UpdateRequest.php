<?php

namespace App\Http\Requests\Admin\Carousel;

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
            'title'=> 'required|string',
            'description'=> 'required|string',
            'image'=> 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'background_image'=> 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
