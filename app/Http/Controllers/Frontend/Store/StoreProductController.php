<?php

namespace App\Http\Controllers\Frontend\Store;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMyStoreUpdateRequest;
use App\Models\Store;
use App\Models\StoreProduct;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class StoreProductController extends Controller
{
    use FileUploadTrait;

    public function index(): View
    {
        $data = StoreProduct::all();

        return view('frontend._store-dashboard._product', compact('data'));
    }

    public function create(): View
    {

        return view('frontend._store-dashboard.product.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $userId = auth()->user()->id;
        $store = Store::where('user_id', $userId)->first();

        $request->validate([
            'image' => ['image', 'max:1500'],
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:150'],
            'desc' => ['required', 'string', 'max:150'],
            'price' => ['required', 'string', 'max:150'],
        ]);


        $imagePath = $this->uploadFile($request, 'image');

        $data = [
            'store_id' => $store->id,
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
            'price' => $request->price,
        ];

        if (!empty($imagePath)) {
            $data['image'] = $imagePath;
        }

        StoreProduct::create($data);

        notify()->success('Updated Successfully⚡️', 'Success!');

        return Redirect::route('store.product');
    }


    public function delete($id)
    {
        $data = StoreProduct::find($id);
        $data->delete();

        notify()->success('Deleted Successfully⚡️', 'Success!');

        return back();
    }
}


 // public function update(Request $request, $id): RedirectResponse
    // {
    //     $data = StoreProduct::find($id);

    //     $rules = ([
    //         'name' => 'required',
    //         'category' => 'required',
    //         'desc' => 'required',
    //         'price' => 'required',
    //         'status' => 'required'
    //     ]);

    //     $validatedData = $request->validate($rules);


    //     $data->update([
    //         'name' => $validatedData['name'],
    //         'category' => $validatedData['category'],
    //         'desc' => $validatedData['desc'],
    //         'price' => $validatedData['price'],
    //         'status' => $validatedData['status'],
    //     ]);

    //     $data->save();

    //     return Redirect::route('store.product');
    // }