<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Customer;
use Illuminate\View\View;
use App\Models\CustomerCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerTransaction;
use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\CustomerChecklist;
use App\Models\CustomerServiceOrder;
use App\Models\Messages;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    function index(): View
    {
        $user = Auth::user();

        $order = CustomerTransaction::where('user_id', $user->id)->count();
        $orderService = CustomerServiceOrder::where('client_email', $user->email)->count();

        $order += $orderService;

        $checklist = CustomerChecklist::where('user_id', $user->id)->count();

        // $chatCount = Conversation::where('user1_id', $user->id)
        //     ->orWhere('user2_id', $user->id)
        //     ->count();

        $inbox = Conversation::with('sender', 'receiver')
            ->where(function ($query) use ($user) {
                $query->where('user1_id', $user->id)
                    ->orWhere('user2_id', $user->id);
            })
            ->count();


        // dd($order);


        return view('frontend._customer-dashboard.dashboard', compact('order', 'checklist', 'inbox'));
    }

    function transaction(): View
    {
        $user = Auth::user();
        $getTransaction = CustomerTransaction::where('customer_transactions.user_id', $user->id)
            ->join('customer_checkout_items', 'customer_transactions.checkout_id', '=', 'customer_checkout_items.checkout_id')
            ->join('stores', 'customer_checkout_items.store_name', '=', 'stores.name')
            ->join('users', 'stores.user_id', '=', 'users.id') // Join dengan tabel users untuk mendapatkan pemilik toko
            ->select(
                'customer_transactions.*',
                'users.name as store_owner_name', // Pilih kolom nama pengguna (pemilik toko) dari tabel users
                'stores.name as store_name',
                'customer_checkout_items.store_name',
                'customer_checkout_items.item_name',
                'customer_checkout_items.item_image'
            )
            ->get();


        // ORDER SERVICE START
        $getServiceOrder = CustomerServiceOrder::where('client_email', $user->email)->get();

        foreach ($getServiceOrder as $order) {
            $owner = User::find($order->serviceProvider_id);
            if ($owner) {
                $order->owner_name = $owner->name;
            }
        }


        return view('frontend._customer-dashboard._transaction', compact('getTransaction', 'getServiceOrder'));
    }

    function historyTransaction(): View
    {

        $user = Auth::user();
        $getTransaction = CustomerTransaction::where('user_id', $user->id)
            ->where('isApprove', 1)
            ->join('customer_checkout_items', 'customer_transactions.checkout_id', '=', 'customer_checkout_items.checkout_id')
            ->join('store_products', 'customer_checkout_items.product_id', '=', 'store_products.id')
            ->select(
                'customer_transactions.*',
                'customer_checkout_items.product_id',
                'customer_checkout_items.item_qty',
                'store_products.name as product_name',
                'store_products.image as product_image'
            )
            ->get();

        $getServiceOrder = CustomerServiceOrder::where('client_email', $user->email)->get();
        // dd($getServiceOrder);


        return view('frontend._customer-dashboard._history-transaction', compact('getTransaction', 'getServiceOrder'));
    }
}
