<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;

class CustomerProfileUpdateRequest extends FormRequest
{

    public function rules(): array
    {
        $rules = [
            'logo' => ['image', 'max:1500'],
            'banner' => ['image', 'max:1500'],
            'name' => ['required', 'string', 'max:100'],
            'desc' => ['string'],
            'instagram' => ['string'],
            'facebook' => ['string'],
        ];

        $customer = Customer::where('user_id', auth()->user()->id)->first();

        // add conditional checking logo or banner was on database or not
        if (empty($customer) || !$customer?->logo) {
            $rules['logo'][] = 'required';
        }
        if (empty($customer) || !$customer?->banner) {
            $rules['banner'][] = 'required';
        }


        return $rules;
    }
}
