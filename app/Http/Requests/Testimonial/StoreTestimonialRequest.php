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


    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'position.required' => 'Jabatan / Perusahaan tidak boleh kosong',
            'content.required' => 'Pesan tidak boleh kosong',
            'stars.required' => 'Bintang tidak boleh kosong',
        ];
    }
}