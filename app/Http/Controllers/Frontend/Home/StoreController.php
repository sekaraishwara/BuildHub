<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\CustomerReview;
use App\Models\StoreCategory;
use App\Models\StoreProduct;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $storeCategory = StoreCategory::all();
        $storeProduct = StoreProduct::all();
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

        $reviewCount = CustomerReview::where('product_id', $storeProduct->id)->count();
        $review = CustomerReview::where('product_id', $storeProduct->id)->get();

        return view('frontend.home._store.single-product', compact('storeProduct', 'items', 'reviewCount', 'review'));
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
