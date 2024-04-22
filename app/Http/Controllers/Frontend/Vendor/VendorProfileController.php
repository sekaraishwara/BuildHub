<?php

namespace App\Http\Controllers\Frontend\Vendor;

use App\Models\Vendor;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules;
use App\Http\Requests\VendorInfoUpdateRequest;
use App\Http\Requests\VendorProfileUpdateRequest;

class VendorProfileController extends Controller
{
    use FileUploadTrait; //inject here

    public function profile(Request $request): View
    {
        $vendorInfo = Vendor::where('user_id', auth()->user()->id)->first();
        return view('frontend._vendor-dashboard._profile', compact('vendorInfo'));
    }


    function updateVendorProfile(VendorProfileUpdateRequest $request): RedirectResponse
    {

        $logoPath = $this->uploadFile($request, 'logo');
        $bannerPath = $this->uploadFile($request, 'banner');

        $data = [];
        if (!empty($logoPath)) $data['logo'] = $logoPath;
        if (!empty($bannerPath)) $data['banner'] = $bannerPath;

        $data['name'] = $request->name;
        $data['category_vendor_id'] = $request->category_vendor_id;
        $data['desc'] = $request->desc;
        $data['instagram'] = $request->instagram;
        $data['facebook'] = $request->facebook;

        Vendor::updateOrCreate(
            ['user_id' => auth()->user()->id], //if data ada (berdasarkan user_id nya), update. kalau blm ada, create a new.
            $data
        );

        notify()->success('Updated Successfully⚡️', 'Success!');

        return redirect()->back();
    }

    function updateVendorInfo(VendorInfoUpdateRequest  $request): RedirectResponse
    {
        Vendor::updateOrCreate(
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
