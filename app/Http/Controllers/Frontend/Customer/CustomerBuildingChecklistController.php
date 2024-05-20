<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Models\Customer;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomerChecklist;
use App\Models\CustomerChecklistItems;
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

        $data = CustomerChecklist::where('user_id', $user->id)
            ->orderBy('isComplete', 'asc')
            ->get();

        return view('frontend._customer-dashboard._buiding-checklist', compact('data'));
    }

    public function create(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $request->validate([
            'title' => 'required|string|max:100',
            // You can handle 'list' and 'notes' input based on your data structure
        ]);

        // Create a new checklist for the authenticated user
        $newChecklist = new CustomerChecklist([
            'title' => $request->title,
            'list' => 'string|max:100|nullable',
            'notes' => 'string|max:100|nullable',
            'user_id' => $user->id,

        ]);

        $newChecklist->save();

        notify()->success('New Building Checklist created successfully.', 'Success!');

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addItem(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $request->validate([
            'checklist_id' => 'required|exists:customer_checklists,id,user_id,' . $user->id,
            'list' => 'required|string|max:255',
            'notes' => 'nullable|string|max:255',
        ]);

        $checklist = CustomerChecklist::findOrFail($request->checklist_id);

        $checklist->items()->create([
            'list' => $request->list,
            'notes' => $request->notes,
        ]);

        notify()->success('Added Item Successfully⚡️', 'Success!');

        return redirect()->back();
    }

    public function deleteItem(string $id)
    {
        try {
            CustomerChecklistItems::findOrFail($id)->delete();
            // $data = CustomerChecklistItems::findOrFail($id);
            //dd($data);
            notify()->success('Deleted Successfully⚡️', 'Success!');

            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong. Please Try Again!'], 500);
        }
    }

    public function doneItem(string $id)
    {
        $item = CustomerChecklistItems::findOrFail($id);

        $item->isComplete = true;
        $item->save();

        notify()->success('Updated Items Successfully⚡️', 'Success!');

        return redirect()->back();
    }

    public function complete(string $id)
    {

        $currentChecklist = CustomerChecklist::findOrFail($id);

        $currentChecklist->isComplete = true;
        $currentChecklist->save();

        notify()->success('Completed Successfully⚡️', 'Success!');

        return redirect()->back();
    }

    public function pin($id)
    {
        $checklist = CustomerChecklist::findOrFail($id);
        $checklist->isActive = false;
        $checklist->save();

        notify()->success('Project pinned successfully!⚡️', 'Success!');

        return redirect()->back();
    }
    public function unpin($id)
    {
        $checklist = CustomerChecklist::findOrFail($id);
        $checklist->isActive = true;
        $checklist->save();

        notify()->success('Project pinned successfully!⚡️', 'Success!');

        return redirect()->back();
    }

    public function delete($id)
    {
        try {
            CustomerChecklist::findOrFail($id)->delete();
            notify()->success('Deleted Successfully⚡️', 'Success!');

            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong. Please Try Again!'], 500);
        }
    }
}
