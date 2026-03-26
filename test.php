<?php

$q1 = Annonce::findOrFail(20);

$q2 = Annonce::where('ville', 'Fès')->get();

$q3 = Annonce::where('titre', 'like', '%R+2%')
            ->orWhere('description', 'like', '%R+2%')->get();

$q4 = Annonce::whereIn('type', ['villa', 'maison'])->get();

$q5 = Annonce::where('neuf', false)
            ->orWhere('prix', '<=', 400000)->get();

$q6 = Annonce::latest()->first();

$q7 = Annonce::where('neuf', true)
            ->whereBetween('superficie', [70, 100])->get();

$q8 = Annonce::where('type', 'appartement')
            ->latest()->limit(4)->get();

$q9 = Annonce::select('ville')->distinct()->get();

$q10 = Annonce::where('type', 'appartement')
            ->select('titre', 'prix')
            ->selectRaw('prix * 0.95 as nouveau_prix')->get();

$q11 = Annonce::where('created_at', '<', now()->subYears(2))
            ->where('updated_at', '<', now()->subMonths(3))->delete();

$q12 = Annonce::where('ville', 'Meknès')->count();

$q13 = Annonce::orderBy('prix', 'DESC')->first();

$q14 = Annonce::where('type', 'appartement')->min('superficie');

$q15 = Annonce::selectRaw('type, avg(prix) as moyenne_prix')
            ->groupBy('type')->get();

$q16 = Annonce::selectRaw('ville, count(*) as nombre_annonces')
            ->groupBy('ville')->get();

$q17 = Annonce::selectRaw('ville, count(*) as nombre_annonces')
            ->groupBy('ville')
            ->orderBy('nombre_annonces', 'DESC')->first();

$q18 = Annonce::selectRaw('ville, avg(superficie) as moyenne_superficie')
            ->groupBy('ville')
            ->havingBetween('moyenne_superficie', [100, 150])->get();