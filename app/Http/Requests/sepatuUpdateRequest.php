<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sepatuUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => ['required',  'max:255'],
            'harga' => ['required', 'max:255'],
            'ket' => ['required', 'max:65535'],
            'stock' => ['required', 'max:255'],
            'popular' => ['required', 'max:255'],
            'brands_id' => ['required'],
            'kategori_id' => ['required'],
            'foto' => [

                'array', // Pastikan 'foto' berupa array
            ],
            'berat' => ['required'],

        ];
    }
}
