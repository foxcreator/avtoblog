<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateArticleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:6|max:40|unique:articles',
            'subtitle' => 'required|min:6|max:200',
            'text' => 'required|min:40',
            'image' => 'required',
            'to_slider' => 'required',
            'user_id' => 'required',
        ];
    }
}
