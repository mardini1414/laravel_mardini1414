<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAndUpdateRumahSakitRequest extends FormRequest
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
            'nama' => 'required|string|max:100',
            'alamat' => 'nullable|string|max:255',
            'email' => 'required|email|max:100|unique:rumah_sakit,id',
            'telepon' => 'nullable|string|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama rumah sakit wajib diisi.',
            'nama.max' => 'Nama rumah sakit maksimal 100 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'telepon.max' => 'Nomor telepon maksimal 20 karakter.',
        ];
    }
}
