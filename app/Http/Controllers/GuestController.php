<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Ville;
use App\Models\Client;
use App\Models\Contrat;
use App\Models\Voiture;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function home(){
        $voitures = Voiture::all();
        return view('guest.home')->with('voitures',$voitures);
    }

    public function reservation($id){
        $villes = Ville::all();
        $voiture = Voiture::find($id);


        $prix =  $voiture->prix;
        $prix_promotion = $voiture->prix_promotion;
        $total = $prix - ($prix*($prix_promotion/100));



        $userId = Auth::user()->id;
        $client = Client::where('user_id', $userId)->first();
        if($client){
            return view('guest.reservation')->with('villes',$villes)
                                            ->with('voiture',$voiture)
                                            ->with('client',$client)
                                            ->with('total',$total);
        }else{
            return redirect('/register/client');
        } 
    }


    public function reservationStore(Request $request){
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
            return redirect('/');
        }
    }

    public function registerClient(){
        $villes = Ville::all();
        return view('guest.registerClient')->with('villes',$villes);
    }

    public function storeClient(Request $request){
        
        $client = new Client();
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->email = $request->email;
        $client->tel = $request->tel;
        $client->cin = $request->cin;
        $client->num_passport = $request->num_passport;
        $client->num_permi = $request->num_permi;
        $client->ville_id  = $request->ville;
        $client->user_id  = $request->user_id;


        //télécharger une image
        $newName = uniqid();
        $image = $request->file('image');
        $newName .= ".".$image->getClientOriginalExtension();
        $destinationPath = 'upload';
        $image->move($destinationPath,$newName);

        $client->image_permi = $newName;

        if($client->save()){
            return redirect('/');    
        }
    }


    public function reservationClinet(){
        $id_user =  Auth::user()->id;
        $client = Client::where('user_id',$id_user)->first();
        $id_client = $client->id ?? 'none';
        $reservations = Reservation::where('client_id',$id_client)->where('etat', 1)->get();
        if($client){
            return view('guest.reservations.index')->with('reservations',$reservations);
        }else{
            return redirect('/register/client');
        }
    }

    public function valider($id){

        $reservation = Reservation::find($id);
        $reservation->etat = 0;

        $id_reser = $reservation->id;
        $contart = Contrat::where('reservation_id',$id_reser)->first();
        $contart->etat = 0;

        $voiture = Voiture::find($reservation->voiture_id);
        if($reservation->etat == 0){
            $voiture->etat = "despo";
        }


        if($reservation->save() && $voiture->save() && $contart->save()){
            return redirect()->back();
        }
    }



    public function about(){
        return view('guest.about');
    }
    public function services(){
        return view('guest.services');
    }
    public function pricing(){
        $voitures = Voiture::all();
        return view('guest.pricing')->with('voitures',$voitures);
    }
    public function cars(){
        $voitures = Voiture::all();
        return view('guest.cars')->with('voitures',$voitures);
    }
    public function blog(){
        return view('guest.blog');
    }
    public function contact(){
        return view('guest.contacts');
    }


    public function searchVoiture(Request $request){
        if($request->car){
            $cars = Voiture::where('nom','LIKE','%'.$request->car.'%')->get();
        }else{
            $cars = Voiture::all();
        }
        return view('guest.search')->with('cars',$cars);
    }

}
