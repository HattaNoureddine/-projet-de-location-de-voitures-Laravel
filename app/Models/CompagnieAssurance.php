<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompagnieAssurance extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nom', 'addresse', 'tel', 'email', 'remarque', 'ville_id', 'created_at', 'updated_at'];

    public function ville(){
    return $this->belongsTo(Ville::class,'ville_id');
    }
}
