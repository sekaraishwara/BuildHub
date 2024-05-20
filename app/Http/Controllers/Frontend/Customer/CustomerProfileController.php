<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Models\Customer;
use App\Models\Province;
use App\Models\Regencie;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\FileUploadTrait;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CustomerInfoUpdateRequest;
use App\Http\Requests\CustomerProfileUpdateRequest;

class CustomerProfileController extends Controller
{
    use FileUploadTrait; //inject here

    public function profile(Request $request): View
    {
        $customerInfo = Customer::where('user_id', auth()->user()->id)->first();

        $provinces = Province::all();
        $regencies = Regencie::all();


        return view('frontend._customer-dashboard._profile', compact('customerInfo', 'provinces', 'regencies'));
    }

    public function updateCustomerProfile(CustomerProfileUpdateRequest $request): RedirectResponse
    {
        $logoPath = $this->uploadFile($request, 'logo');
        $bannerPath = $this->uploadFile($request, 'banner');

        $data = [];
        if (!empty($logoPath)) $data['logo'] = $logoPath;
        if (!empty($bannerPath)) $data['banner'] = $bannerPath;

        $data['name'] = $request->name;
        $data['desc'] = $request->desc;
        $data['instagram'] = $request->instagram;
        $data['facebook'] = $request->facebook;

        Customer::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $data
        );


        notify()->success('Updated Successfully⚡️', 'Success!');

        return redirect()->back();
    }

    function getRegencyOfprovince(string $provinceId)
    {

        $regencies = Regencie::select(['id', 'name', 'province_id'])->where('province_id', $provinceId)->get();
        return response($regencies);
    }

    function updateCustomerInfo(CustomerInfoUpdateRequest  $request): RedirectResponse
    {
        Customer::updateOrCreate(
            ['user_id' => auth()->user()->id], //if data ada (berdasarkan user_id nya), update. kalau blm ada, create a new.
            [
                'email' => $request->email,
                'phone' => $request->phone,
                'alamat' => $request->alamat,
                'kota' => $request->kota,
                'provinsi' => $request->provinsi,
                'kodepos' => $request->kodepos
            ]
        );

        notify()->success('Updated Successfully⚡️', 'Success!');

        return redirect()->back();
    }

    function updateAccountInfo(Request $request): RedirectResponse
    {
        // we have only 2 input fields data so not gonna make the request separated file
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email']
        ]);

        Auth::user()->update($validatedData);

        notify()->success('Updated Successfully⚡️', 'Success!');

        return redirect()->back();
    }

    function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Auth::user()->update(['password' => bcrypt($request->password)]);

        notify()->success('Updated Successfully⚡️', 'Success!');

        return redirect()->back();
    }
}
