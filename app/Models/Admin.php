<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //use HasFactory;

    protected $fillable = [

        'nom_admin',
        'prenom_admin',
        'contact_cadmin',
        'email_admin',
    ] ;
}
