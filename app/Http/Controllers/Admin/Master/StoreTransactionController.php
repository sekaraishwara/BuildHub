<?php

namespace App\Http\Controllers\Admin\Master;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\CustomerTransaction;
use App\Http\Controllers\Controller;
use App\Models\CustomerServiceOrder;
use Illuminate\Http\RedirectResponse;

class StoreTransactionController extends Controller
{
    function needApprove(): View
    {
        $data = CustomerTransaction::all();

        return view('admin.dashboard.store-transaction.needApprove', compact('data'));
    }

    function needApproveService(): View
    {
        $dataService = CustomerServiceOrder::all();

        return view('admin.dashboard.store-transaction.needApproveService', compact('dataService'));
    }

    function approveTransaction($inv): RedirectResponse
    {
        $customerTransaction = CustomerTransaction::where('invoice_no', $inv)->first();


        if (!$customerTransaction) {
            $customerTransaction = CustomerServiceOrder::where('invoice_no', $inv)->first();
        }
        $customerTransaction->update([
            'isApprove' => 1
        ]);

        notify()->success('Approve Successfully⚡️', 'Success!');

        return redirect()->back();
    }
}
