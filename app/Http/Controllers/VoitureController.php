<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Models\Voiture;
use App\Models\Categorie;
use App\Models\Typemoteur;
use Illuminate\Http\Request;
use Illuminate\View\ViewException;
use Illuminate\Support\Facades\File;

class VoitureController extends Controller
{
    public function index(){
        $voitures = Voiture::all();
        return view('responsable.voitures.index')->with('voitures',$voitures);
    }

    public function create(){
        $categories = Categorie::all();
        $typemoteurs = Typemoteur::all();
        $marques = Marque::all();
        return view('responsable.voitures.create')->with('categories',$categories)->with('typemoteurs',$typemoteurs)->with('marques',$marques);
    }

    public function store(Request $request){
        $voiture =  new Voiture();
        $voiture->immatruculation = $request->immatruculation;
        $voiture->nom = $request->nom;
        $voiture->module = $request->module;
        $voiture->année_achat = $request->année_achat;
        $voiture->prix_achat = $request->prix_achat;
        $voiture->nbr_place = $request->nbr_place;
        $voiture->prix = $request->prix;
        $voiture->prix_promotion = $request->prix_promotion;
        $voiture->etat = $request->etat;
        $voiture->marque_id = $request->marque;
        $voiture->categorie_id = $request->categorie;
        $voiture->typemoteur_id = $request->typemoteur;

        //télécharger une image
        $newName = uniqid();
        $image = $request->file('image');
        $newName.=".".$image->getClientOriginalExtension();
        $destinationPath = 'upload';
        $image->move($destinationPath,$newName);
        $voiture->image = $newName;
        if($voiture->save()){
            return redirect('/responsable/voitures');
        }
    }

    public function edit($id){
        $marques = Marque::all();
        $categories = Categorie::all();
        $typemoteurs = Typemoteur::all();
        $voiture = Voiture::find($id);
        return view('responsable.voitures.edit')->with('marques',$marques)
                                                        ->with('categories',$categories)
                                                        ->with('typemoteurs',$typemoteurs)
                                                        ->with('voiture',$voiture);
    }

    public function update(Request $request){
        $voiture = Voiture::find($request->voiture_id);
        $voiture->nom = $request->nom;
        $voiture->immatruculation = $request->immatruculation;
        $voiture->module = $request->module;
        $voiture->année_achat = $request->année_achat;
        $voiture->prix_achat = $request->prix_achat;
        $voiture->nbr_place = $request->nbr_place;
        $voiture->prix = $request->prix;
        $voiture->prix_promotion = $request->prix_promotion;
        $voiture->marque_id = $request->marque;
        $voiture->categorie_id = $request->categorie;
        $voiture->typemoteur_id = $request->typemoteur;

        if($request->file('image')){

            $destination = 'upload/'.$voiture->image_permi;

            if(File::exists($destination)){
                //supprimer les dernier image
                File::delete($destination);
            }
            //télécharger la nouvelle image
            $newName = uniqid();
            $image = $request->file('image');
            $newName .= ".".$image->getClientOriginalExtension();
            $destinationPath = 'upload';
            $image->move($destinationPath,$newName);
    
            $voiture->image = $newName;
        }
        if($voiture->update()){
            return redirect('/responsable/voitures');    
        }
    }

    public function destroy($id){
        $voiture = Voiture::find($id);
        $file_path = public_path().'/upload/'.$voiture->image;
        unlink($file_path);

        if($voiture->delete()){
            return redirect()->back();
        }
    }



}
