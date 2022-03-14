<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SousCategorie;

class SousCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()
            ->json(SousCategorie::all());
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

            "lib_sous_cat" => "required|string|max:255",
            "id_cat" => "required|string|max:255",

        ]);

        SousCategorie::create([
            "lib_sous_cat" => $input->lib_sous_cat,
            "id_cat" => $input->id_cat,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SousCategorie  $sousCategorie
     * @return \Illuminate\Http\Response
     */
    public function show(SousCategorie $sousCategorie)
    {
        return $sousCategorie;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SousCategorie  $sousCategorie
     * @return \Illuminate\Http\Response
     */
    public function edit(SousCategorie $sousCategorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SousCategorie  $sousCategorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SousCategorie $sousCategorie)
    {
        $sousCategorie->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SousCategorie  $sousCategorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(SousCategorie $sousCategorie)
    {
        $sousCategorie->delete();
    }
}
