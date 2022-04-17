<?php

namespace App\Models;

use App\Models\User;
use App\Models\Commentaire;
use App\Models\Caracteristique;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;

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

    ];

    public function caracteristiques()
    {
        return $this->hasOne(Caracteristique::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}
