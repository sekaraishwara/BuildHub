<?php

namespace App\Http\Requests;

use App\Models\Vendor;
use Illuminate\Foundation\Http\FormRequest;

class VendorProfileUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'logo' => ['image', 'max:1500'],
            'banner' => ['image', 'max:1500'],
            'name' => ['required', 'string', 'max:100'],
            'category_vendor_id' => ['string', 'max:100'],
            'desc' => ['string'],
            'instagram' => ['string'],
            'facebook' => ['string'],
        ];

        $vendor = Vendor::where('user_id', auth()->user()->id)->first();

        // add conditional checking logo or banner was on database or not
        if (empty($vendor) || !$vendor?->logo) {
            $rules['logo'][] = 'required';
        }
        if (empty($vendor) || !$vendor?->banner) {
            $rules['banner'][] = 'required';
        }


        return $rules;
    }
}
