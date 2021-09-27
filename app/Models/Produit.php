<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    // use HasFactory;

    protected $fillable = [

        'code_pro',
        'designation',
        'description',
        'qte_produit',
        'img_prod',
        'prix_prod',
        'ancien_prod',
        'id_cat',
        'id_sous_cat',

    ] ;
}
