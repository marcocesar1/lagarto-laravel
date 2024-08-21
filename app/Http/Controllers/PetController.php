<?php

namespace App\Http\Controllers;

use App\Domain\PetService;
use App\Http\Requests\Pet\StorePet;
use App\Models\Pet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function __construct(private PetService $petService) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::get();

        return view('pets.index', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePet $request)
    {
        $numberOfDaysOld = $this->petService->calculateDaysOld($request->birthdate);
        
        $pet = new Pet();
        $pet->fill($request->all());
        $pet->number_of_days_old = $numberOfDaysOld;
        $pet->save();

        return redirect(
            to: route('pets.index')
        )->with('success', 'Pet created');
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
