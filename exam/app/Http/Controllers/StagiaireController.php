<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stagiaires = Stagiaire::all();
        return view('stagiaire.index', compact('stagiaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stagiaires.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'filiere'=> 'required',
            'age' => 'required',
        ]);

        stagiaire::create($request->all());
        
        return redirect()->route('stagiaires.index')
        ->with('success', 'stagiaire added succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stagiaire $stagiaire)
    {
        return view('stagiaires.show', compact('stagiaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stagiaire $stagiaire)
    {
        return view('stagiaires.edit', compact('stagiaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stagiaire $stagiaire)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'filiere' => 'required',
            'age' => 'required',
        ]);

        $stagiaire->update($request->all());

        return redirect()->route('stagiaires.index')
        ->with('success', 'stagiaire updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stagiaire $stagiaire)
    {
        $stagiaire->delete();
        return redirect()->route('stagiaire.index')
        ->with('success', 'stagiaire deleted successfully');
    }
}
