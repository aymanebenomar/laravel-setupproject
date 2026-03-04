<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stagiaire;

class StagiaireController extends Controller
{
    
    public function index()
    {
        $stagiaires = Stagiaire::all();
        return view('stagiaires.index', compact('stagiaires'));
    }


    public function store(Request $request)
    {
        Stagiaire::create([
            'name' => $request->name,
            'specialite' => $request->specialite,
            'note' => $request->note
        ]);

        return redirect('/stagiaires');
    }

    
    public function destroy($id)
    {
        Stagiaire::find($id)->delete();
        return redirect('/stagiaires');
    }
}