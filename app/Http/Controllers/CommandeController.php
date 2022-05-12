<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Panier;
use App\Models\ProduitCommande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Récupération des promotions
        $commandes = Commande::join('clients', 'clients.id', '=', 'commandes.id_client')
            ->join('moyen_paiements', 'moyen_paiements.id', '=', 'commandes.id_moyen_paiement')
            // ->join('produit_commandes', 'produit_commandes.id_cmd', '=', 'commandes.id')
            ->select('commandes.*', 'moyen_paiements.lib_moyen_paiement')
            ->where([['commandes.deleted_at', null], ['clients.id_user', Auth::user()->id]])
            ->get();
        // Récupérer les produits liés à la commande
        foreach ($commandes as $commande) {
            $commande['produits'] = ProduitCommande::join('produits', 'produits.id', '=', 'produit_commandes.id_prod')
                ->select('produit_commandes.*', 'produits.designation')
                ->where('produit_commandes.id_cmd', $commande->id)
                ->get();
        }
        // dd($commandes);
        // Appel de la vue en passant les données
        return view(
            'commandes',
            [
                'commandes' => $commandes,
                'total_commandes' => count($commandes),
            ]
        );
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
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {
        //
    }
}
