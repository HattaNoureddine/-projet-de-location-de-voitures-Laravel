<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Voiture;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contrat extends Model
{
    use HasFactory;
    protected $table = 'contrats';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'date_debut', 'date_fin', 'prix_total', 'remarque', 'autre_indeminités', 'voiture_id', 'client_id', 'reservation_id', 'created_at', 'updated_at'];

    public function voiture(){
        return $this->hasOne(Voiture::class,'id','voiture_id');
    }
    public function client(){
        return $this->hasOne(Client::class,'id','client_id');
    }
    public function reservation(){
        return $this->hasOne(Reservation::class,'id','reservation_id');
    }
}
