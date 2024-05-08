<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Models\Customer;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomerChecklist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CustomerBuildingChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = Auth::user();

        $data = CustomerChecklist::where('user_id', $user->id)->first();

        return view('frontend._customer-dashboard._buiding-checklist', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): RedirectResponse
    {
        $user = Auth::user();


        $request->validate([
            'title' => 'string|max:100',
            'list' => 'string|max:100|nullable',
            'notes' => 'string|max:100|nullable',
        ]);

        $data = [
            'user_id' => $user->id,
        ];

        $customerChecklist = CustomerChecklist::updateOrCreate(
            $data,
            [
                'title' => $request->title,
                'list' => $request->list,
                'notes' => $request->notes,
            ]
        );

        notify()->success('Saved Project Successfully⚡️', 'Success!');

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addItem(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $request->validate([
            'list' => 'required|string|max:255',
            'notes' => 'nullable|string|max:255',
        ]);

        $customerChecklist = CustomerChecklist::where('user_id', $user->id)
            ->firstOrFail();


        $customerChecklist->items()->create([
            'customer_checklist_id' => $customerChecklist->id,
            'list' => $request->list,
            'notes' => $request->notes,
        ]);


        notify()->success('Added Items Successfully⚡️', 'Success!');


        return redirect()->back();
    }
}
