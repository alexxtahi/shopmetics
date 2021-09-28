<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin ;


class AdminController extends Controller
{
    public function index()
    {

        return response()->json(Admin::all()) ;
    }

    public function store(Request $input)
    {
        $input ->validate([

            "nom_admin" => "required|string|max:255",
            "prenom_admin" => "required|string|max:255",
            "contact_admin" => "required|string|max:20",
            "email_admin" => "required|email|max:255",

        ]) ;

        Admin::create([

            "nom_admin" => $input -> nom_admin,
            "prenom_admin" => $input -> prenom_admin,
            "contact_admin" => $input -> contact_admin,
            "email_admin" => $input -> email_admin,

        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        return $admin ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $admin->update($request->all()) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete() ;
    }
}
