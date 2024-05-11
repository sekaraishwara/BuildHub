<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Models\Regencie;
use App\Models\Professional;
use Illuminate\Http\Request;
use App\Models\ProfessionalService;
use App\Http\Controllers\Controller;
use App\Models\PriceRange;
use App\Models\ProfessionalCategory;
use App\Models\ProfessionalPortfolio;

class ProfessionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $professionalService = ProfessionalService::query();

        if ($request->has('category')) {
            $categoryName = $request->category;
            $category = ProfessionalCategory::where('name', $categoryName)->first();

            if ($category) {
                $professionalService->where('category', $category->name);
            }
        }

        if ($request->has('price')) {
            $categoryPrice = $request->price;
            $price = PriceRange::where('price_ranges', $categoryPrice)->first();

            if ($price) {
                $professionalService->where('price', $price->price_ranges);
            }
        }

        $professionalService = $professionalService->get();

        $professionalCategory = ProfessionalCategory::all();
        $priceRanges = PriceRange::all();

        return view('frontend.home._professional.index', compact('professionalCategory', 'professionalService', 'priceRanges'));
    }

    public function singleService($slug)
    {

        $serviceProfessional = ProfessionalService::where('slug', $slug)->first();
        $professional = Professional::where('id', $serviceProfessional->professional_id)->first();

        $items = ProfessionalService::where('professional_id',  $serviceProfessional->professional_id)->get();

        $portfolio = ProfessionalPortfolio::where('professional_id',  $serviceProfessional->professional_id)->get();



        $professionalRegency = Regencie::find($professional->kota);



        return view('frontend.home._professional.single-product', compact('serviceProfessional', 'items', 'portfolio', 'professionalRegency'));
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
