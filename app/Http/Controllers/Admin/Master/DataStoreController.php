<?php

namespace App\Http\Controllers\Admin\Master;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Store;

class DataStoreController extends Controller
{
    function index(): View
    {
        $stores = Store::all();
        return view('admin.dashboard.data-store.index', compact('stores'));
    }
}
