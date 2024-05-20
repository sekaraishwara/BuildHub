<?php

namespace App\Http\Controllers\Frontend\Professional;

use App\Models\Professional;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Models\ProfessionalService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\PriceRange;
use App\Models\ProfessionalCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ProfessionalServiceController extends Controller
{
    use FileUploadTrait;

    public function index(): View
    {
        $userId = Auth::id();
        $professional = Professional::where('user_id', $userId)->first();

        if ($professional) {
            $data = ProfessionalService::where('professional_id', $professional->id)->get();
        } else {
            $data = collect();
        }


        $category = ProfessionalCategory::all();
        $price = PriceRange::all();

        return view('frontend._professional-dashboard._service', compact('data', 'category', 'price'));
    }

    public function store(Request $request): RedirectResponse
    {
        $userId = auth()->user()->id;
        $professional = Professional::where('user_id', $userId)->first();

        if (!$professional) {
            notify()->error('Please complete your professional profile first!', 'Error!');
            return Redirect::back();
        }

        $request->validate([
            'image' => ['image', 'max:1500'],
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:150'],
            'desc' => ['required', 'string', 'max:150'],
            'price' => ['required', 'string', 'max:250'],


        ]);

        $imagePath = $this->uploadFile($request, 'image');


        $data = ProfessionalService::create([
            'professional_id' => $professional->id,
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
            'price' => $request->price,
        ]);

        if (!empty($imagePath)) {
            $data['image'] = $imagePath;
        }


        $data->save();

        notify()->success('Created Successfully⚡️', 'Success!');


        return Redirect::route('professional.service');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $data = ProfessionalService::find($id);

        $rules = ([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'image' => 'nullable|image|max:1500'
        ]);

        $validatedData = $request->validate($rules);


        $data->update([
            'name' => $validatedData['name'],
            'category' => $validatedData['category'],
            'desc' => $validatedData['desc'],
            'price' => $validatedData['price']
        ]);

        if ($request->hasFile('image')) {

            $data->image = $this->uploadFile($request, 'image');
        }
        $data->save();

        notify()->success('Updated Successfully⚡️', 'Success!');

        return Redirect::route('professional.service');
    }

    public function delete($id)
    {
        $data = ProfessionalService::find($id);
        $data->delete();

        notify()->success('Deleted Successfully⚡️', 'Success!');


        return back();
    }
}
