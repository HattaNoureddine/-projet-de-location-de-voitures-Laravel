<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nom', 'prenom', 'email', 'tel', 'cin', 'num_passport', 'num_permi', 'image_permi', 'ville', 'created_at', 'updated_at'];

    public function ville(){
        return $this->belongsTo(Ville::class,'ville_id');
    }

    public function reservation(){
        return $this->hasMany(Reservation::class,'client_id');
    }

    public function contrat(){
        return $this->belongsTo(Contrat::class,'id','client_id');
    }
}
