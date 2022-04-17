<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Caracteristique extends Model
{
    use HasFactory;

    public function produits()
    {

        return $this->belongsTo(Produit::class);
    }
}
