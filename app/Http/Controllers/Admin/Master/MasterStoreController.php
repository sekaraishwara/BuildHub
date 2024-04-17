<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\StoreCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MasterStoreController extends Controller
{
    function index(): View
    {
        $store = StoreCategory::all();
        return view('admin.dashboard.master-store.index', compact('store'));
    }

    function updateCategory(Request $request): RedirectResponse
    {

        StoreCategory::updateOrCreate(
            [
                'name' => $request->name
            ]
        );

        notify()->success('Updated Successfully⚡️', 'Success!');

        return redirect()->back();
    }
}
