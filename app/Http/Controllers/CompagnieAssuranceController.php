<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use Illuminate\Http\Request;
use App\Models\CompagnieAssurance;

class CompagnieAssuranceController extends Controller
{
    public function index(){
        $compagnies = CompagnieAssurance::all();
        return view('responsable.compagnies.index')->with('compagnies',$compagnies);
    }

    public function create(){
        $villes = Ville::all();
        return view('responsable.compagnies.create')->with('villes',$villes);
    }

    public function store(Request $request){
        $compagnie = new CompagnieAssurance();
        $compagnie->nom = $request->nom;
        $compagnie->addresse = $request->addresse;
        $compagnie->tel = $request->tel;
        $compagnie->email = $request->email;
        $compagnie->remarque = $request->remarque;
        $compagnie->ville_id = $request->ville;

        if($compagnie->save()){
            return redirect('/responsable/compagnies');
        }
    }

    public function destroy($id){
        $compagnie = CompagnieAssurance::find($id);
        if($compagnie->delete()){
            return redirect('/responsable/compagnies');
        }
    }
}
