<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Customer;
use Illuminate\View\View;
use App\Models\CustomerCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    function index(): View
    {

        return view('frontend._customer-dashboard.dashboard');
    }

    function transaction(): View
    {
        $user = Auth::user();
        $getTransaction = DB::table('customer_transactions')
            ->join('customer_carts', 'customer_transactions.cart_id', '=', 'customer_carts.id')
            ->join('store_products', 'customer_carts.product_id', '=', 'store_products.id')
            ->join('stores', 'store_products.store_id', '=', 'stores.id')
            ->join('customers', 'customer_carts.customer_id', '=', 'customers.id')
            ->where('customers.user_id', $user->id)
            ->select(
                'customer_transactions.*',
                'customer_transactions.id AS transaction_id',
                'customer_carts.*',
                'stores.name AS store_name',
                'store_products.name AS product_name',
                'store_products.image AS product_image',
            )
            ->get();

        return view('frontend._customer-dashboard._transaction', compact('getTransaction'));
    }

    function historyTransaction(): View
    {

        $user = Auth::user();
        $getTransaction = DB::table('customer_transactions')
            ->join('customer_carts', 'customer_transactions.cart_id', '=', 'customer_carts.id')
            ->join('store_products', 'customer_carts.product_id', '=', 'store_products.id')
            ->join('stores', 'store_products.store_id', '=', 'stores.id')
            ->join('customers', 'customer_carts.customer_id', '=', 'customers.id')
            ->where('customers.user_id', $user->id)
            ->where('customer_transactions.isApproved', '1')
            ->select(
                'customer_transactions.*',
                'customer_transactions.id AS transaction_id',
                'customer_carts.*',
                'stores.name AS store_name',
                'store_products.name AS product_name',
                'store_products.image AS product_image',
            )
            ->get();


        return view('frontend._customer-dashboard._history-transaction', compact('getTransaction'));
    }
}
