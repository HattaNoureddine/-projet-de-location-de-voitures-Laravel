<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    public function index(){
        $marques = Marque::all();
        return view('responsable.marques.index')->with('marques',$marques);
    }

    public function create(){
        return view('responsable.marques.create');
    }

    public function store(Request $request){
        $marque = new Marque();
        $marque->intitule_marque = $request->intitule_marque;
        $marque->remarque = $request->remarque;

        if($marque->save()){
            return redirect('/responsable/marques');
        }
    }

    public function edit($id){
        $marque = Marque::find($id);
        return view('responsable.marques.edit')->with('marque',$marque);
    }

    public function update(Request $request){
        $marque = Marque::find($request->id_marque);
        $marque->intitule_marque = $request->intitule_marque;
        $marque->remarque = $request->remarque;

        if($marque->update()){
            return redirect('/responsable/marques');
        }
    }

    public function destroy($id){
        $marque = Marque::find($id);

        if($marque->delete()){
            return redirect('/responsable/marques');
        }
    }
}
