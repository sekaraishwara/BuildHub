<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\ProfessionalCategory;
use App\Models\ProfessionalService;
use Illuminate\Http\Request;

class ProfessionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professionalCategory = ProfessionalCategory::all();
        $professionalService = ProfessionalService::all();
        return view('frontend.home._professional.index', compact('professionalCategory', 'professionalService'));
    }

    public function singleService($slug)
    {

        $serviceProfessional = ProfessionalService::where('slug', $slug)->first();
        $items = ProfessionalService::where('professional_id',  $serviceProfessional->professional_id)->get();


        return view('frontend.home._professional.single-product', compact('serviceProfessional', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
