<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KontakUpdateRequest extends FormRequest
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
            'alamat' => ['required', 'max:65535'],
            'email' => ['required', 'max:255'],
            'no_hp' => ['required', 'max:255'],

        ];
    }
}
