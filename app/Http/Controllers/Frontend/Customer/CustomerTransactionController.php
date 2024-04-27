<?php

namespace App\Http\Controllers\Frontend\Customer;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\CustomerTransaction;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerCart;
use App\Models\TransactionProof;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CustomerTransactionController extends Controller
{

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

    function uploadPayment(Request $request, $id): RedirectResponse
    {
        $payment = $this->uploadFile($request, 'payment_proof');

        $data = [];
        if (!empty($payment)) $data['payment_proof'] = $payment;

        $id =
            $data['transaction_id'] = $request->transaction_id;

        TransactionProof::updateOrCreate(
            $data
        );

        notify()->success('Updated Successfully⚡️', 'Success!');

        return redirect()->back();
    }
}
