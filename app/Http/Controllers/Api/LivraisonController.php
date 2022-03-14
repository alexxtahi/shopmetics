<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Livraison;

class LivraisonController extends Controller
{
    // 'code_livraison',

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()
            ->json(Livraison::all());
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
            "code_livraison" => "required|string|max:255",
        ]);

        Livraison::create([
            "code_livraison" => $input->code_livraison,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function show(Livraison $livraison)
    {
        //
    }
}
