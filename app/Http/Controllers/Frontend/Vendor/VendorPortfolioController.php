<?php

namespace App\Http\Controllers\Frontend\Vendor;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\VendorPortfolio;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class VendorPortfolioController extends Controller
{
    public function index(): View
    {

        $data = VendorPortfolio::all();

        return view('frontend._vendor-dashboard._portfolio', compact('data'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'year' => ['required', 'string', 'max:150']

        ]);

        $data = vendorPortfolio::create([
            'name' => $request->name,
            'year' => $request->year,
        ]);

        $data->save();

        return Redirect::route('vendor.portfolio');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $data = VendorPortfolio::find($id);

        $rules = ([
            'name' => 'required',
            'year' => 'required'
        ]);

        $validatedData = $request->validate($rules);


        $data->update([
            'name' => $validatedData['name'],
            'year' => $validatedData['year'],
        ]);

        $data->save();

        return Redirect::route('vendor.portfolio');
    }

    public function delete($id)
    {
        $data = VendorPortfolio::find($id);
        $data->delete();

        return back();
    }
}
