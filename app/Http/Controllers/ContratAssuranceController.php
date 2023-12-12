<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use Illuminate\Http\Request;
use App\Models\ContratAssurance;

class ContratAssuranceController extends Controller
{
    public function index(){
        $contrats = ContratAssurance::all();
        return view('responsable.contrat_asurance.index')->with('contrats',$contrats);
    }

    public function create(){
        $voitures = Voiture::all();
        return view('responsable.contrat_asurance.create')->with('voitures',$voitures);
    }

    public function store(Request $request){
        $contrat = new ContratAssurance();
        $contrat->date_début = $request->date_début;
        $contrat->date_fin = $request->date_fin;
        $contrat->remarque = $request->remarque;
        $contrat->voiture_id  = $request->voiture;
        if($contrat->save()){
            return redirect('/responsable/contrat_assurance');
        }
    }

    public function edit($id){
        $contrat = ContratAssurance::find($id);
        $voitures = Voiture::all();
        return view('responsable.contrat_asurance.edit')->with('contrat',$contrat)->with('voitures',$voitures);
    }

    public function update(Request $request){
        $contrat_id = $request->contrat_id;
        $contrat = ContratAssurance::find($contrat_id);
        $contrat->date_début = $request->date_début;
        $contrat->date_fin = $request->date_fin;
        $contrat->remarque = $request->remarque;
        $contrat->voiture_id  = $request->voiture;
        if($contrat->update()){
            return redirect('/responsable/contrat_assurance');
        }

    }

    public function destroy($id){
        $contrat = ContratAssurance::find($id);
        if($contrat->delete()){
            return redirect('/responsable/contrat_assurance');
        }
    }

}
