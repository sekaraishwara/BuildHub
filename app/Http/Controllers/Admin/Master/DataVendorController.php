<?php

namespace App\Http\Controllers\Admin\Master;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vendor;

class DataVendorController extends Controller
{
    function index(): View
    {
        $vendors = Vendor::all();
        return view('admin.dashboard.data-vendor.index', compact('vendors'));
    }
}
