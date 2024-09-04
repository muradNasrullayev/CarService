<?php

namespace App\Http\Requests\Admin\Service;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'our_services_name' => 'required|max:255',
            'icon'=>'required|max:255',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description_title' => 'required|max:255',
            'description'=>'required|max:255',


        ];
    }
}
