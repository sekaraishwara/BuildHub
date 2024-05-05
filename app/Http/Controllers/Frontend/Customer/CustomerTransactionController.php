<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Models\Customer;
use Illuminate\View\View;
use App\Models\CustomerCart;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Models\TransactionProof;
use App\Models\CustomerTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CustomerTransactionController extends Controller
{
    use FileUploadTrait; //inject here

    public function getPayment()
    {

        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();


        if ($customer) {
            $getTransaction = CustomerTransaction::join('customer_carts', 'customer_transactions.cart_id', '=', 'customer_carts.id')
                ->where('customer_carts.customer_id', $customer->id)
                ->where('customer_transactions.payment_status', 'pending')
                ->first();

            return view('frontend.home._customer._payment', compact('getTransaction'));
        }
    }

    function uploadPayment(Request $request): RedirectResponse
    {
        $payment = $this->uploadFile($request, 'payment_proof');

        $data = [];
        if (!empty($payment)) {
            $data['payment_proof'] = $payment;
        }

        $data['transaction_id'] = $request->transaction_id;


        $isExist = TransactionProof::updateOrCreate(
            ['transaction_id' => $data['transaction_id']],
            $data
        );

        if ($isExist->exists()) {
            $customerTransaction = CustomerTransaction::where('id', $isExist->transaction_id)->first();
            if ($customerTransaction) {
                $customerTransaction->update(['payment_status' => 'paid']);
                $customerTransaction->update(['paid_at' => now()]);
            }
        }

        notify()->success('Updated Successfully⚡️', 'Success!');

        return redirect()->back();
    }
}
