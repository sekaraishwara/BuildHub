<?php

namespace App\Http\Controllers\Frontend\Professional;

use App\Models\Professional;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Models\ProfessionalService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
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

        $data = ProfessionalService::where('professional_id', $professional->id)->get();

        return view('frontend._professional-dashboard._service', compact('data'));
    }

    public function store(Request $request): RedirectResponse
    {
        $userId = auth()->user()->id;
        $professional = Professional::where('user_id', $userId)->first();

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
            'price' => 'required'
        ]);

        $validatedData = $request->validate($rules);


        $data->update([
            'name' => $validatedData['name'],
            'category' => $validatedData['category'],
            'desc' => $validatedData['desc'],
            'price' => $validatedData['price']
        ]);

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
