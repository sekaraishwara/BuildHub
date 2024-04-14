<?php

namespace App\Http\Controllers\Frontend\Professional;

use Illuminate\Http\Request;
use App\Models\ProfessionalService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ProfessionalServiceController extends Controller
{
    public function index(): View
    {
        $data = ProfessionalService::all();

        return view('frontend._professional-dashboard._service', compact('data'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:150'],
            'desc' => ['required', 'string', 'max:150'],

        ]);

        $data = ProfessionalService::create([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        $data->save();

        return Redirect::route('professional.service');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $data = ProfessionalService::find($id);

        $rules = ([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
            'status' => 'required'
        ]);

        $validatedData = $request->validate($rules);


        $data->update([
            'name' => $validatedData['name'],
            'category' => $validatedData['category'],
            'desc' => $validatedData['desc'],
            'status' => $validatedData['status'],
        ]);

        $data->save();

        return Redirect::route('professional.service');
    }

    public function delete($id)
    {
        $data = ProfessionalService::find($id);
        $data->delete();

        return back();
    }
}
