<?php

namespace App\Http\Controllers;

use App\Models\Typemoteur;
use Illuminate\Http\Request;

class TypemoteurController extends Controller
{
    public function index(){
        $typemoteurs = Typemoteur::all();
        return view('responsable.typemoteurs.index')->with('typemoteurs',$typemoteurs);
    }

    public function create(){
        return view('responsable.typemoteurs.create');
    }

    public function store(Request $request){
        $typemoteur = new Typemoteur();
        $typemoteur->intitule_moteur = $request->intitule_moteur;
        $typemoteur->remarque = $request->remarque;

        if($typemoteur->save()){
            return redirect('/responsable/typemoteurs');
        }
    }

    public function edit($id){
        $typemoteur = Typemoteur::find($id);
        return view('responsable.typemoteurs.edit')->with('typemoteur',$typemoteur);
    }

    public function update(Request $request){
        $typemoteur = Typemoteur::find($request->id_typemoteur);
        $typemoteur->intitule_moteur = $request->intitule_moteur;
        $typemoteur->remarque = $request->remarque;

        if($typemoteur->update()){
            return redirect('/responsable/typemoteurs');
        }
    }

    public function destroy($id){
        $typemoteur = Typemoteur::find($id);

        if($typemoteur->delete()){
            return redirect('/responsable/typemoteurs');
        }
    }
}
