<?php

namespace App\Http\Controllers\Frontend\Vendor;

use App\Models\Vendor;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\VendorPortfolio;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class VendorPortfolioController extends Controller
{
    use FileUploadTrait;

    public function index(): View
    {

        $userId = Auth::id();
        $vendor = Vendor::where('user_id', $userId)->first();


        if ($vendor) {
            $data = VendorPortfolio::where('vendor_id', $vendor->id)->get();
        } else {
            $data = collect();
        }
        // $data = VendorPortfolio::all();

        return view('frontend._vendor-dashboard._portfolio', compact('data'));
    }

    public function store(Request $request): RedirectResponse
    {
        $userId = auth()->user()->id;
        $vendor = Vendor::where('user_id', $userId)->first();

        // added mei 20
        if (!$vendor) {
            notify()->error('Please complete your vendor profile first!', 'Error!');
            return Redirect::back();
        }

        $request->validate([
            'image' => ['image', 'max:1500'],
            'name' => ['required', 'string', 'max:255'],
            'desc' => ['required', 'string', 'max:500'],
            'year' => ['required', 'string', 'max:150']

        ]);

        $imagePath = $this->uploadFile($request, 'image');

        $data = vendorPortfolio::create([
            'vendor_id' => $vendor->id,
            'name' => $request->name,
            'desc' => $request->desc,
            'year' => $request->year,
        ]);

        if (!empty($imagePath)) {
            $data['image'] = $imagePath;
        }

        $data->save();

        notify()->success('Created Successfully⚡️', 'Success!');

        return Redirect::route('vendor.portfolio');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $data = VendorPortfolio::find($id);

        $rules = ([
            'name' => 'required',
            'desc' => 'required',
            'year' => 'required',
            'image' => 'nullable|image|max:1500'
        ]);

        $validatedData = $request->validate($rules);


        $data->update([
            'name' => $validatedData['name'],
            'desc' => $validatedData['desc'],
            'year' => $validatedData['year'],
        ]);

        if ($request->hasFile('image')) {

            $data->image = $this->uploadFile($request, 'image');
        }
        $data->save();

        notify()->success('Updated Successfully⚡️', 'Success!');


        return Redirect::route('vendor.portfolio');
    }

    public function delete($id)
    {
        $data = VendorPortfolio::find($id);
        $data->delete();

        notify()->success('Deleted Successfully⚡️', 'Success!');


        return back();
    }
}
