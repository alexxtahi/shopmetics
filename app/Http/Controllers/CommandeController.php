<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\ProduitCommande;
use Exception;
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

    public function DashboardCmd()
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
                ->orderBy('created_at')
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content_prod_cmd = array();

        // Récupération des commandes
        $commandes = Commande::join('clients', 'clients.id', '=', 'commandes.id_client')
            ->join('users', 'users.id', '=', 'clients.id_user')
            ->join('moyen_paiements', 'moyen_paiements.id', '=', 'commandes.id_moyen_paiement')
            // ->join('produit_commandes', 'produit_commandes.id_cmd', '=', 'commandes.id')
            ->select('commandes.*', 'users.nom as nom_client', 'users.prenom as prenom_client', 'moyen_paiements.lib_moyen_paiement')
            ->where([['commandes.deleted_at', null], ['commandes.id', $id]])
            ->first();
        // affichages des produits commandés et leur informations
        if (Auth::check()) {
            $cmd = Commande::where('id', $id)->first();
            $prod_cmd = ProduitCommande::where('id_cmd', $cmd->id)->get();
            foreach ($prod_cmd as $prod_cmds) {
                $prod = Produit::where('id', $prod_cmds->id_prod)->get();
                $content_prod_cmd[] = $prod;
            }
            //dd($content_prod_cmd[0]);
        }
        // Etats possibles d'une commande
        $etats_cmd = ['En attente', 'Validée', 'Livrée'];
        // Affichage de la vue
        return view(
            'admin.pages.commandes.edit',
            [
                'commandes' => $commandes,
                'prix_prod_cmd'  => $prod_cmd,
                'prod' => $content_prod_cmd,
                'etats_cmd' => $etats_cmd,
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

        $result = ['state' => 'error', 'message' => 'Une erreur est survenue'];
        if ($request->isMethod('POST')) {
            // Récupération de tous les résultats de la requête

            // Recherche et récupération du commande
            $commande = Commande::find($id);
            //dd($commande);

            if ($commande != null) {
                try {
                    $commande->statut_cmd = $request->etat_cmd;
                    $commande->updated_by = Auth::user()->id;
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
        return redirect()->route('dashboard', compact('result'))->with('result', $result);
    }

    public function etat()
    {
        // Récupération de tous les enregistrements
        $records = Commande::join('clients', 'clients.id', '=', 'commandes.id_client')
            ->join('moyen_paiements', 'moyen_paiements.id', '=', 'commandes.id_moyen_paiement')
            // ->join('produit_commandes', 'produit_commandes.id_cmd', '=', 'commandes.id')
            ->select('commandes.*', 'moyen_paiements.lib_moyen_paiement')
            ->where([['commandes.deleted_at', null], ['clients.id_user', Auth::user()->id]])
            ->get();
        // Éléments du tableau
        $thead = [
            'Code',
            'Date',
            'Statut',
            'No. Client',
            'Moyen de paiement',
        ];
        $tbody = 'admin.etats.components.commande-body';
        $title = 'commandes';
        // Affichage
        return view('admin.etats.etat', compact('records', 'thead', 'tbody', 'title'));
    }
}
