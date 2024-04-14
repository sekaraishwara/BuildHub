<?php

namespace App\Http\Controllers\Frontend\Professional;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\ProfessionalPortfolio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ProfessionalPortfolioController extends Controller
{
    public function index(): View
    {

        $data = ProfessionalPortfolio::all();

        return view('frontend._professional-dashboard._portfolio', compact('data'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'year' => ['required', 'string', 'max:150']

        ]);

        $data = ProfessionalPortfolio::create([
            'name' => $request->name,
            'year' => $request->year,
        ]);

        $data->save();

        return Redirect::route('professional.portfolio');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $data = ProfessionalPortfolio::find($id);

        $rules = ([
            'name' => 'required',
            'year' => 'required'
        ]);

        $validatedData = $request->validate($rules);


        $data->update([
            'name' => $validatedData['name'],
            'year' => $validatedData['year'],
        ]);

        $data->save();

        return Redirect::route('professional.portfolio');
    }

    public function delete($id)
    {
        $data = ProfessionalPortfolio::find($id);
        $data->delete();

        return back();
    }
}
