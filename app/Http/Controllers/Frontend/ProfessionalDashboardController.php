<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\ProfessionalService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ProfessionalPortfolio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Conversation;
use App\Models\CustomerServiceOrder;
use App\Models\Professional;
use App\Models\ProfessionalCategory;

class ProfessionalDashboardController extends Controller
{
    function index(): View
    {
        // $userId = Auth::id();
        $user = Auth::user();


        $professional = Professional::where('user_id', $user->id)->first();
        $inbox = Conversation::with('sender', 'receiver')
            ->where(function ($query) use ($user) {
                $query->where('user1_id', $user->id)
                    ->orWhere('user2_id', $user->id);
            })
            ->count();


        // $services = ProfessionalService::where('professional_id', $professional->id)->count();
        // $portfolio = ProfessionalPortfolio::where('professional_id', $professional->id)->count();
        if ($professional) {
            $services = ProfessionalService::where('professional_id', $professional->id)->count();
            $portfolio = ProfessionalPortfolio::where('professional_id', $professional->id)->count();
            $invoice = CustomerServiceOrder::where('serviceProvider_id', $professional->id)->count();
        } else {
            $services = 0;
            $portfolio = 0;
            $invoice = 0;
        }

        return view('frontend._professional-dashboard.dashboard', compact('services', 'portfolio', 'inbox'));
    }

    public function profile(Request $request): View
    {
        return view('frontend._professional-dashboard._profile', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('professional.profile')->with('status', 'profile-updated');
    }
}
