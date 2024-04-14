<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfessionalDashboardController extends Controller
{
    function index(): View
    {

        return view('frontend._professional-dashboard.dashboard');
    }
}
