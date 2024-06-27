<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vendor;
use App\Models\Regencie;
use Illuminate\View\View;
use App\Models\PriceRange;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use App\Models\VendorService;
use App\Models\VendorCategory;
use App\Models\VendorPortfolio;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerServiceReview;
use Illuminate\Http\RedirectResponse;

class VendorController extends Controller
{
    use Searchable;

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
        $this->seacrh($vendorService, ['name']);

        $vendorService = $vendorService->get();

        // dd($vendorService);

        $vendorCategory = VendorCategory::all();

        $priceRanges = PriceRange::all();


        // GET VENDOR INFORMATION [LOCATION]

        $getVendor = VendorService::pluck('vendor_id');
        $vendorsRegencie = Vendor::whereIn('id', $getVendor)->with('kota')->get();

        $cityIds = $vendorsRegencie->pluck('kota');

        $regencies = Regencie::whereIn('id', $cityIds)->get(['id', 'name']);

        if ($request->has('price')) {
            $categoryPrice = $request->price;
            $price = PriceRange::where('price_ranges', $categoryPrice)->first();

            if ($price) {
                $vendorService->where('price', $price->price_ranges);
            }
        }

        if ($request->has('location')) {
            $location = $request->location;
            $regency = Regencie::where('name', $location)->first();

            if ($regency) {
                $vendorIds = Vendor::where('kota', $regency->id)->pluck('id');
                // dd($vendorIds);
                $vendorService->whereIn('location', $vendorIds);
            }
        }


        return view('frontend.home._vendor.index', compact(
            'vendorCategory',
            'vendorService',
            'priceRanges',
            'regencies'
        ));
    }

    public function singleService($id)
    {


        $serviceVendor = VendorService::where('id', $id)->first();

        $vendor = Vendor::where('id', $serviceVendor->vendor_id)->first();

        $items = VendorService::where('vendor_id',  $serviceVendor->vendor_id)->get();
        $portfolio = VendorPortfolio::where('vendor_id',  $serviceVendor->vendor_id)->get();

        $vendorOwner = User::Where('id', $vendor->user_id)->first();

        $vendorRegency = Regencie::find($vendor->kota);

        $serviceCurrent =  VendorService::where('id', $id)->first();

        $reviewCount = CustomerServiceReview::where('service_name', $serviceCurrent->name)->count();
        $review = CustomerServiceReview::where('service_name', $serviceCurrent->name)
            ->with('customer')
            ->get();

        return view('frontend.home._vendor.single-product', compact(
            'serviceVendor',
            'vendorOwner',
            'items',
            'portfolio',
            'vendorRegency',
            'reviewCount',
            'review'
        ));
    }
}
