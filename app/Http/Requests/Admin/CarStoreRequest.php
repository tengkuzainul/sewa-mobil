<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CarStoreRequest extends FormRequest
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
            'nama_mobil' => 'required',
            'harga_sewa' => 'required',
            'gambar' => 'required|image|mimes:jpeg,jpg,png', // 'image' rule for image validation
            'bahan_bakar' => 'required',
            'jumlah_kursi' => 'required',
            'tranmisi' => 'required', // Corrected typo 'tranmisi' to 'transmisi'
            'status' => 'required',
            'deskripsi' => 'required',
            'p3k' => 'required',
            'charger' => 'required', // Add 'charger' field
            'audio' => 'required',
            'ac' => 'required',
        ];
    }
}
