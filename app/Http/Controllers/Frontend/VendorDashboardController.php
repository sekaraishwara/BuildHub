<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Vendor;
use Illuminate\View\View;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Models\VendorService;
use App\Models\VendorPortfolio;
use App\Http\Controllers\Controller;
use App\Models\CustomerServiceOrder;
use Illuminate\Support\Facades\Auth;

class VendorDashboardController extends Controller
{
    function index(): View
    {

        $user = Auth::user();

        // $myServicesCount = VendorService::where('vendor_id', $user->id)->count();
        // $myPortoCount = VendorPortfolio::where('vendor_id', $userId)->count();


        $vendor = Vendor::where('user_id', $user->id)->first();
        $inbox = Conversation::with('sender', 'receiver')
            ->where(function ($query) use ($user) {
                $query->where('user1_id', $user->id)
                    ->orWhere('user2_id', $user->id);
            })
            ->count();

        if ($vendor) {
            $services = VendorService::where('vendor_id', $vendor->id)->count();
            // $portfolio = ProfessionalPortfolio::where('professional_id', $professional->id)->count();
            $invoice = CustomerServiceOrder::where('serviceProvider_id', $vendor->id)->count();
        } else {
            $services = 0;
            // $portfolio = 0;
            $invoice = 0;
        }


        return view('frontend._vendor-dashboard.dashboard', compact('services', 'invoice', 'inbox'));
    }
}
