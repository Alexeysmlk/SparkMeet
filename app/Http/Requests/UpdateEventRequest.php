<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:5', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'category' => ['required', 'exists:categories,id'],
            'description' => ['nullable', 'string'],
            'city' => ['required', 'exists:cities,id'],
            'date' => 'required|date_format:m/d/Y|after_or_equal:tomorrow',
            'time' => 'required|date_format:H:i',
            'tags' => ['nullable', 'array', 'max:3'],
            'tags.*' => ['required', 'exists:tags,id'],
        ];
    }
}
