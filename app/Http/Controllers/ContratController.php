<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contrat;
use App\Models\Reservation;
use App\Models\Voiture;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class ContratController extends Controller
{
    public function index(){
        $contrats = Contrat::where('etat',1)->get();
        $reservations = Reservation::all();
        $voitures = Voiture::all();
        return view('responsable.contrats.index')->with('contrats',$contrats)
                                                 ->with('reservations',$reservations)
                                                 ->with('voitures',$voitures);
    }

    public function create(){
        $voitures = Voiture::all();
        $clients = Client::all();
        $reservations = Reservation::all();
        return view('responsable.contrats.create')->with('voitures',$voitures)
                                                  ->with('clients',$clients)
                                                  ->with('reservations',$reservations);
    }

    public function store(Request $request){
        $contrat = new Contrat();
        $contrat->date_debut = $request->date_debut;
        $contrat->date_fin = $request->date_fin;
        $contrat->prix_total = $request->prix_total;
        $contrat->remarque	= $request->remarque;
        $contrat->autre_indeminités = $request->autre_indeminités;
        $contrat->voiture_id  = $request->voiture ;
        $contrat->client_id  = $request->client ;
        $contrat->reservation_id  = $request->reservation ;

        if($contrat->save()){
            return redirect('/responsable/contrats');
        }
    }

    public function edit($id){
        $contrat = Contrat::find($id);
        $voitures = Voiture::all();
        $clients = Client::all();
        $reservations = Reservation::all();
        return view('responsable.contrats.edit')->with('contrat',$contrat)
                                                ->with('voitures',$voitures)
                                                ->with('clients',$clients)
                                                ->with('reservations',$reservations);
    }

    public function update(Request $request){
        $contrat = Contrat::find($request->id_contrat);
        // $contrat->date_debut = $request->date_debut;
        // $contrat->date_fin = $request->date_fin;
        // $contrat->prix_total = $request->prix_total;
        // $contrat->remarque	= $request->remarque;
        $contrat->autre_indeminités = $request->autre_indeminités;
        // $contrat->voiture_id  = $request->voiture ;
        // $contrat->client_id  = $request->client ;
        // $contrat->reservation_id  = $request->reservation ;

        if($contrat->save()){
            return redirect('/responsable/contrats');
        }

    }

    public function destroy($id){
        $contrat = Contrat::find($id);
        $contrat->etat = 0;

        $id_reservation = $contrat->reservation_id;
        $reservation = Reservation::find($id_reservation);
        $reservation->etat = 0;

        $id_voiture = $contrat->voiture_id;
        $voiture = Voiture::find($id_voiture);
        $voiture->etat = "despo";

        if($contrat->save() && $reservation->save() && $voiture->save()){
            return redirect('/responsable/contrats');
        }
    }




    public function contart($id){
        $contrat = Contrat::find($id);
        return view('responsable.contrats.contrat')->with('contrat',$contrat);
    }

}
