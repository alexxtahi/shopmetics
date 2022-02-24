<?php

namespace App\Models;

use App\Models\User;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentaire extends Model
{
    use HasFactory;

    public function produit(){
        return $this->belongsTo(Produit::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
