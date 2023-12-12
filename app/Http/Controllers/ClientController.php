<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::all();
        return view('responsable.clients.index')->with('clients',$clients);
    }

    public function create(){
        $villes = Ville::all();
        return view('responsable.clients.create')->with('villes',$villes);
    }

    public function store(Request $request){
        
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
            return redirect('/responsable/clients');    
        }
    }

    

    public function edit($id){
        $villes = Ville::all();
        $client = Client::find($id);
        return view('responsable.clients.edit')->with('villes',$villes)->with('client',$client);
    }

    public function update(Request $request){
        $client = Client::find($request->id_client);
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->email = $request->email;
        $client->tel = $request->tel;
        $client->cin = $request->cin;
        $client->num_passport = $request->num_passport;
        $client->num_permi = $request->num_permi;
        $client->ville  = $request->ville;

        if($request->file('image')){

            $destination = 'upload/'.$client->image_permi;

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
    
            $client->image_permi = $newName;
        }
        if($client->update()){
            return redirect('/responsable/clients');    
        }
    }

    public function destroy($id){
        $client = Client::find($id);
        $file_path = public_path().'/upload/'.$client->image_permi;
        unlink($file_path);

        if($client->delete()){
            return redirect()->back();
        }
    }
}
