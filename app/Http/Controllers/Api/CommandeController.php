<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;
use Illuminate\Console\Command;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()
            ->json(Command::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

            "date_cmd" => "required|string|max:255",
            "statut_cmd" => "required|string|max:255",
            "id_client" => "required|string|max:20",
            "id_moyen_paiement" => "required|email|max:255",

        ]);

        Commande::create([

            "date_cmd" => $input->date_cmd,
            "statut_cmd" => $input->statut_cmd,
            "id_client" => $input->id_client,
            "id_moyen_paiement" => $input->id_moyen_paiement,

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        return $commande;
    }
}
