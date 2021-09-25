<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::All() ;
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

    public function store(Request $input)
    {
        $input ->Validate([

            "nom_client" => "required|string|max:255|unique:Client,name",
            "prenom_client" => "required|string|max:255|unique:Client,name",
            "contact_client" => "required|string|max:20",
            "email_client" => "required|email|max:255|unique:Client,email",
            "ville" => "required|string|max:225",
            "commune" => "required|string|max:255",

        ]) ;

        Client::create([

            "nom_client" => $input -> nom_client,
            "prenom_client" => $input -> prenom_client,
            "contact_client" => $input -> contact_client,
            "email_client" => $input -> email_client,
            "ville" => $input -> ville ,
            "commune" => $input -> commune ,

        ]);
    }






    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return $client ;
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
        $client->update($request->all()) ;
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->deleteProfilePhoto() ;
        $client->tokens->each->delete() ;
        $client->delete() ;
    }


}


