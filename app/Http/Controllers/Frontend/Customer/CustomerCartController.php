<?php

namespace App\Http\Controllers\Frontend\Customer;

use Illuminate\View\View;
use App\Models\CustomerCart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CustomerCartController extends Controller
{
    public function index(): View
    {
        return view('frontend.home._customer._cart');
    }

    public function customerCheckout(): View
    {
        $cart = CustomerCart::all();
        return view('frontend.home._customer._checkout', compact('cart'));
    }

    public function addToCart(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->firstOrFail();


        $request->validate([
            'product_id' => 'required|exists:store_products,id',
            'item_qty' => 'required|min:1',
        ]);

        $existCartItem = CustomerCart::where('customer_id', $customer->id) //update Qty item tanpa create baris baru
            ->where('product_id', $request->product_id)
            ->first();

        if ($existCartItem) {
            $existCartItem->item_qty += $request->item_qty;
            $existCartItem->save();
        } else {
            CustomerCart::create([
                'customer_id' => $customer->id,
                'product_id' => $request->product_id,
                'item_qty' => $request->item_qty,
                'date' => now(),
            ]);
        }


        notify()->success('Added Successfully⚡️', 'Success!');

        return redirect()->back();
    }
}
