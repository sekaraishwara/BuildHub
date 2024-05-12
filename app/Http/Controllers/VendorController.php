<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vendor;
use App\Models\Regencie;
use Illuminate\View\View;
use App\Models\PriceRange;
use Illuminate\Http\Request;
use App\Models\VendorService;
use App\Models\VendorCategory;
use App\Models\VendorPortfolio;
use Illuminate\Http\RedirectResponse;

class VendorController extends Controller
{
    function index(Request $request): View
    {

        $vendorService = VendorService::query();

        // filter by category
        if ($request->has('category')) {
            $categoryName = $request->category;
            $category = VendorCategory::where('name', $categoryName)->first();

            if ($category) {
                $vendorService->where('category', $category->name);
            }
        }

        // filter by price
        if ($request->has('price')) {
            $categoryPrice = $request->price;
            $price = PriceRange::where('price_ranges', $categoryPrice)->first();

            if ($price) {
                $vendorService->where('price', $price->price_ranges);
            }
        }

        // shorting by


        $vendorService = $vendorService->get();
        // dd($vendorService);

        $vendorCategory = VendorCategory::all();


        $priceRanges = PriceRange::all();

        return view('frontend.home._vendor.index', compact('vendorCategory', 'vendorService', 'priceRanges'));
    }

    public function singleService($id)
    {


        $serviceVendor = VendorService::where('id', $id)->first();

        $vendor = Vendor::where('id', $serviceVendor->vendor_id)->first();

        $items = VendorService::where('vendor_id',  $serviceVendor->vendor_id)->get();
        $portfolio = VendorPortfolio::where('vendor_id',  $serviceVendor->vendor_id)->get();

        $vendorOwner = User::Where('id', $vendor->user_id)->first();


        $vendorRegency = Regencie::find($vendor->kota);


        // dd($vendorRegency);

        return view('frontend.home._vendor.single-product', compact('serviceVendor', 'vendorOwner', 'items', 'portfolio', 'vendorRegency'));
    }
}
