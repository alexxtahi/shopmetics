<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Récupération des données de l'entité
        $clients = Client::join('users', 'users.id', '=', 'clients.id_user')
            ->select('clients.*', 'users.*')
            ->where('clients.deleted_at', null)
            ->get();
        //dd($clients);
        // Récupération des résultats d'opération sur le formulaire si existants
        $result = [];
        if ($request->exists('result')) {
            $result = $request->get('result');
            $result['type'] = 'table';
        }
        // Affichage
        return view('admin.pages.clients.index', compact('clients', 'result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Récupération des données de l'ntité se=électionnée
        $clients = Client::where('deleted_at', null)
            ->get();
        // Récupération des résultats d'opération sur le formulaire si existants
        $result = [];
        if ($request->exists('result')) {
            $result = $request->get('result');
            $result['type'] = 'table';
        }
        // Affichage de la vue
        return view('admin.pages.clients.create', compact('clients', 'result'));
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
                "nom" => "required|string",
                "prenom" => "required|string",
                "email" => "required|email",
                "password" => "required|string",
                "ville" => "required|string",
                "commune" => "required|string",
            ]);

            // Vérifier si l'entité est déjà dans la base de données
            $existant = User::where('email', $data['email'])->first();
            if ($existant != null) { // Si l'entité existe déjà
                if ($existant->deleted_at == null) {
                    // Message au cas où l'entité existe déjà
                    $result['state'] = 'warning';
                    $result['message'] = 'Un compte client avec cette adresse mail existe déjà.';
                } else { // Au cas ou l'entité avait été supprimée
                    $existant->deleted_at = null;
                    $existant->deleted_by = null;
                    $existant->created_at = now();
                    $existant->created_by = Auth::user()
                        ->id;
                    $existant->save();
                    // Message de success
                    $result['state'] = 'success';
                    $result['message'] = 'Le client a bien été enregistré.';
                }
            } else { // Si le produit n'existe pas alors on le crée
                try {
                    // Création d'un nouvel utilisateur
                    $user = new User;
                    $user->nom = $data['nom'];
                    $user->prenom = $data['prenom'];
                    $user->contact = (isset($data['contact']) && !empty($data['contact'])) ? $data['contact'] : null;
                    $user->email = $data['email'];
                    $user->password = bcrypt($data['password']);
                    $user->role = 'Client';
                    $user->created_at = now();
                    $user->created_by = Auth::user()
                        ->id;
                    $user->save(); // Sauvegarde
                    // Association de l'utilisateur au client
                    $client = new Client;
                    $client->ville = $data['ville'];
                    $client->commune = $data['commune'];
                    $client->id_user = $user->id;
                    $client->created_at = now();
                    $client->created_by = Auth::user()
                        ->id;
                    $client->save(); // Sauvegarde
                    // Message de success
                    $result['state'] = 'success';
                    $result['message'] = 'Le client a bien été enregistré.';
                } catch (Exception $exc) { // ! En cas d'erreur
                    $result['message'] = $exc->getMessage();
                }
            }
        }
        // Redirection
        return redirect()
            ->route('admin.pages.clients.create', compact('result'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return $client;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->tokens->each->delete();
        $client->delete();
    }
}
