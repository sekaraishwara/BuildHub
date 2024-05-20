<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\GeneralNotification;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NotificationController extends Controller
{
    function index(): View
    {
        $user = Auth::user();
        // $notify = Notification::where('user_id', $user->id)->get();
        $notify = GeneralNotification::where('email', $user->email)->orderBy('created_at', 'desc')->get();

        return view('frontend.home._partials._notification', compact('notify'));
    }
}
