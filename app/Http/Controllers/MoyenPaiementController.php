<?php

namespace App\Http\Controllers;

use App\Models\MoyenPaiement;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // ! Contrôles
        $result = [
            'type' => 'add-form',
            'state' => 'error',
            'message' => 'Une erreur est survenue'
        ];
        if ($request->isMethod('POST')) {

            //dd($request); //die and dump (Voir le contenu de la requête)

            // Récupération de tous les résultats de la requête
            $data = $request->all();

            // Validation de la requête
            $request->validate([
                'lib_moyen_paiement' => 'required',
            ]);

            // Vérifier si la moyen de paiement est déjà dans la base de données
            $existant = MoyenPaiement::where('lib_moyen_paiement', $data['lib_moyen_paiement'])->first();
            if ($existant != null) { // Si la moyen de paiement existe déjà
                if ($existant->deleted_at == null) {
                    // Message au cas où la moyen de paiement existe déjà
                    $result['state'] = 'warning';
                    $result['message'] = 'Ce moyen de paiement existe déjà. Changer le libellé.';
                } else { // Au cas ou la moyen de paiement avait été supprimée
                    $existant->deleted_at = null;
                    $existant->deleted_by = null;
                    $existant->created_at = now();
                    $existant->created_by = Auth::user()->id;
                    $existant->save();
                    // Message de success
                    $result['state'] = 'success';
                    $result['message'] = 'La moyen de paiement a bien été enregistré';
                }
            } else { // Si la moyen de paiement n'existe pas alors on la crée
                try {
                    // Création d'une nouvelle moyen de paiement
                    $moyen_paiement = new MoyenPaiement;
                    $moyen_paiement->lib_moyen_paiement = $data['lib_moyen_paiement'];
                    $moyen_paiement->created_at = now();
                    $moyen_paiement->created_by = Auth::user()->id;
                    $moyen_paiement->save(); // Sauvegarde
                    // Message de success
                    $result['state'] = 'success';
                    $result['message'] = 'Le moyen de paiement a bien été enregistré';
                } catch (Exception $exc) { // ! En cas d'erreur
                    $result['message'] = $exc->getMessage();
                }
            }
        }
        // Redirection
        return redirect()->route('admin.pages.moyen-paiements', compact('result'));
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
    public function update($lib_moyen_paiement, Request $request)
    {
        // ! Contrôles
        $result = [
            'type' => 'edit-form',
            'state' => 'error',
            'message' => 'Une erreur est survenue'
        ];
        if ($request->isMethod('POST')) {
            // Récupération de tous les résultats de la requête
            $data = $request->all();
            // Recherche et récupération
            $moyen_paiement = MoyenPaiement::where('lib_moyen_paiement', $lib_moyen_paiement)
                ->first();
            // Mise à jour
            if ($moyen_paiement != null) {
                try {
                    $moyen_paiement->lib_moyen_paiement = $data['new_lib'];
                    $moyen_paiement->updated_by = Auth::user()
                        ->id;
                    $moyen_paiement->updated_at = now();
                    $moyen_paiement->save(); // Sauvegarde
                    // Message de success
                    $result['state'] = 'success';
                    $result['message'] = 'Modification réussie';
                } catch (Exception $exc) { // ! En cas d'erreur
                    $result['message'] = $exc->getMessage();
                }
            } else {
                $result['state'] = 'warning';
                $result['message'] = 'Le moyen de paiement est introuvable';
            }
        }
        // Redirection
        return redirect()->route('admin.pages.moyen-paiements', compact('result'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MoyenPaiement  $moyenPaiement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Recherche et récupération du moyen de paiement
        $moyen_paiement = MoyenPaiement::find($id);
        $result = [
            'type' => 'table',
            'state' => 'success',
            'message' => 'Le moyen de paiement a bien été supprimée'
        ];
        try {
            if ($moyen_paiement != null) { // Suppression
                $moyen_paiement->deleted_at = now();
                $moyen_paiement->deleted_by = Auth::user()->id;
                $moyen_paiement->save();
            } else {
                $result['state'] = 'warning';
                $result['message'] = 'Le moyen de paiement est introuvable';
            }
        } catch (Exception $error) {
            $result['state'] = 'error';
            $result['message'] = 'Une erreur est survenue';
        }
        // Redirection
        return redirect()->route('admin.pages.moyen-paiements', compact('result'));
    }

    public function etat()
    {
        // Récupération de tous les enregistrements
        $records = MoyenPaiement::all();
        // Éléments du tableau
        $thead = [
            'Libellé',
        ];
        $tbody = 'admin.etats.components.moyen-paiement-body';
        $title = 'moyens de paiement';
        // Affichage
        return view('admin.etats.etat', compact('records', 'thead', 'tbody', 'title'));
    }
}
