<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remarque extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'intitule_marque', 'remarque', 'created_at', 'updated_at'];

    public function voiture(){
        return $this->belongsTo(Voiture::class);
    }
}
