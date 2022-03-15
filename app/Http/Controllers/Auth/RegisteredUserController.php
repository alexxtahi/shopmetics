<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Produit;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Controllers\HomeController;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'max:255'],
        ]);
        // Création de l'utilisateur
        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'contact' => $request->contact,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        // Création du client associé à l'utilisateur
        $client = new Client;
        $client->ville = $request->ville;
        $client->commune = $request->commune;
        $client->id_user = $user->id;
        $client->save();

        $welcome_text = "Bienvenue M./Mme. $user->nom sur Shopmetics !\nLa plateforme en ligne de vente de produits comestiques en Côte d'Ivoire";

        event(new Registered($user));
        // auto connexion de l'utilisateur
        Auth::login($user);
        // redirection sur la page d'accueil
        $home = new HomeController;
        return $home->index(compact('welcome_text'));
        //return redirect()->url(RouteServiceProvider::HOME, compact('welcome_msg'));
    }
}
