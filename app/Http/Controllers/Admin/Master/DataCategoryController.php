<?php

namespace App\Http\Controllers\Admin\Master;

use App\Models\Store;
use Illuminate\View\View;
use App\Models\Professional;
use Illuminate\Http\Request;
use App\Models\StoreCategory;
use App\Models\VendorCategory;
use App\Http\Controllers\Controller;
use App\Models\ProfessionalCategory;
use Illuminate\Http\RedirectResponse;

class DataCategoryController extends Controller
{
    function storeCategory(): View
    {
        $store = StoreCategory::all();
        return view('admin.dashboard.data-category.store-category', compact('store'));
    }

    function storeCategoryUpdate(Request $request): RedirectResponse
    {

        StoreCategory::updateOrCreate(
            [
                'name' => $request->name
            ]
        );

        notify()->success('Updated Successfully⚡️', 'Success!');

        return redirect()->back();
    }

    function vendorCategory(): View
    {
        $vendor = VendorCategory::all();
        return view('admin.dashboard.data-category.vendor-category', compact('vendor'));
    }

    function vendorCategoryUpdate(Request $request): RedirectResponse
    {

        VendorCategory::updateOrCreate(
            [
                'name' => $request->name
            ]
        );

        notify()->success('Updated Successfully⚡️', 'Success!');

        return redirect()->back();
    }

    function professionalCategory(): View
    {
        $professional = ProfessionalCategory::all();
        return view('admin.dashboard.data-category.professional-category', compact('professional'));
    }

    function professionalCategoryUpdate(Request $request): RedirectResponse
    {

        ProfessionalCategory::updateOrCreate(
            [
                'name' => $request->name
            ]
        );

        notify()->success('Updated Successfully⚡️', 'Success!');

        return redirect()->back();
    }
}
