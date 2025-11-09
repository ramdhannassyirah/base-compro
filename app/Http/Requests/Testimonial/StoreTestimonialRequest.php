<?php

namespace App\Http\Requests\Testimonial;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonialRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:255'],
            'stars' => ['required', 'integer', 'min:1', 'max:5'],
        ];
    }


    public function message(): array
    {
        return [
            'name.required' => 'Name is required',
            'position.required' => 'Position is required',
            'content.required' => 'Content is required',
            'stars.required' => 'Stars is required',
        ];
    }
}
