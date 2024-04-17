<?php

namespace App\Http\Requests;

use App\Models\Store;
use Illuminate\Foundation\Http\FormRequest;

class StoreMyStoreUpdateRequest extends FormRequest
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
            'category_store_id' => ['string', 'max:100'],
            'desc' => ['string'],
            'instagram' => ['string'],
            'facebook' => ['string'],
        ];

        $store = Store::where('user_id', auth()->user()->id)->first();

        // add conditional checking logo or banner was on database or not
        if (empty($store) || !$store?->logo) {
            $rules['logo'][] = 'required';
        }
        if (empty($store) || !$store?->banner) {
            $rules['banner'][] = 'required';
        }


        return $rules;
    }
}
