<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitCommande extends Model
{
    //use HasFactory;

    protected $fillable = [

        'qte_cmd',
        'prix_prod_actuel',
        'id_prod',
        'id_cmd',

    ] ;

}
