<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Models\User;
use App\Models\Customer;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\CustomerCart;
use App\Models\Notification;
use App\Models\StoreProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\CustomerTransaction;
use App\Http\Controllers\Controller;
use App\Models\Store;
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

        return view('frontend.home._customer._cart', compact('cartItem'));
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

        if ($request->isMethod('get')) {
            $cartIds = $request->input('cart_id', []); // id dari checkbox di cart

            $cartItems = [];
            $totalPrice = 0;

            foreach ($cartIds as $cartId) {
                $customerCart = CustomerCart::find($cartId);

                if ($customerCart) {
                    $product = $customerCart->product;

                    if ($product) {
                        $customer = Customer::find($customerCart->customer_id);
                        $store_id = $product->store_id;

                        $cartItems[] = [
                            'cart_id' => $customerCart->id,

                            'product_id' => $product->id,
                            'product_name' => $product->name,
                            'product_price' => $product->display_price,
                            'store_id' => $product->store_id,
                            'store_name' => $product->store->name,
                            'product_img' => $product->image,
                            'product_qty' => $customerCart->item_qty,

                            'customer_name' => $customer->name,
                            'customer_phone' => $customer->phone,
                            'customer_alamat' => $customer->alamat

                        ];
                        $cartId = $customerCart->id;
                        $totalPrice += $product->display_price * $customerCart->item_qty;
                    }
                }
            }

            $now = Carbon::now();

            $date = $now->format('dmY');
            $randomString = Str::random(6);

            $transInv = strtoupper($date . $randomString);
            $transDate = $now->format('Y-m-d H:i:s');

            session(['cart_id' => $cartId]);
            session(['total_price' => $totalPrice]);
            session(['invoice_no' => strtoupper($date . $randomString)]);
            session(['transaction_date' => $now->format('Y-m-d H:i:s')]);
            session(['store_id' => $store_id]);

            return view('frontend.home._customer._checkout', compact('cartItems', 'transInv', 'transDate'));
        }

        if ($request->isMethod('post')) {
            $totalPrice = session('total_price');
            $transInv = session('invoice_no');
            $transDate = session('transaction_date');
            $cartId = session('cart_id');
            $transactionData = [
                'cart_id' => $cartId,
                'invoice_no' => $transInv,
                'total_price' => $totalPrice,
                'shipping_address' => "Jakarta",
                'transaction_date' => $transDate,
            ];

            CustomerTransaction::create($transactionData);

            // Notify both customer & store
            $notify = new Notification();
            $notify->user_id = Auth::id();
            $notify->title = 'Order created successfully!';
            $notify->message = 'Your order ' . $transInv . ' has been successfully placed. To complete the order, please
             proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before ' . $transDate . '. After
             completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you';
            $notify->save();

            $storeId = session('store_id');

            if ($storeId) {
                $storeOwner = Store::where('id', $storeId)->first();
                if ($storeOwner) {
                    $ownerId = $storeOwner->user_id;
                    $notificationStoreOwner = new Notification();
                    $notificationStoreOwner->user_id = $ownerId;
                    $notificationStoreOwner->title = 'New Order Received!';
                    $notificationStoreOwner->message = 'You have received a new order. Check your dashboard for details.';
                    $notificationStoreOwner->save();
                }
            }

            notify()->success('Order created successfully ⚡️.', 'Success!');

            return redirect()->route('customer.payment');
        }
    }
}
