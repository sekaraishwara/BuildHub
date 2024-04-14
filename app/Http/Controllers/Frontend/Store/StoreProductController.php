<?php

namespace App\Http\Controllers\Frontend\Store;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\ProfessionalService;
use App\Http\Controllers\Controller;
use App\Models\StoreProduct;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class StoreProductController extends Controller
{
    public function index(): View
    {
        $data = StoreProduct::all();

        return view('frontend._store-dashboard._product', compact('data'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:150'],
            'desc' => ['required', 'string', 'max:150'],
            'price' => ['required', 'string', 'max:150'],

        ]);

        $data = StoreProduct::create([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
            'price' => $request->price,
        ]);

        $data->save();

        return Redirect::route('store.product');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $data = StoreProduct::find($id);

        $rules = ([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'status' => 'required'
        ]);

        $validatedData = $request->validate($rules);


        $data->update([
            'name' => $validatedData['name'],
            'category' => $validatedData['category'],
            'desc' => $validatedData['desc'],
            'price' => $validatedData['price'],
            'status' => $validatedData['status'],
        ]);

        $data->save();

        return Redirect::route('store.product');
    }

    public function delete($id)
    {
        $data = StoreProduct::find($id);
        $data->delete();

        return back();
    }
}
