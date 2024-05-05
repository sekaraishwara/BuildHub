<?php

namespace App\Http\Controllers\Admin\Master;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\CustomerTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class StoreTransactionController extends Controller
{
    function needApprove(): View
    {
        $data = CustomerTransaction::all();

        return view('admin.dashboard.store-transaction.needApprove', compact('data'));
    }

    function approveTransaction(Request $request, $id): RedirectResponse
    {
        $customerTransaction = CustomerTransaction::find($id);


        $customerTransaction->update([
            'isApproved' => 1
        ]);



        notify()->success('Approve Successfully⚡️', 'Success!');

        return redirect()->back();
    }
}
