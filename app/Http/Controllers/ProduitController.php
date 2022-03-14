<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Récupération des données de l'entité
        $produits = Produit::join('categories', 'categories.id', '=', 'produits.id_cat')
            ->select('produits.*', 'categories.lib_cat as lib_cat')
            ->where('produits.deleted_at', null)
            ->get();
        // Récupération des résultats d'opération sur le formulaire si existants
        $result = [];
        if ($request->exists('result')) {
            $result = $request->get('result');
            $result['type'] = 'table';
        }
        // Affichage
        return view('admin.pages.produits.index', compact('produits', 'result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Récupération des categories et des sous catégories
        $categories = Categorie::where('deleted_at', null)
            ->get();
        // Récupération des résultats d'opération sur le formulaire si existants
        $result = [];
        if ($request->exists('result')) {
            $result = $request->get('result');
            $result['type'] = 'table';
        }
        // Affichage de la vue
        return view('admin.pages.produits.create', compact('categories', 'result'));
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
        $result = ['state' => 'error', 'message' => 'Une erreur est survenue'];
        if ($request->isMethod('POST')) {

            //dd($request); //die and dump (Voir le contenu de la requête)

            // Récupération de tous les résultats de la requête
            $data = $request->all();

            // Validation de la requête
            $request->validate([
                'code_prod' => 'required',
                'designation' => 'required',
                'prix_prod' => 'required',
                'id_cat' => 'required',
            ]);

            // Vérifier si le code du produit est déjà dans la base de données
            $existant = Produit::where('code_prod', $data['code_prod'])
                ->orWhere('designation', $data['designation'])
                ->first();
            if ($existant != null) { // Si le produit existe déjà
                if ($existant->deleted_at == null) {
                    // Message au cas où le produit existe déjà
                    $result['state'] = 'warning';
                    $result['message'] = 'Ce produit existe déjà. Changer le code ou la désignation.';
                } else { // Au cas ou la catégorie avait été supprimée
                    $existant->deleted_at = null;
                    $existant->deleted_by = null;
                    $existant->created_at = now();
                    $existant->created_by = Auth::user()
                        ->id;
                    $existant->save();
                    // Message de success
                    $result['state'] = 'success';
                    $result['message'] = 'Le produit a bien été enregistré.';
                }
            } else { // Si le produit n'existe pas alors on le crée
                try {
                    // Création d'un nouveau produit
                    $produit = new Produit;
                    $produit->code_prod = $data['code_prod'];
                    $produit->designation = $data['designation'];
                    $produit->prix_prod = $data['prix_prod'];
                    $produit->id_cat = $data['id_cat'];
                    $produit->qte_prod = $data['qte_prod'];
                    $produit->description = (isset($data['description']) && !empty($data['description'])) ? $data['description'] : null;
                    // Enregistrement de l'image du produit s'il y'en a
                    if (isset($data['img_prod']) && !empty($data['img_prod'])) {
                        $produit->img_prod = 'assets/img/produits/' . $data['img_prod'];
                        $img_prod = Image::make($data['img_prod']->getRealPath());
                        $img_prod->resize(300, 300);
                        $img_prod->save(public_path('/assets/img/produits/' . $data['img_prod']->getClientOriginalName()));
                    }
                    $produit->created_at = now();
                    $produit->created_by = Auth::user()
                        ->id;
                    $produit->save(); // Sauvegarde
                    // Message de success
                    $result['state'] = 'success';
                    $result['message'] = 'Le produit a bien été enregistré.';
                } catch (Exception $exc) { // ! En cas d'erreur
                    $result['message'] = $exc->getMessage();
                }
            }
        }
        // Redirection
        return redirect()
            ->route('admin.pages.produits.create', compact('result'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Recherche et récupération du produit
        $produit = Produit::join('categories', 'categories.id', '=', 'produits.id_cat')
            ->select('produits.*', 'categories.lib_cat as lib_cat')
            ->where([['produits.deleted_at', null], ['produits.id', $id]])
            ->first();
        // Récupération des categories et des sous catégories
        $categories = Categorie::where('deleted_at', null)
            ->get();
        // Affichage de la vue
        return view('admin.pages.produits.edit', compact('produit', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        // ! Contrôles
        $result = ['state' => 'error', 'message' => 'Une erreur est survenue'];
        if ($request->isMethod('POST')) {
            // Récupération de tous les résultats de la requête
            $data = $request->all();
            // Recherche et récupération du produit
            $produit = Produit::find($id);
            // Mise à jour
            if ($produit != null) {
                try {
                    $produit->code_prod = $data['code_prod'];
                    $produit->designation = $data['designation'];
                    $produit->prix_prod = $data['prix_prod'];
                    $produit->id_cat = $data['id_cat'];
                    $produit->qte_prod = $data['qte_prod'];
                    $produit->description = (isset($data['description']) && !empty($data['description'])) ? $data['description'] : null;
                    // Enregistrement de l'image du produit s'il y'en a
                    if (isset($data['img_prod']) && !empty($data['img_prod'])) {
                        $produit->img_prod = 'assets/img/produits/' . $data['img_prod'];
                        $img_prod = Image::make($data['img_prod']->getRealPath());
                        $img_prod->resize(300, 300);
                        $img_prod->save(public_path('/assets/img/produits/' . $data['img_prod']->getClientOriginalName()));
                    }
                    $produit->updated_by = Auth::user()
                        ->id;
                    $produit->updated_at = now();
                    $produit->save(); // Sauvegarde
                    // Message de success
                    $result['state'] = 'success';
                    $result['message'] = 'Modification réussie';
                } catch (Exception $exc) { // ! En cas d'erreur
                    $result['message'] = $exc->getMessage();
                }
            } else {
                $result['state'] = 'warning';
                $result['message'] = 'Le produit est introuvable';
            }
        }
        // Redirection
        return redirect()
            ->route('admin.pages.produits', compact('result'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Recherche et récupération du produit
        $produit = Produit::find($id);
        $result = [
            'state' => 'success',
            'message' => 'Le produit a bien été supprimé'
        ];
        // dd($produit);
        try {
            if ($produit != null) { // Suppression
                $produit->deleted_at = now();
                $produit->deleted_by = Auth::user()
                    ->id;
                $produit->save();
            } else {
                $result = [
                    'state' => 'warning',
                    'message' => "Produit introuvable",
                ];
            }
        } catch (Exception $error) {
            $result = [
                'state' => 'error',
                'message' => "Une erreur est survenue",
            ];
        }
        // Redirection
        return redirect()
            ->route('admin.pages.produits', compact('result'));
    }
}
