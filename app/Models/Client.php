<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //use HasFactory;

    protected $fillable = [

        'nom_client',
        'prenom_client',
        'contact_client',
        'email_client',
        'ville',
        'commune',

    ] ;
}
