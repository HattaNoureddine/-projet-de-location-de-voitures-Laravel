<?php

namespace App\Models;

use App\Models\Voiture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContratAssurance extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'date_début', 'date_fin', 'remarque', 'voiture_id', 'created_at', 'updated_at'];
    
    public function voiture(){
        return $this->hasOne(Voiture::class,'id','voiture_id');
    }
}
