<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Models\User;
use App\Models\Store;
use App\Models\Customer;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\CustomerCart;
use App\Models\Notification;
use App\Models\StoreProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\CustomerCheckout;
use App\Models\CustomerCheckotItem;
use App\Models\CustomerTransaction;
use App\Http\Controllers\Controller;
use App\Models\CustomerCheckoutItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class CustomerCartController extends Controller
{
    // public function index(): View
    // {
    //     $user = Auth::user();
    //     $customer = Customer::where('user_id', $user->id)->firstOrFail();

    //     $cartItem = CustomerCart::where('customer_id', $customer->id)
    //         ->get();

    //     return view('frontend.home._customer._cart', compact('cartItem'));
    // }

    public function index(): View
    {
        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();

        $customerId = $customer ? $customer->id : null;

        $cartItem = CustomerCart::where('customer_id', $customerId)
            ->get();

        return view('frontend.home._customer._cart', compact('cartItem'));
    }

    public function getTotalItemCart()
    {
        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->firstOrFail();

        $totalCount = CustomerCart::where('customer_id', $customer->id)->sum('item_qty');


        return response()->json(['totalItemCount' => $totalCount]);
    }

    public function addToCart(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->firstOrFail();

        $request->validate([
            'product_id' => 'required|exists:store_products,id',
            'store_name' => 'required',
            'item_qty' => 'required|min:1',
            'item_name' => 'required',
            'item_price' => 'required',
            'item_image' => 'required',
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
                'store_name' => $request->store_name,
                'item_name' => $request->item_name,
                'item_qty' => $request->item_qty,
                'item_price' => $request->item_price,
                'item_image' => $request->item_image,
                'date' => now(),
            ]);
        }

        notify()->success('Added Successfully⚡️', 'Success!');

        return redirect()->back();
    }


    public function checkoutStore(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $request->validate([
            'cart_id' => 'required|array|min:1',
            'cart_id.*' => 'required',
            'store_id' => 'required|array|min:1',
            'store_id.*' => 'required',
        ]);

        // dd($request->all());

        $cartIds = $request->cart_id;
        $storeIds = $request->store_id;

        $checkout = CustomerCheckout::create([
            'user_id' => $user->id,
            'store_id' => $storeIds[0],
            'cart_id' => json_encode($cartIds),
        ]);

        return redirect(route('customer.checkout.item', ['checkout_id' => $checkout->id]));
    }


    // public function checkoutItem($checkout_id): View
    // {
    //     $checkout = CustomerCheckout::findOrFail($checkout_id);
    //     $cart_ids_json = $checkout->cart_id;

    //     $cart_ids = json_decode($cart_ids_json, true);




    //     $user = Auth::user();
    //     $customer = Customer::where('user_id', $user->id)->first();


    //     return view('frontend.home._customer._checkout', compact('checkout', 'checkoutItems', 'customer'));
    // }

    public function checkoutItem($checkout_id): View
    {

        $checkout = CustomerCheckout::findOrFail($checkout_id);

        $checkoutId = $checkout->id;


        $cart_ids = json_decode($checkout->cart_id, true);

        $cartItems = CustomerCart::whereIn('id', $cart_ids)->get();
        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();


        return view('frontend.home._customer._checkout', compact('checkout', 'cartItems', 'customer', 'checkoutId'));
    }


    public function checkoutSubmit(Request $request): RedirectResponse
    {

        $user = Auth::user();

        $request->validate([
            'checkout_id' => 'required',
            'product_id' => 'required',
            'total_price' => 'required',
            'shipping_address' => 'required',
        ]);


        $pendingPayments = CustomerTransaction::where('payment_status', 'pending')
            ->where('user_id', $user->id)
            ->exists();

        if ($pendingPayments) {
            notify()->error('Please complete pending payments before checkout.', 'Payment Pending!');
            return redirect()->back();
        }


        $now = Carbon::now();

        $date = $now->format('dmY');
        $randomString = Str::random(6);

        $Inv = strtoupper($date . $randomString);
        $transDate = $now->format('Y-m-d H:i:s');


        $checkoutItem = CustomerCheckoutItem::create([
            'checkout_id' => $request->checkout_id,
            'product_id' => $request->product_id,
            'store_name' => $request->store_name,
            'item_name' => $request->item_name,
            'item_qty' => $request->item_qty,
            'item_price' => $request->total_price,
            'item_image' => $request->item_image,
            'date' => $transDate,
        ]);

        $checkout = CustomerTransaction::create([
            'checkout_id' => $request->checkout_id,
            'product_id' => $request->product_id,
            'user_id' => $user->id,
            'invoice_no' => $Inv,
            'total_price' => $request->total_price,
            'shipping_address' => $request->shipping_address,
            'transaction_date' => $transDate,
        ]);

        CustomerCheckout::where('id', $request->checkout_id)->update([
            'hasCheckout' => 1,
        ]);

        $getCart = CustomerCheckout::where('id', $request->checkout_id)->first();
        if ($getCart) {
            $deleteCart = CustomerCart::whereIn('id', json_decode($getCart->cart_id))->delete();
        }

        $checkout->save();

        $invoice_no = $checkout->invoice_no;

        notify()->success('Order created successfully ⚡️.', 'Success!');

        return redirect()->route('customer.order');
    }


    public function delete(string $id)
    {
        try {
            CustomerCart::findOrFail($id)->delete();
            notify()->success('Deleted Successfully⚡️', 'Success!');

            return back();
        } catch (\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong. Please Try Again!'], 500);
        }
    }
}
