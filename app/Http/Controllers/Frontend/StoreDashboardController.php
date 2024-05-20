<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Store;
use App\Models\Customer;
use Illuminate\View\View;
use App\Models\Conversation;
use App\Models\CustomerCart;
use App\Models\StoreProduct;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Models\CustomerCheckout;
use App\Models\TransactionProof;
use App\Models\CustomerTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\GeneranTransactionProof;
use App\Http\Requests\TransactionProofUpdateRequest;

class StoreDashboardController extends Controller
{
    use FileUploadTrait; //inject here

    function index(): View
    {
        $user = Auth::user();
        $store = Store::where('user_id', $user->id)->first();


        // $product = StoreProduct::where('store_id', $store->id)->count();

        $inbox = Conversation::with('sender', 'receiver')
            ->where(function ($query) use ($user) {
                $query->where('user1_id', $user->id)
                    ->orWhere('user2_id', $user->id);
            })
            ->count();


        // $services = ProfessionalService::where('professional_id', $professional->id)->count();
        // $portfolio = ProfessionalPortfolio::where('professional_id', $professional->id)->count();
        if ($store) {
            $product = StoreProduct::where('store_id', $store->id)->count();
            // $invoice = CustomerTransaction::where('serviceProvider_id', $professional->id)->count();
        } else {
            $product = 0;
            // $invoice = 0;
        }


        // dd($myTransaction);


        return view('frontend._store-dashboard.dashboard', compact('product', 'inbox'));
    }

    function transaction(): View
    {


        $user = Auth::user();

        $getTransaction = CustomerTransaction::with('checkout.items')
            ->whereHas('checkout.store', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->get();

        // dd($getTransaction);
        return view('frontend._store-dashboard._transaction', compact('getTransaction'));
    }

    function uploadResi(Request $request): RedirectResponse
    {
        $invoice_no = $request->invoice_no;

        $transaction = GeneranTransactionProof::where('invoice_no', $invoice_no)->first();

        if ($transaction) {
            if (!empty($transaction->payment_proof)) {
                $resi = $this->uploadFile($request, 'shipping_proof');

                if (!empty($resi)) {
                    $transaction->update(['shipping_proof' => $resi]);
                    notify()->success('Resi Updated Successfully⚡️', 'Success!');
                } else {
                    notify()->error('Failed to upload resi. Please try again.', 'Error!');
                }
            } else {
                notify()->error('Please kindly wait payment proof completed before uploading resi.', 'Error!');
            }
        }

        return redirect()->back();
    }
}
