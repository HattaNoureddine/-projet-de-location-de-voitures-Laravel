<?php

namespace App\Models;

use App\Models\Voiture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'intitule_categorie', 'remarque', 'created_at', 'updated_at'];

    public function voitures(){
        return $this->hasMany(Voiture::class);
    }
}
