<?php

namespace App\Http\Controllers\Frontend\Store;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMyStoreUpdateRequest;
use App\Models\Store;
use App\Models\StoreCategory;
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
        $category = StoreCategory::all();

        return view('frontend._store-dashboard.product.create', compact('category'));
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

    public function edit(string $id)
    {
        $data = StoreProduct::findOrFail($id);
        return view('frontend._store-dashboard.product.edit', compact('data'));
    }

    public function delete(string $id)
    {
        try {
            StoreProduct::findOrFail($id)->delete();
            notify()->success('Deleted Successfully⚡️', 'Success!');

            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong. Please Try Again!'], 500);
        }
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $data = StoreProduct::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'status' => 'required'
        ]);

        $data->update($validatedData);

        notify()->success('Updated Successfully⚡️', 'Success!');

        return redirect()->route('store.product');
    }
}