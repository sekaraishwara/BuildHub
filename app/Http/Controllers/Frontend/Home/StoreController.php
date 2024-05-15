<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Models\Store;
use App\Models\Regencie;
use Illuminate\View\View;
use App\Traits\Searchable;
use App\Models\StoreProduct;
use Illuminate\Http\Request;
use App\Models\StoreCategory;
use App\Models\CustomerReview;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class StoreController extends Controller
{
    use Searchable;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {

        $storeProduct = StoreProduct::query();

        if ($request->has('category')) {
            $categoryName = $request->category;
            $category = StoreCategory::where('name', $categoryName)->first();

            if ($category) {
                $storeProduct->where('category', $category->name);
            }
        }

        $this->seacrh($storeProduct, ['name']);

        $storeProduct = $storeProduct->get();

        $storeCategory = StoreCategory::all();

        return view('frontend.home._store.index', compact('storeCategory', 'storeProduct'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('frontend.home._store.show');
    }

    public function singleProduct($slug)
    {

        $storeProduct = StoreProduct::where('slug', $slug)->first();
        $items = StoreProduct::where('store_id',  $storeProduct->store_id)->get();

        $store = Store::where('id', $storeProduct->store_id)->first();


        $storeRegency = Regencie::find($store->kota);

        $storeOwner = User::where('id', $store->user_id)->first();
        // dd($storeOwner);

        $reviewCount = CustomerReview::where('product_id', $storeProduct->id)->count();
        $review = CustomerReview::where('product_id', $storeProduct->id)->get();

        return view('frontend.home._store.single-product', compact(
            'storeProduct',
            'items',
            'storeRegency',
            'storeOwner',
            'reviewCount',
            'review'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
