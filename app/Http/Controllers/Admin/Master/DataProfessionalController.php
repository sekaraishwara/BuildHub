<?php

namespace App\Http\Controllers\Admin\Master;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Professional;

class DataProfessionalController extends Controller
{
    function index(): View
    {
        $professional = Professional::all();
        return view('admin.dashboard.data-professional.index', compact('professional'));
    }
}
