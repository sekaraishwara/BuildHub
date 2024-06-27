<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blogger;
use App\Models\Events;
use App\Models\Professional;
use App\Models\Store;
use App\Models\User;
use App\Models\Vendor;

class DashboardController extends Controller
{
    function index(): View
    {
        $users = User::all()->count();
        $vendor = Vendor::all()->count();
        $professional = Professional::all()->count();
        $store = Store::all()->count();

        $blog = Blogger::all()->count();
        $event = Events::all()->count();

        return view('admin.dashboard.index', compact(
            'users',
            'vendor',
            'professional',
            'store',
            'blog',
            'event'
        ));
    }
}
