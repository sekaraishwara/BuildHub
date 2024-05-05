<?php

namespace App\Http\Controllers\Admin\Master;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class DataUserController extends Controller
{
    function index(): View
    {
        $users = User::all();
        return view('admin.dashboard.data-user.index', compact('users'));
    }
}
