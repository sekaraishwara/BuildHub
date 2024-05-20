<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Models\Blogger;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Traits\FileUploadTrait;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class DataBlogController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $article = Blogger::all();

        return view('admin.dashboard.data-blog.index', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        return view('admin.dashboard.data-blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $userId = auth()->user()->id;

        $request->validate([
            'image' => ['image', 'max:1500'],
            'title' => ['required', 'string', 'max:255'],
            'blog_category' => ['required', 'string', 'max:150'],
            'content' => ['required'],
        ]);


        $imagePath = $this->uploadFile($request, 'image');

        $data = [
            'author' => $userId,
            'title' => $request->title,
            'blog_category' => $request->blog_category,
            'publish_date' => now(),
            'content' => $request->content,
        ];


        if (!empty($imagePath)) {
            $data['image'] = $imagePath;
        }

        Blogger::create($data);

        notify()->success('Updated Successfully⚡️', 'Success!');

        return Redirect::route('admin.data.blog');
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
        $article = Blogger::where('slug', $slug)->first();


        return view('admin.dashboard.data-blog.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id): RedirectResponse
    {

        $article = Blogger::find($id);


        $validatedData = $request->validate([
            'title' => 'required',
            'blog_category' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|max:1500'
        ]);

        // dd($validatedData);

        $article->title = $validatedData['title'];
        $article->blog_category = $validatedData['blog_category'];
        $article->content = $validatedData['content'];

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::delete($article->image);
            }

            $article->image = $this->uploadFile($request, 'image');
        }

        $article->save();

        notify()->success('Updated Successfully⚡️', 'Success!');

        return Redirect::route('admin.data.blog');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            Blogger::findOrFail($id)->delete();
            notify()->success('Deleted Successfully⚡️', 'Success!');

            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong. Please Try Again!'], 500);
        }
    }
}
