<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()
            ->json(Produit::all());
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

            "nom_admin" => "required|string|max:255",
            "prenom_admin" => "required|string|max:255",
            "contact_admin" => "required|string|max:20",
            "email_admin" => "required|email|max:255",

        ]);

        Produit::create([

            "code_pro" => $input->code_pro,
            "designation" => $input->designation,
            "description" => $input->description,
            "qte_produit" => $input->qte_produit,
            "img_prod" => $input->img_prod,
            "prix_prod" => $input->prix_prod,
            "ancien_prod" => $input->ancien_prod,
            "id_cat" => $input->id_cat,
            "id_sous_cat" => $input->id_sous_cat,

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        return $produit;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        $produit->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();
    }
}
