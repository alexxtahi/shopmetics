<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Méthode pour créer un nouvel utilisateur
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // ! Contrôles
        $result = ['state' => 'error', 'message' => 'Une erreur est survenue.'];
        if ($request->isMethod('POST')) {

            //dd($request); //die and dump (Voir le contenu de la requête)

            // Récupération de tous les résultats de la requête
            $data = $request->all();

            // Validation de la requête
            $request->validate([
                'name' => 'required',
                'lastname' => 'required',
                'email' => 'required',
                'password' => 'required',
                'confirm-password' => 'required',
                'ville' => 'required',
                'commune' => 'required',
            ]);

            // Vérifier si l'adresse mail est déjà dans la base de données
            $userExist = User::where('email', $data['email'])
                ->first();
            if ($userExist != null) { // Si le compte existe alors on informe l'utilisateur
                // Message au cas où le compte existe déjà
                $result['state'] = 'warning';
                $result['message'] = 'Ce compte existe déjà.';
            } else if ($data['password'] != $data['confirm-password']) {
                // Message au cas où les mots de passe diffèrent
                $result['state'] = 'warning';
                $result['message'] = 'Les mots de passe saisis diffèrent.';
            } else { // Si le compte n'existe pas alors on le crée
                try {
                    // Création d'un nouvel utilisateur
                    $user = new User;
                    $user->nom = $data['name'];
                    $user->prenom = $data['lastname'];
                    $user->email = $data['email'];
                    $user->contact = (isset($data['contact']) && !empty($data['contact'])) ? $data['contact'] : null; // Saisie du contact s'il n'est pas nul
                    $user->password = bcrypt($data['password']); // la fonction bcrypt() retourne le hash du mot passé en paramètre
                    $user->role = 'Client';
                    $user->created_at = now();
                    $user->save(); // Sauvegarde de l'utilisateur
                    // Création d'un nouveau client associé à l'utilisateur
                    $client = new Client;
                    $client->ville = $data['ville'];
                    $client->commune = $data['commune'];
                    $client->id_user = $user->id; // Association de la clé de l'utilisateur au client
                    $client->created_at = now();
                    $client->save(); // Sauvegarde du client
                    // Message de success
                    $result['state'] = 'success';
                    $result['message'] = 'Votre compte a bien été enregistré.';
                } catch (Exception $exc) { // ! En cas d'erreur
                    $result['message'] = $exc->getMessage();
                }
            }
        }
        // Redirection
        return view('register', $result);
    }
}
