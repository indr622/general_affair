<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50'],
            'code' => ['required', 'string', 'max:5', 'unique:branches'],
            'description' => ['required', 'string', 'max:100'],
            'region_id' => ['required', 'integer'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Cabang tidak boleh kosong',
            'name.max' => 'Nama Cabang tidak boleh lebih dari 50 karakter',
            'code.required' => 'Kode Cabang tidak boleh kosong',
            'code.max' => 'Kode Cabang tidak boleh lebih dari 5 karakter',
            'code.unique' => 'Kode Cabang sudah ada',
            'description.required' => 'Deskripsi tidak boleh kosong',
            'description.max' => 'Deskripsi tidak boleh lebih dari 100 karakter',
            'region_id.required' => 'Region tidak boleh kosong',
            'region_id.integer' => 'Region harus berupa angka',
        ];
    }
}
