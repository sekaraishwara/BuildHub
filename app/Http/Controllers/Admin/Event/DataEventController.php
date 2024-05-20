<?php

namespace App\Http\Controllers\Admin\Event;

use App\Models\Events;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class DataEventController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $event = Events::all();

        return view('admin.dashboard.data-event.index', compact('event'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dashboard.data-event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = auth()->user()->id;

        $request->validate([
            'image' => ['image', 'max:1500'],
            'title' => ['required', 'string', 'max:255'],
            'event_category' => ['required', 'string', 'max:150'],
            'event_by' => ['required', 'string', 'max:150'],
            'content' => ['required'],
        ]);


        $imagePath = $this->uploadFile($request, 'image');

        $data = [
            'author' => $userId,
            'title' => $request->title,
            'event_category' => $request->event_category,
            'event_by' => $request->event_by,
            'date' => $request->date,
            'content' => $request->content,
        ];


        if (!empty($imagePath)) {
            $data['image'] = $imagePath;
        }

        Events::create($data);

        notify()->success('Updated Successfully⚡️', 'Success!');

        return Redirect::route('admin.data.event');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $event = Events::where('slug', $slug)->first();


        return view('admin.dashboard.data-event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {

        $article = Events::find($id);


        $validatedData = $request->validate([
            'title' => 'required',
            'event_category' => 'required',
            'event_by' => 'required',
            'date' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|max:1500'
        ]);

        // dd($validatedData);

        $article->title = $validatedData['title'];
        $article->event_category = $validatedData['event_category'];
        $article->event_by = $validatedData['event_by'];
        $article->date = $validatedData['date'];
        $article->content = $validatedData['content'];

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::delete($article->image);
            }

            $article->image = $this->uploadFile($request, 'image');
        }

        $article->save();

        notify()->success('Updated Successfully⚡️', 'Success!');

        return Redirect::route('admin.data.event');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            Events::findOrFail($id)->delete();
            notify()->success('Deleted Successfully⚡️', 'Success!');

            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong. Please Try Again!'], 500);
        }
    }
}
