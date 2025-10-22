<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlumniRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Otorisasi berdasarkan permission Spatie
        return $this->user()->can('manage alumni');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_lengkap' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'jurusan' => 'required|string|max:100',
            'tahun_mulai' => 'required|digits:4|integer|min:1990',
            'tahun_selesai' => 'required|digits:4|integer|min:1990|after_or_equal:tahun_mulai',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            'hasil_karya' => 'nullable|file|mimes:pdf,zip,doc,docx|max:5120', // Max 5MB
        ];
    }
}