<?php

namespace App\Http\Controllers;

use App\Models\VendorCategory;
use App\Models\VendorService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VendorController extends Controller
{
    function index(): View
    {

        $vendorCategory = VendorCategory::all();
        $vendorService = VendorService::all();
        return view('frontend.home._vendor.index', compact('vendorCategory', 'vendorService'));

        return view();
    }

    public function singleService($id)
    {

        $serviceVendor = VendorService::where('id', $id)->first();

        return view('frontend.home._vendor.single-product', compact('serviceVendor'));
    }
}
