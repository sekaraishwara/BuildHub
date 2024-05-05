<?php

namespace App\Http\Controllers;

use App\Models\Professional;
use App\Models\ProfessionalService;
use App\Models\Store;
use App\Models\StoreProduct;
use App\Models\VendorService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    function index(): View
    {
        $serviceProfessional = ProfessionalService::all();
        $serviceVendor = VendorService::all();
        $storeProduct = StoreProduct::all();
        return view('frontend.home.index', compact('serviceProfessional', 'serviceVendor', 'storeProduct'));
    }
}
