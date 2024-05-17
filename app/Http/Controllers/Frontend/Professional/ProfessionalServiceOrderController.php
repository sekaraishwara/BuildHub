<?php

namespace App\Http\Controllers\Frontend\Professional;

use Illuminate\View\View;
use App\Models\Professional;
use Illuminate\Http\Request;
use App\Models\ProfessionalService;
use App\Http\Controllers\Controller;
use App\Models\CustomerServiceOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\CustomerServiceOrderItem;
use Illuminate\Support\Facades\Redirect;

class ProfessionalServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {


        return view('frontend._professional-dashboard._service-order-all');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $professional = Professional::where('user_id', $user->id)->first();

        $getService = ProfessionalService::where('professional_id', $professional->id)->get();


        return view('frontend._professional-dashboard._service-order-create', compact('getService'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $user = auth()->user()->id;
        $professional = Professional::where('user_id', $user)->first();

        $request->validate([
            'orderType' => ['required', 'string'],
            'service_name' => ['required', 'string', 'max:255'],
            'client_email' => ['required', 'string', 'max:150'],
            'total_price' => ['required'],

            'itemName.*' => ['required', 'string'],
            'itemQty.*' => ['required'],
            'itemPrice.*' => ['required'],

        ]);

        $order = CustomerServiceOrder::create([
            'user_id' => $user,
            'professional_id' => $professional->id,
            'invoice_no' => $professional->id, //benerin
            'orderType' => $request->orderType,
            'service_name' => $request->service_name,
            'client_email' => $request->client_email,
            'serviceProvider_email' => $request->client_email, //benerin
            'serviceProvider_id' => $user, //benerin
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

        notify()->success('Order Created Successfully⚡️', 'Success!');

        return redirect()->route('professional.service.order');

        // dd($request->all());

        // CustomerServiceOrder::create($data);

        // notify()->success('Updated Successfully⚡️', 'Success!');

        // return Redirect::route('professional.service.order');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
