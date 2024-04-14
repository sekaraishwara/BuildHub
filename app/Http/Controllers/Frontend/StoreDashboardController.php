<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StoreProduct;

class StoreDashboardController extends Controller
{
    function index(): View
    {
        $product = StoreProduct::all()->count();

        return view('frontend._store-dashboard.dashboard', compact('product'));
    }
}
