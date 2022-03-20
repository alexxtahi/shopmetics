<?php

namespace App\Http\Controllers;

use App\Models\MoyenPaiement;
use Illuminate\Http\Request;

class MoyenPaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Récupération des données
        $moyen_paiements = MoyenPaiement::where('moyen_paiements.deleted_at', null)
            ->orderBy('moyen_paiements.created_at', 'DESC')
            ->get();
        // Récupération des résultats d'opération sur le formulaire si existants
        $result = [];
        if ($request->exists('result')) {
            $result = $request->get('result');
        }
        // Affichage
        return view('admin.pages.moyen-paiements.index', compact('moyen_paiements', 'result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MoyenPaiement  $moyenPaiement
     * @return \Illuminate\Http\Response
     */
    public function show(MoyenPaiement $moyenPaiement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MoyenPaiement  $moyenPaiement
     * @return \Illuminate\Http\Response
     */
    public function edit(MoyenPaiement $moyenPaiement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MoyenPaiement  $moyenPaiement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MoyenPaiement $moyenPaiement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MoyenPaiement  $moyenPaiement
     * @return \Illuminate\Http\Response
     */
    public function destroy(MoyenPaiement $moyenPaiement)
    {
        //
    }
}
