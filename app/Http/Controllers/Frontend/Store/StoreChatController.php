<?php

namespace App\Http\Controllers\Frontend\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StoreChatController extends Controller
{
    function index(): View
    {
        return view('frontend._store-dashboard._chat');
    }
}
