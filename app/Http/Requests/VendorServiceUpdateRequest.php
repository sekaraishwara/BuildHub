<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorServiceUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'image' => ['image', 'max:1500'],
            'name' => ['required', 'string', 'max:255'],
            'category' => ['string', 'max:100'],
            'desc' => ['required', 'string', 'max:150'],
            'status' => ['required', 'string', 'max:150'],
            'price' => ['required', 'string', 'max:250'],
        ];

        return $rules;
    }
}
