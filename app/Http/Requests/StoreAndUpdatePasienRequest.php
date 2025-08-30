<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAndUpdatePasienRequest extends FormRequest
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
            'rumah_sakit' => 'required',
            'telepon' => 'nullable|string|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama pasien wajib diisi.',
            'nama.max' => 'Nama pasien maksimal 100 karakter.',
            'rumah_sakit.required' => 'Rumah sakit wajib diisi',
            'telepon.max' => 'Nomor telepon maksimal 20 karakter.',
        ];
    }
}
