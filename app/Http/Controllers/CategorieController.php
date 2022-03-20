<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Récupération des produits
        $categories = Categorie::where('categories.deleted_at', null)
            ->orderBy('categories.created_at', 'DESC')
            ->get();
        // Récupération des résultats d'opération sur le formulaire si existants
        $result = [];
        if ($request->exists('result')) {
            $result = $request->get('result');
        }
        // Affichage
        return view('admin.pages.categories.index', compact('categories', 'result'));
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
                'lib_cat' => 'required',
            ]);

            // Vérifier si la catégorie est déjà dans la base de données
            $existant = Categorie::where('lib_cat', $data['lib_cat'])
                ->first();
            if ($existant != null) { // Si la catégorie existe déjà
                if ($existant->deleted_at == null) {
                    // Message au cas où la catégorie existe déjà
                    $result['state'] = 'warning';
                    $result['message'] = 'Cette catégorie existe déjà. Changer le libellé.';
                } else { // Au cas ou la catégorie avait été supprimée
                    $existant->deleted_at = null;
                    $existant->deleted_by = null;
                    $existant->created_at = now();
                    $existant->created_by = Auth::user()
                        ->id;
                    $existant->save();
                    // Message de success
                    $result['state'] = 'success';
                    $result['message'] = 'La catégorie a bien été enregistrée.';
                }
            } else { // Si la catégorie n'existe pas alors on la crée
                try {
                    // Création d'une nouvelle catégorie
                    $categorie = new Categorie;
                    $categorie->lib_cat = $data['lib_cat'];
                    $categorie->created_at = now();
                    $categorie->created_by = Auth::user()
                        ->id;
                    $categorie->save(); // Sauvegarde
                    // Message de success
                    $result['state'] = 'success';
                    $result['message'] = 'La catégorie a bien été enregistrée';
                } catch (Exception $exc) { // ! En cas d'erreur
                    $result['message'] = $exc->getMessage();
                }
            }
        }
        // Redirection
        return redirect()
            ->route('admin.pages.categories', compact('result'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update($lib_cat, Request $request)
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
            $categorie = Categorie::where('lib_cat', $lib_cat)
                ->first();
            // Mise à jour
            if ($categorie != null) {
                try {
                    $categorie->lib_cat = $data['new_lib_cat'];
                    $categorie->updated_by = Auth::user()
                        ->id;
                    $categorie->updated_at = now();
                    $categorie->save(); // Sauvegarde
                    // Message de success
                    $result['state'] = 'success';
                    $result['message'] = 'Modification réussie';
                } catch (Exception $exc) { // ! En cas d'erreur
                    $result['message'] = $exc->getMessage();
                }
            } else {
                $result['state'] = 'warning';
                $result['message'] = 'La catégorie est introuvable';
            }
        }
        // Redirection
        return redirect()
            ->route('admin.pages.categories', compact('result'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Recherche et récupération de la catégorie
        $categorie = Categorie::find($id);
        $result = [
            'type' => 'table',
            'state' => 'success',
            'message' => 'La categorie a bien été supprimée'
        ];
        try {
            if ($categorie != null) { // Suppression
                $categorie->deleted_at = now();
                $categorie->deleted_by = Auth::user()
                    ->id;
                $categorie->save();
            } else {
                $result['state'] = 'warning';
                $result['message'] = 'La catégorie est introuvable';
            }
        } catch (Exception $error) {
            $result['state'] = 'error';
            $result['message'] = 'Une erreur est survenue';
        }
        // Redirection
        return redirect()
            ->route('admin.pages.categories', compact('result'));
    }
}
