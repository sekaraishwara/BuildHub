<?php

namespace App\Http\Controllers;

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

        if ($request->has('category')) {
            $categoryName = $request->category;
            $category = VendorCategory::where('name', $categoryName)->first();

            if ($category) {
                $vendorService->where('category', $category->name);
            }
        }

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

        $vendorRegency = Regencie::find($vendor->kota);


        // dd($vendorRegency);

        return view('frontend.home._vendor.single-product', compact('serviceVendor', 'items', 'portfolio', 'vendorRegency'));
    }
}
