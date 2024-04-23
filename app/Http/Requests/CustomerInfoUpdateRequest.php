<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerInfoUpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'alamat' => ['required', 'string', 'max:255'],
            'kota' => ['string', 'max:100'],
            'provinsi' => ['string', 'max:100'],
            'kodepos' => ['required', 'string', 'max:50'],
        ];
    }
}
