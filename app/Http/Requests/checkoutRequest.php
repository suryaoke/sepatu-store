<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class checkoutRequest extends FormRequest
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
            'trx_id' => ['required', 'max:255'],
            'total_sepatu' => ['required'],
            'total_harga' => ['required'],
            'sepatu_id' => ['required'],
            'user_id' => ['required'],
            'size_id' => ['required'],
        ];
    }
}
