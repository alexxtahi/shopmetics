<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Panier extends Model
{
    use HasFactory;
    protected $table = 'paniers' ;
    
    protected $fillable = [
        
        'id_prod',
        'id_users',
        'qt_prod',
    
    ];

    public function produits(){
        return $this->belongsTo(Produit::class, 'id_prod', 'id') ;
    }

}
