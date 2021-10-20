<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use App\Models\SousCategorie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;
use Intervention\Image\ImageManagerStatic as Image;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $categories = Categorie::where('deleted_at', null)->get();
        // Récupération des résultats d'opération sur le formulaire si existants
        $data = $request->all();
        $result = [];
        if (isset($data['result'])) $result = $request->get('result');
        // Affichage de la vue
        return view('admin.produit.create', compact('categories', 'result'));
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
        $result = ['register_state' => 'error', 'register_message' => 'Une erreur est survenue.'];
        if ($request->isMethod('POST')) {

            //dd($request); //die and dump (Voir le contenu de la requête)

            // ? Récupération de tous les résultats de la requête
            $data = $request->all();

            // ? Validation de la requête
            $request->validate([
                'code_prod' => 'required',
                'designation' => 'required',
                'prix_prod' => 'required',
                'id_cat' => 'required',
            ]);

            // ? Vérifier si le code du produit est déjà dans la base de données
            $prodExist = Produit::where('code_prod', $data['code_prod'])->orWhere('designation', $data['designation'])->first();
            if ($prodExist != null) { // Si le produit existe déjà
                // Message au cas où le produit existe déjà
                $result['register_state'] = 'warning';
                $result['register_message'] = 'Ce produit existe déjà. Changer le code ou la désignation.';
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
                    $produit->save(); // Sauvegarde
                    // Message de success
                    $result['register_state'] = 'success';
                    $result['register_message'] = 'Le produit a bien été enregistré.';
                } catch (Exception $exc) { // ! En cas d'erreur
                    $result['register_message'] = $exc->getMessage();
                }
            }
        }
        // ? Redirection
        return redirect()->route('admin.produits.create', compact('result'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        //
    }

    public function search(){

        $q = request()->input('q') ;

        //$produits = Produit::where('designation', 'Like', "$q");

        $produits = DB::table('produits')->where('designation', 'Like', "%$q%")->get();
        $categories = DB::table('categories')->get();


        return view('boutique')->with('produits', $produits)->with('categories', $categories);


    }
}
