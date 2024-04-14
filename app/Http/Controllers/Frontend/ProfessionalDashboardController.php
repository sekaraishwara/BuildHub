<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\ProfessionalPortfolio;
use App\Models\ProfessionalService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfessionalDashboardController extends Controller
{
    function index(): View
    {
        $services = ProfessionalService::all()->count();
        $portfolio = ProfessionalPortfolio::all()->count();

        return view('frontend._professional-dashboard.dashboard', compact('services', 'portfolio'));
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
