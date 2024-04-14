<?php

namespace App\Http\Controllers\Frontend\Vendor;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\VendorService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class VendorserviceController extends Controller
{
    public function index(): View
    {
        $data = VendorService::all();

        return view('frontend._vendor-dashboard._service', compact('data'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:150'],
            'desc' => ['required', 'string', 'max:150'],

        ]);

        $data = VendorService::create([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        $data->save();

        return Redirect::route('vendor.service');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $data = VendorService::find($id);

        $rules = ([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
            'status' => 'required'
        ]);

        $validatedData = $request->validate($rules);


        $data->update([
            'name' => $validatedData['name'],
            'category' => $validatedData['category'],
            'desc' => $validatedData['desc'],
            'status' => $validatedData['status'],
        ]);

        $data->save();

        return Redirect::route('vendor.service');
    }

    public function delete($id)
    {
        $data = VendorService::find($id);
        $data->delete();

        return back();
    }
}
