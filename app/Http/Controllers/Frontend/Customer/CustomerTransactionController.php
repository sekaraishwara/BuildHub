<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Models\Customer;
use Illuminate\View\View;
use App\Models\CustomerCart;
use Illuminate\Http\Request;
use App\Models\CustomerReview;
use App\Traits\FileUploadTrait;
use App\Models\TransactionProof;
use App\Models\CustomerTransaction;
use App\Models\GeneralNotification;
use App\Http\Controllers\Controller;
use App\Models\CustomerServiceOrder;
use App\Models\CustomerServiceReview;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\GeneranTransactionProof;

class CustomerTransactionController extends Controller
{
    use FileUploadTrait; //inject here

    public function getPayment($inv): View
    {

        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();

        // Cari invoice number di CustomerTransaction
        $getTransaction = CustomerTransaction::where('invoice_no', $inv)->first();

        if (!$getTransaction) {
            $getTransaction = CustomerServiceOrder::where('invoice_no', $inv)->first();
        }

        return view('frontend.home._customer._payment', compact('getTransaction'));
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

    function uploadPaymentProof(Request $request): RedirectResponse
    {
        $payment = $this->uploadFile($request, 'payment_proof');

        $data = [];
        if (!empty($payment)) {
            $data['payment_proof'] = $payment;
        }

        $data['invoice_no'] = $request->invoice_no;


        $isExist = GeneranTransactionProof::updateOrCreate(
            ['invoice_no' => $data['invoice_no']],
            $data
        );

        if ($isExist->exists()) {
            $customerTransaction = CustomerTransaction::where('invoice_no', $isExist->invoice_no)->first();
            if ($customerTransaction) {
                $customerTransaction->update([
                    'payment_status' => 'paid',
                    'paid_at' => now()
                ]);

                $user = Auth::user();
                $notifyClient = new GeneralNotification();
                $notifyClient->email = $user->email;
                $notifyClient->title = 'Pembayaran kamu Behasil!';
                $notifyClient->message = 'Pembayaran kamu untuk invoice no: <strong>' . $request->invoice_no . '</strong>.
            telah berhasil. Thank you';
                $notifyClient->save();

                $notifyOwner = new GeneralNotification();
                $notifyOwner->email = $user->email; //benerin
                $notifyOwner->title = 'Invoice telah dibayar oleh client!';
                $notifyOwner->message = 'Check your dashboard for details.';
                $notifyOwner->save();
            }

            $customerServiceOrder = CustomerServiceOrder::where('invoice_no', $isExist->invoice_no)->first();
            if ($customerServiceOrder) {
                $customerServiceOrder->update([
                    'isPayment' => '1',
                    'paid_at' => now()
                ]);

                $user = Auth::user();
                $notifyClient = new GeneralNotification();
                $notifyClient->email = $user->email;
                $notifyClient->title = 'Pembayaran kamu Behasil!';
                $notifyClient->message = 'Pembayaran kamu untuk invoice no: <strong>' . $request->invoice_no . '</strong>.
            telah berhasil. Thank you';
                $notifyClient->save();

                $notifyOwner = new GeneralNotification();
                $notifyOwner->email = $customerServiceOrder->serviceProvider_email;
                $notifyOwner->title = 'Invoice telah dibayar oleh client!';
                $notifyOwner->message = 'Check your dashboard for details.';
                $notifyOwner->save();
            }
        }
        notify()->success('Updated Successfully⚡️', 'Success!');

        return redirect()->back();
    }

    function serviceRate(Request $request): RedirectResponse
    {

        $user = Auth::user();
        // dd($user->email);

        $request->validate([
            'invoice_no' => 'required|string|max:255',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:255',
        ]);

        $service_name = $request->input('service_name');

        $review = new CustomerServiceReview([
            'invoice_no' => $request->input('invoice_no'),
            'client_email' => $user->email,
            'service_name' => $service_name,
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);

        $review->save();

        notify()->success('Rated Successfully Send⚡️', 'Thank You!');

        return redirect()->back();
    }

    function sessionRate(Request $request): RedirectResponse
    {

        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();


        $request->validate([
            'invoice_no' => 'required|string|max:255',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:255',
        ]);

        $productId = $request->input('product_id');

        $review = new CustomerReview([
            'invoice_no' => $request->input('invoice_no'),
            'customer_id' => $customer->id,
            'product_id' => $productId,
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);

        $review->save();

        notify()->success('Rated Successfully Send⚡️', 'Thank You!');

        return redirect()->back();
    }
}
