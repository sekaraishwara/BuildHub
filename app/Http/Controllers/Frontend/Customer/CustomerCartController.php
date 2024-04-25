<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Models\Customer;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\CustomerCart;
use App\Models\StoreProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CustomerCartController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->firstOrFail();

        $cartItem = CustomerCart::where('customer_id', $customer->id)
            ->get();
        // dd($cartItem);


        return view('frontend.home._customer._cart', compact('cartItem'));
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

    public function getTotalItemCart()
    {
        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->firstOrFail();

        $totalCount = CustomerCart::where('customer_id', $customer->id)->sum('item_qty');


        return response()->json(['totalItemCount' => $totalCount]);
    }

    public function sessionCheckout(Request $request)
    {

        $cartIds = $request->input('cart_id', []); // id dari checkbox di cart

        $cartItems = [];

        foreach ($cartIds as $cartId) {
            $customerCart = CustomerCart::find($cartId);

            if ($customerCart) {
                $product = $customerCart->product;

                if ($product) {
                    $customer = Customer::find($customerCart->customer_id);
                    $cartItems[] = [
                        'product_id' => $product->id,
                        'product_name' => $product->name,
                        'product_price' => $product->price,
                        'store_id' => $product->store_id,
                        'store_name' => $product->store->name,
                        'product_img' => $product->image,
                        'product_qty' => $customerCart->item_qty,

                        'customer_name' => $customer->name,
                        'customer_phone' => $customer->phone,
                        'customer_alamat' => $customer->alamat,

                    ];
                }
            }
        }

        $date = Carbon::now()->format('dm');
        $randomString = Str::random(6);

        $invTrans = $date  . $randomString;
        dd($invTrans);

        return view('frontend.home._customer._checkout', compact('cartItems', 'invTrans'));
    }
}
