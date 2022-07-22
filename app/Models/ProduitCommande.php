<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProduitCommande extends Model
{
    //use HasFactory;

    protected $fillable = [

        'qte_cmd',
        'prix_prod_actuel',
        'id_prod',
        'id_cmd',

    ] ;

    /*public function produits(){
        return  $this->hasMany(Produit::class) ;
    }*/

    public function produits(){
        return $this->belongsTo(Produit::class, 'id_prod', 'id') ;
    }

}
