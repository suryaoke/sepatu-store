<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimUpdateRequest extends FormRequest
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
            'nama' => ['required', 'max:255'],
            'motivasi' => ['required', 'max:65535'],
            'jabatan' => ['required', 'max:255'],
            'foto' => [
                'file', // Ensures it is a file
                'mimes:jpg,jpeg,png', // Restrict the file types
                'max:4096', // Max file size is 4096KB, which equals 4MB
            ],

        ];
    }
}
