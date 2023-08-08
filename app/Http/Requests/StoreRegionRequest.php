<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegionRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:regions',
            'code' => 'required|string|max:6|unique:regions',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Region tidak boleh kosong',
            'name.max' => 'Nama Region tidak boleh lebih dari 255 karakter',
            'name.unique' => 'Nama Region sudah ada',
            'code.required' => 'Kode Region tidak boleh kosong',
            'code.max' => 'Kode Region tidak boleh lebih dari 6 karakter',
            'code.unique' => 'Kode Region sudah ada',
        ];
    }
}
