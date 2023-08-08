<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVendorRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:15'],
            'description' => ['required', 'string', 'max:100'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Vendor tidak boleh kosong',
            'name.max' => 'Nama Vendor tidak boleh lebih dari 15 karakter',
            'description.required' => 'Deskripsi tidak boleh kosong',
            'description.max' => 'Deskripsi tidak boleh lebih dari 100 karakter',
        ];
    }
}
