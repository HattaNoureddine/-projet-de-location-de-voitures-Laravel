<?php

namespace App\Models;

use App\Models\User;
use App\Models\Client;
use App\Models\CompagnieAssurance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ville extends Model
{
    use HasFactory;
    protected $fillable = ['id','nom'];

    public function clients(){
        return $this->hasMany(Client::class,'ville_id');
    }
    public function users(){
        return $this->hasMany(User::class,'ville');
    }
    public function compagnies(){
        return $this->hasMany(CompagnieAssurance::class,'ville_id');
    }
}
