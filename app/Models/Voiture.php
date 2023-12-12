<?php

namespace App\Models;

use App\Models\Marque;
use App\Models\Contrat;
use App\Models\Categorie;
use App\Models\Typemoteur;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voiture extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'image', 'immatruculation', 'module', 'année_achat', 'prix_achat', 'nbr_place', 'prix', 'prix_promotion', 'etat', 'marque_id', 'categorie', 'typemoteur', 'created_at', 'updated_at'];

    public function marque()
    {
        return $this->belongsTo(Marque::class,'marque_id');
    }
    
    public function categorie()
    {
        return $this->belongsTo(Categorie::class,'categorie_id');
    }
    
    public function typemoteur()
    {
        return $this->belongsTo(Typemoteur::class,'typemoteur_id');
    }

    public function contratassurance(){
        return $this->belongsTo(Contrat::class,'id','voiture_id');
    }

    public function reservation() {
        return $this->belongsTo(Reservation::class,'id','voiture_id');
    }

    public function contrat(){
        return $this->belongsTo(Contrat::class,'id','voiture_id');
    }

    public function remarque(){
        return $this->hasMany(Remarque::class);
    }

}
