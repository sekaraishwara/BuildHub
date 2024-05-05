<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\VendorService;
use App\Http\Controllers\Controller;
use App\Models\VendorPortfolio;
use Illuminate\Support\Facades\Auth;

class VendorDashboardController extends Controller
{
    function index(): View
    {

        $userId = Auth::id();

        $myServicesCount = VendorService::where('vendor_id', $userId)->count();
        $myPortoCount = VendorPortfolio::where('vendor_id', $userId)->count();


        return view('frontend._vendor-dashboard.dashboard', compact('myServicesCount', 'myPortoCount'));
    }
}
