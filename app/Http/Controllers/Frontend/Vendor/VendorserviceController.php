<?php

namespace App\Http\Controllers\Frontend\Vendor;

use App\Models\Vendor;
use Illuminate\View\View;
use App\Models\PriceRange;
use Illuminate\Http\Request;
use App\Models\VendorService;
use App\Models\VendorCategory;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\VendorServiceUpdateRequest;

class VendorserviceController extends Controller
{
    use FileUploadTrait;

    public function index(): View
    {
        $userId = Auth::id();
        $vendor = Vendor::where('user_id', $userId)->first();

        $data = VendorService::where('vendor_id', $vendor->id)->get();
        $category = VendorCategory::all();
        $price = PriceRange::all();

        return view('frontend._vendor-dashboard._service', compact('data', 'category', 'price'));
    }

    public function store(Request $request): RedirectResponse
    {
        $userId = auth()->user()->id;
        $vendor = Vendor::where('user_id', $userId)->first();


        $request->validate([
            'image' => ['image', 'max:1500'],
            'name' => ['required', 'string', 'max:255'],
            'category' => ['string', 'max:100'],
            'desc' => ['required', 'string', 'max:150'],
            'price' => ['required', 'string', 'max:250'],

        ]);


        $imagePath = $this->uploadFile($request, 'image');

        $data = [
            'vendor_id' => $vendor->id,
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
            'price' => $request->price,

        ];

        if (!empty($imagePath)) {
            $data['image'] = $imagePath;
        }

        VendorService::create($data);

        notify()->success('Created Successfully⚡️', 'Success!');

        return Redirect::route('vendor.service');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $data = VendorService::find($id);

        $rules = ([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'desc' => 'required'
        ]);

        $validatedData = $request->validate($rules);


        $data->update([
            'name' => $validatedData['name'],
            'category' => $validatedData['category'],
            'price' => $validatedData['price'],
            'desc' => $validatedData['desc']
        ]);

        $data->save();

        notify()->success('Updated Successfully⚡️', 'Success!');


        return Redirect::route('vendor.service');
    }

    public function delete($id)
    {
        $data = VendorService::find($id);
        $data->delete();


        notify()->success('Deleted Successfully⚡️', 'Success!');

        return back();
    }
}
