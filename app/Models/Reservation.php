<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Contrat;
use App\Models\Voiture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{

    use HasFactory;
    protected $table = 'reservations';
    protected $primaryKey = 'id';
    protected $fillable =['id', 'date_reservation', 'date_debut', 'date_fin', 'prix_par_jour', 'remarque', 'voiture_id', 'client_id', 'created_at', 'updated_at'];


    public function voiture(){
        return $this->hasOne(Voiture::class,'id','voiture_id');
    }

    public function client(){
        return $this->belongsTo(Client::class,'client_id');
    }

    public function contrat()
    {
        return $this->belongsTo(Contrat::class,'id','reservation_id');
    }
}
