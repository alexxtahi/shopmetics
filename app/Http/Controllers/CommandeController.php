<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\ProduitCommande;
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

    public function DashboardCmd(){
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
            'admin.pages.commandes.index',
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
    public function edit($id)
    {
        // Récupération des promotions

        $commandes = Commande::join('clients', 'clients.id', '=', 'commandes.id_client')
            ->join('moyen_paiements', 'moyen_paiements.id', '=', 'commandes.id_moyen_paiement')
            // ->join('produit_commandes', 'produit_commandes.id_cmd', '=', 'commandes.id')
            ->select('commandes.*', 'moyen_paiements.lib_moyen_paiement')
            ->where([['commandes.deleted_at', null], ['commandes.id', $id]])
            ->first();

       
    
        return view(
            'admin.pages.commandes.edit',
            [
                'commandes' => $commandes,
                //'total_commandes' => count($commandes),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        // ! Contrôles
        $result = ['state' => 'error', 'message' => 'Une erreur est survenue'];
        if ($request->isMethod('POST')){
            // Récupération de tous les résultats de la requête
            $data = $request->all();
            // Recherche et récupération du commande
            $commande = Commande::find($id);
            
            if ($commande != null) {
                try {
                    $commande->statut_cmd = $data['state'];             
                    $commande->updated_by = Auth::user()
                        ->id;
                    $commande->updated_at = now();
                    $commande->save(); // Sauvegarde
                    // Message de success
                    $result['state'] = 'success';
                    $result['message'] = 'Modification réussie';
                } catch (Exception $exc) { // ! En cas d'erreur
                    $result['message'] = $exc->getMessage();
                }

            } else {
                $result['state'] = 'warning';
                $result['message'] = 'La commande est introuvable';
            }
        }
        return redirect()
            ->route('admin.pages.commandes', compact('result'));
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
