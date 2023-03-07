<?php

namespace App\Http\Controllers;

use App\Models\Veld;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreVeldRequest;
use App\Http\Requests\UpdateVeldRequest;

class VeldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $velden = Veld::all();
        $velden = Veld::query()
        ->select('velden.*', 'users.name as veld_leider')
        ->leftJoin('users', 'velden.veld_leider', '=', 'users.id')->get();
        return view('velden.index', compact('velden'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('velden.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $inputs = $request->all();
        $inputs['verlichting'] = $request->has('verlichting');
        $inputs['competitie'] = $request->has('competitie');
        $veld = Veld::create($inputs);
        return redirect()->route('velden.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Veld $veld)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($veld)
    {
        $veld = Veld::find($veld);

        return view('velden.edit', [
            'veld' => $veld
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $veld)
    {
        // Update the Veld model with the new data from the request
        $veld = Veld::find($veld);
        $veld->naam = $request->input('naam');
        $veld->adres = $request->input('adres');
        $veld->postcode = $request->input('postcode');
        $veld->plaats = $request->input('plaats');
        $veld->capaciteit = $request->input('capaciteit');
        $veld->aantal_baskets = $request->input('aantal_baskets');
        $veld->verlichting = $request->input('verlichting') || false;
        $veld->competitie = $request->input('competitie') || false;
        $veld->is_active = $request->input('is_active') || false;
        $veld->openingstijden = $request->input('openingstijden');
        $veld->sluitingstijden = $request->input('sluitingstijden');
        $veld->veld_leider = $request->input('veld_leider');
        $veld->aantal_bezoekers = $request->input('aantal_bezoekers');
        $veld->conditie = $request->input('conditie');
        $veld->longitude = $request->input('longitude');
        $veld->latitude = $request->input('latitude');

        $veld->save();
        // ...


        // Redirect back to the index page
        return redirect()->route('velden.index')->banner('Veld updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($veld)
    {
        //
        Veld::destroy($veld);
        return redirect()->route('velden.index')->banner('Veld is verwijderd');
    }
}