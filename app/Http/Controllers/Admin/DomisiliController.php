<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DomisiliController extends Controller
{
    function index(): View
    {
        return view('admin.dashboard.data-domisili.index');
    }
}
