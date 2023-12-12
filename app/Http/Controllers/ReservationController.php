<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Client;
use App\Models\Contrat;
use App\Models\Voiture;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(){
        $reservations = Reservation::all();
        return view('responsable.reservations.index')->with('reservations',$reservations);
    }

    public function create(){
        $reservations = Reservation::all();
        $voitures = Voiture::all();
        $clients = Client::all();
        return view('responsable.reservations.create')->with('reservations',$reservations)->with('voitures',$voitures)->with('clients',$clients);
    }

    public function store(Request $request){
        $date = new DateTime();
        $aujourdhui = $date->format('Y-m-d');

        $reservation = new Reservation();
        $id = $request->voiture;

        $voiture = Voiture::find($id);
        $voiture->etat = "reservé";
        $reservation->date_reservation = $aujourdhui;
        $reservation->date_debut = $request->date_debut;
        $reservation->date_fin = $request->date_fin;
        $reservation->prix_par_jour = $request->prix_par_jour;
        $reservation->remarque = $request->remarque;
        $reservation->voiture_id  = $request->voiture ;
        $reservation->client_id  = $request->client ;
        $reservation->save();

        //testing
        $contart = new Contrat();
        $contart->date_debut = $request->date_debut;
        $contart->date_fin = $request->date_fin;
        $contart->remarque = $request->remarque;
        $contart->voiture_id  = $request->voiture;
        $contart->client_id  = $request->client ;
        $contart->reservation_id   = $reservation->id ;


        if($reservation->save() && $voiture->save() && $contart->save()){
            return redirect('/responsable/reservations');
        }
    }



    public function reserveeVoiture($id){
        $voiture = Voiture::find($id);
        $clients = Client::all();
        $reservation = Reservation::all();
        $prix =  $voiture->prix;
        $prix_promotion = $voiture->prix_promotion;
        $total = $prix - ($prix*($prix_promotion/100));

        return view('responsable.reservations.reservation')->with('voiture',$voiture)
                                                           ->with('clients',$clients)
                                                           ->with('total',$total)
                                                           ->with('reservation',$reservation);
    }



    public function edit($id){
        $reservation = Reservation::find($id);
        $clients = Client::all();
        $voitures = Voiture::all();
        return view('responsable.reservations.edit')->with('reservation',$reservation)
                                                    ->with('clients',$clients)
                                                    ->with('voitures',$voitures);
    }

    public function update(Request $request){
        $reservation = Reservation::find($request->id);
        $reservation->date_reservation = $request->date_reservation;
        $reservation->date_debut = $request->date_debut;
        $reservation->date_fin = $request->date_fin;
        $reservation->prix_par_jour = $request->prix_par_jour;
        $reservation->remarque = $request->remarque;
        $reservation->voiture_id  = $request->voiture ;
        $reservation->client_id  = $request->client ;
        if($reservation->save()){
            return redirect('/responsable/reservations');
        }
        // dd($request);

    }

    public function destroy($id){
        $reservation = Reservation::find($id);
        $id_voiture = $reservation->voiture_id;
        $voiture = Voiture::find($id_voiture);
        $voiture->etat = "despo";
        if($reservation->delete() && $voiture->save()){
            return redirect('/responsable/reservations');
        }
    }

    public function reservationValider(){
        $reservations = Reservation::where('etat',1)->get();
        return view('responsable.reservations.valider_reservation')->with('reservations',$reservations);
    }


    
    public function valider($id){
        $reservation = Reservation::find($id);
        $reservation->etat = 0;
        $voiture = Voiture::find($reservation->voiture_id);
        if($reservation->etat == 0){
            $voiture->etat = "despo";
        }
        if($reservation->save() && $voiture->save()){
            return redirect('/responsable/dashboard');
        }
    }
}
