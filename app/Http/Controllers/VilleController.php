<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use Illuminate\Http\Request;

class VilleController extends Controller
{
    public function index(){
        $villes = Ville::all();
        return view('responsable.villes.index')->with('villes',$villes);
    }

    public function create(){
        return view('responsable.villes.create');
    }

    public function store(Request $request){
        $validation = $request->validate([
            'nom' =>'required'
        ],[
            'nom.required' => 'Le champ nom est obligatoire.'
        ]);

        $ville = new Ville();
        $ville->nom = $request->nom;
        if($ville->save()){
            return redirect('/responsable/villes');
        }
    }

    public function edit($id){
        $ville = Ville::find($id);
        return view('responsable.villes.edit')->with('ville',$ville);
    }


    public function update(Request $request){
        $validation = $request->validate([
            'nom' =>'required'
        ],[
            'nom.required' => 'Le champ nom est obligatoire.'
        ]);

        $ville = Ville::find($request->id_ville);
        $ville->nom = $request->nom;
 
    if($ville->save()){
        return redirect('/responsable/villes');
    }
}

    public function destroy($id){
        $ville = Ville::find($id);
        if($ville->delete()){
            return redirect()->back();
        }
    }
}
