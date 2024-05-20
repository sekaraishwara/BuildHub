<?php

namespace App\Http\Controllers\Frontend\Store;

use App\Models\User;
use App\Models\Store;
use Illuminate\View\View;
use App\Models\StoreProduct;
use Illuminate\Http\Request;
use App\Models\StoreCategory;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreMyStoreUpdateRequest;

class StoreProductController extends Controller
{
    use FileUploadTrait;

    public function index(): View
    {
        $user = Auth::user();
        $store = Store::where('user_id', $user->id)->first();


        if ($store) {
            $data = StoreProduct::where('store_id', $store->id)->get();
        } else {
            $data = collect();
        }


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

        if (!$store) {
            notify()->error('Please complete your store profile first!', 'Error!');
            return Redirect::back();
        }

        $request->validate([
            'image' => ['image', 'max:1500'],
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:150'],
            'desc' => ['required', 'string'],
            'stock' => ['required', 'max:150'],
            'normal_price' => ['required', 'max:150'],
            'discount_price' => ['required', 'max:150'],
        ]);


        $imagePath = $this->uploadFile($request, 'image');

        //final price with/without discount calc (kalo misalnya ada)
        $display_price =  $request->normal_price - $request->discount_price;

        $data = [
            'store_id' => $store->id,
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
            'stock' => $request->stock,
            'normal_price' => $request->normal_price,
            'discount_price' => $request->discount_price,
            'display_price' => $display_price,
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
        $category = StoreCategory::all();

        return view('frontend._store-dashboard.product.edit', compact('data', 'category'));
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
            'normal_price' => 'required',
            'discount_price' => 'required',
            'stock' => 'required',
            'image' => 'nullable|image|max:1500'
        ]);

        $data->update($validatedData);

        if ($request->hasFile('image')) {
            if ($data->image) {
                Storage::delete($data->image);
            }

            $data->image = $this->uploadFile($request, 'image');
        }

        $data->save();


        notify()->success('Updated Successfully⚡️', 'Success!');

        return redirect()->route('store.product');
    }
}
