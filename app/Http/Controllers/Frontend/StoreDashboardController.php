<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\View\View;
use App\Models\CustomerCart;
use App\Models\StoreProduct;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Models\TransactionProof;
use App\Models\CustomerTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TransactionProofUpdateRequest;
use App\Models\Store;

class StoreDashboardController extends Controller
{
    use FileUploadTrait; //inject here

    function index(): View
    {
        $userId = Auth::id();
        $store = Store::where('user_id', $userId)->first();

        $product = StoreProduct::where('store_id', $store->id)->count();


        return view('frontend._store-dashboard.dashboard', compact('product'));
    }

    function transaction(): View
    {


        $user = Auth::user();


        $getTransaction = CustomerTransaction::whereHas('cart.product.store', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();


        $cartIds = [];
        foreach ($getTransaction as $transaction) {
            $cartId = $transaction->cart_id;
            $customerCart = CustomerCart::find($cartId);

            if ($customerCart) {
                $customerId = $customerCart->customer_id;
                $productId = $customerCart->product_id;

                $customer = $customerCart->customer;
                $product = $customerCart->product;

                $cartIds[] = [
                    'cart_id' => $cartId,
                    'item_qty' => $customerCart->item_qty,
                    'customer_id' => $customerId,
                    'product_id' => $productId,
                    'customer_name' => $customer->name,
                    'product_name' => $product->name
                ];
            }
        }
        return view('frontend._store-dashboard._transaction', compact('getTransaction', 'cartIds'));
    }

    function uploadResi(Request $request): RedirectResponse
    {
        $transactionId = $request->transaction_id;

        $transactionById = TransactionProof::where('transaction_id', $transactionId)->first();

        if ($transactionById) {
            if (!empty($transactionById->payment_proof)) {
                $resi = $this->uploadFile($request, 'shipping_proof');


                if (!empty($resi)) {
                    $transactionById->update(['shipping_proof' => $resi]);
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
