<?php

namespace App\Http\Requests;

use App\Models\Professional;
use Illuminate\Foundation\Http\FormRequest;

class ProfessionalProfileUpdateRequest extends FormRequest
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
            'category_professional_id' => ['string', 'max:100'],
            'desc' => ['string'],
            'instagram' => ['string'],
            'facebook' => ['string'],
        ];

        $professional = Professional::where('user_id', auth()->user()->id)->first();

        // add conditional checking logo or banner was on database or not
        if (empty($professional) || !$professional?->logo) {
            $rules['logo'][] = 'required';
        }
        if (empty($professional) || !$professional?->banner) {
            $rules['banner'][] = 'required';
        }


        return $rules;
    }
}
