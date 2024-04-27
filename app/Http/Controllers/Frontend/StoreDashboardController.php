<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\View\View;
use App\Models\CustomerCart;
use App\Models\StoreProduct;
use Illuminate\Http\Request;
use App\Models\CustomerTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StoreDashboardController extends Controller
{
    function index(): View
    {
        $product = StoreProduct::all()->count();

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
}
