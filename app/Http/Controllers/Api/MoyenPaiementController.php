<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MoyenPaiement;

class MoyenPaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()
            ->json(MoyenPaiement::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $input)
    {
        //
        $input->validate([
            "lib_moyen_paiement" => "required|string|max:255",
        ]);

        MoyenPaiement::create([
            "lib_moyen_paiement" => $input->lib_moyen_paiement,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MoyenPaiement  $moyenPaiement
     * @return \Illuminate\Http\Response
     */
}
