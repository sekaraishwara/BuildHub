<?php

namespace App\Http\Controllers\Frontend\Vendor;

use App\Models\Vendor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\VendorService;
use Illuminate\Support\Carbon;
use App\Models\GeneralNotification;
use App\Http\Controllers\Controller;
use App\Models\CustomerServiceOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\CustomerServiceOrderItem;

class VendorServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $allOrder =  CustomerServiceOrder::where('serviceProvider_id', $user->id)->get();

        return view('frontend._vendor-dashboard._service-order-all', compact('allOrder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $vendor = Vendor::where('user_id', $user->id)->first();

        $getService = VendorService::where('vendor_id', $vendor->id)->get();


        return view('frontend._vendor-dashboard._service-order-create', compact('getService'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $user = Auth::user();
        // dd($user);

        $vendor = Vendor::where('user_id', $user->id)->first();

        $request->validate([
            'orderType' => ['required', 'string'],
            'service_name' => ['required', 'string', 'max:255'],
            'client_email' => ['required', 'string', 'max:150'],
            'total_price' => ['required'],

            'itemName.*' => ['required', 'string'],
            'itemQty.*' => ['required'],
            'itemPrice.*' => ['required'],

        ]);

        $now = Carbon::now();
        $date = $now->format('dmY');
        $randomString = Str::random(6);

        $Inv = strtoupper($date . $randomString);

        $order = CustomerServiceOrder::create([
            'user_id' => $user,
            'vendor_id' => $vendor->id,
            'invoice_no' => $Inv,
            'orderType' => $request->orderType,
            'service_name' => $request->service_name,
            'client_email' => $request->client_email,
            'serviceProvider_name' => $vendor->name,
            'serviceProvider_email' => $user->email,
            'serviceProvider_id' => $user->id,
            'total_price' => $request->total_price,
        ]);

        foreach ($request->itemName as $index => $itemName) {
            CustomerServiceOrderItem::create([
                'customer_service_order_id' => $order->id,
                'itemName' => $itemName,
                'itemPrice' => $request->itemPrice[$index],
                'itemQty' => $request->itemQty[$index],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $transDate = $now->format('Y-m-d H:i:s');

        $notifyClient = new GeneralNotification();
        $notifyClient->email = $request->client_email;
        $notifyClient->title = 'Konfirmasi pembayaran service!';
        $notifyClient->message = 'Your have an service order with invoice no: <strong>' . $Inv . '</strong>.
        To complete the order, please
         proceed with the transfer to account number 1281929129 (A/N BUILDHUB STORE INC) before ' . $transDate . '. After
         completing the transfer, kindly confirm it by uploading the transaction proof on your transaction dashboard. In case the transfer is not fulfilled,the order status will be canceled. Thank you';
        $notifyClient->save();


        $notifyOwner = new GeneralNotification();
        $notifyOwner->email = $user->email;
        $notifyOwner->title = 'Invoice berhasil dibuat!';
        $notifyOwner->message = 'You have received a new order. Check your dashboard for details.';
        $notifyOwner->save();



        notify()->success('Invoice Created Successfully⚡️', 'Success!');

        return redirect()->route('vendor.service.order');
    }

    /**
     * Display the specified resource.
     */
    public function show($inv)
    {

        $data = CustomerServiceOrder::where('invoice_no', $inv)->first();
        $items = CustomerServiceOrderItem::where('customer_service_order_id', $data->id)->get();
        //dd($item);

        return view('frontend._vendor-dashboard._service-order-show', compact('data', 'items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // added 20 mei
    public function delete($id)
    {
        $data = CustomerServiceOrder::find($id);
        $data->delete();

        notify()->success('Deleted Successfully⚡️', 'Success!');

        return back();
    }
}