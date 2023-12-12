<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index(){
        $categories = Categorie::all();
        return view('responsable.categories.index')->with('categories',$categories);
    }

    public function create(){
        return view('responsable.categories.create');
    }

    public function store(Request $request){
        $categorie = new Categorie();
        $categorie->intitule_categorie = $request->intitule_categorie;
        $categorie->remarque = $request->remarque;

        if($categorie->save()){
            return redirect('/responsable/categories');
        }
    }

    public function edit($id){
        $categorie = Categorie::find($id);
        return view('responsable.categories.edit')->with('categorie',$categorie);
    }

    public function update(Request $request){
        $categorie = Categorie::find($request->id_categorie);
        $categorie->intitule_categorie = $request->intitule_categorie;
        $categorie->remarque = $request->remarque;

        if($categorie->update()){
            return redirect('/responsable/categories');
        }
    }

    public function destroy($id){
        $categorie = Categorie::find($id);

        if($categorie->delete()){
            return redirect('/responsable/categories');
        }
    }
}
