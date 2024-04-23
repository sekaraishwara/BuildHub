<?php

namespace App\Http\Controllers\Frontend\Customer;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerChatController extends Controller
{
    public function index(): View
    {
        return view('frontend._customer-dashboard._chat');
    }
}
