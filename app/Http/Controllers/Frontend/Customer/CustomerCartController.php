<?php

namespace App\Http\Controllers\Frontend\Customer;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerCartController extends Controller
{
    public function index(): View
    {
        return view('frontend.home._customer._cart');
    }

    public function customerCheckout(): View
    {
        return view('frontend.home._customer._checkout');
    }
}
