<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ville;
use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResponsableController extends Controller
{
    public function dashboard(){
        $voitures =  Voiture::all();
        return view('responsable.dashboard')->with('voitures',$voitures);
    }

    public function index(){
        $responsables = User::where('role','responsable')->get();
        return view('responsable.responsables.index')->with('responsables',$responsables);
    }

    public function create(){
        $villes = Ville::all();
        return view('responsable.responsables.create')->with('villes',$villes);
    }

    public function store(Request $request){
        $responsable = new User();
        $responsable->name = $request->name;
        $responsable->prenom = $request->prenom;
        $responsable->tel	= $request->tel;
        $responsable->cin = $request->cin;
        $responsable->ville = $request->ville;
        $responsable->email  = $request->email ;
        $responsable->password  = Hash::make($request->password);
        $responsable->role  = 'responsable';
        if($responsable->save()){
            return redirect('/responsable/responsables');
        }
    }

    public function destroy($id){
        $responsable = User::find($id);
        if($responsable->delete()){
            return redirect('/responsable/responsables');
        }
    }
}
