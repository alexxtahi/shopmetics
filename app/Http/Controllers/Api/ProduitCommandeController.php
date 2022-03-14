<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Models\ProduitCommande;

class ProduitCommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()
            ->json(ProduitCommande::all());
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
    public function store(Request $input)
    {
        $input->validate([

            "qte_cmd" => "required|string|max:255",
            "prix_prod_actuel" => "required|string|max:255",
            "id_prod" => "required|string|max:20",
            "id_cmd" => "required|email|max:255",

        ]);

        ProduitCommande::create([

            "id_cmd" => $input->id_cmd,
            "prix_prod_actuel" => $input->prix_prod_actuel,
            "id_prod" => $input->contact_admin,
            "id_cmd" => $input->email_admin,

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProduitCommande  $produitCommande
     * @return \Illuminate\Http\Response
     */
    public function show(ProduitCommande $produitCommande)
    {
        return $produitCommande;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProduitCommande  $produitCommande
     * @return \Illuminate\Http\Response
     */
    public function edit(ProduitCommande $produitCommande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProduitCommande  $produitCommande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProduitCommande $produitCommande)
    {
        $produitCommande->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProduitCommande  $produitCommande
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProduitCommande $produitCommande)
    {
        $produitCommande->delete();
    }
}
