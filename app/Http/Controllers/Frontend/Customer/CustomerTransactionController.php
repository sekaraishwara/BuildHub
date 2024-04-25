<?php

namespace App\Http\Controllers\Frontend\Customer;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerTransactionController extends Controller
{
    public function payment(Request $request): View
    {


        return view('frontend.home._customer._payment');
    }
}
