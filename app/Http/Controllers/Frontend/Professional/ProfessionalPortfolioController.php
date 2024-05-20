<?php

namespace App\Http\Controllers\Frontend\Professional;

use App\Models\Professional;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Models\ProfessionalService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ProfessionalPortfolio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ProfessionalPortfolioController extends Controller
{
    use FileUploadTrait;

    public function index(): View
    {
        $userId = Auth::id();
        $professional = Professional::where('user_id', $userId)->first();


        if ($professional) {
            $data = ProfessionalPortfolio::where('professional_id', $professional->id)->get();
        } else {
            $data = collect();
        }
        // $data = ProfessionalPortfolio::where('professional_id', $professional->id)->get();

        return view('frontend._professional-dashboard._portfolio', compact('data'));
    }

    public function store(Request $request): RedirectResponse
    {
        $userId = auth()->user()->id;
        $professional = Professional::where('user_id', $userId)->first();

        // added mei 20
        if (!$professional) {
            notify()->error('Please complete your professional profile first!', 'Error!');
            return Redirect::back();
        }

        $request->validate([
            'image' => ['image', 'max:1500'],
            'name' => ['required', 'string', 'max:255'],
            'desc' => ['required', 'string', 'max:500'],
            'year' => ['required', 'string', 'max:150']

        ]);

        $imagePath = $this->uploadFile($request, 'image');

        $data = ProfessionalPortfolio::create([
            'professional_id' => $professional->id,
            'name' => $request->name,
            'desc' => $request->desc,
            'year' => $request->year,
        ]);

        if (!empty($imagePath)) {
            $data['image'] = $imagePath;
        }

        $data->save();

        notify()->success('Created Successfully⚡️', 'Success!');


        return Redirect::route('professional.portfolio');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $data = ProfessionalPortfolio::find($id);

        $rules = ([
            'name' => 'required',
            'desc' => 'required',
            'year' => 'required',
            'image' => 'nullable|image|max:1500'

        ]);

        $validatedData = $request->validate($rules);


        $data->update([
            'name' => $validatedData['name'],
            'desc' => $validatedData['desc'],
            'year' => $validatedData['year'],
        ]);

        if ($request->hasFile('image')) {

            $data->image = $this->uploadFile($request, 'image');
        }
        $data->save();

        notify()->success('Updated Successfully⚡️', 'Success!');

        return Redirect::route('professional.portfolio');
    }

    public function delete($id)
    {
        $data = ProfessionalPortfolio::find($id);
        $data->delete();

        notify()->success('Deleted Successfully⚡️', 'Success!');

        return back();
    }
}
