<?php

use App\Models\Typemoteur;
use App\Models\ContratAssurance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\TypemoteurController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\ContratAssuranceController;
use App\Http\Controllers\CompagnieAssuranceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [GuestController::class, 'home']);
Route::post('/voiture/search',[GuestController::class,'searchVoiture']);


Route::get('/about',[GuestController::class,'about']);
Route::get('/services',[GuestController::class,'services']);
Route::get('/pricing',[GuestController::class,'pricing']);
Route::get('/cars',[GuestController::class,'cars']);
Route::get('/blog',[GuestController::class,'blog']);
Route::get('/contact',[GuestController::class,'contact']);



Route::get('/responsable/dashboard',[ResponsableController::class,'dashboard'])->middleware('auth','responsable');
Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->middleware('auth');

#route villes
Route::get('/responsable/villes',[VilleController::class,'index'])->middleware('auth','responsable');
Route::get('/ville/create',[VilleController::class,'create'])->middleware('auth','responsable');
Route::post('/ville/store',[VilleController::class,'store'])->middleware('auth','responsable');
Route::get('/ville/edit/{id}',[VilleController::class,'edit'])->middleware('auth','responsable');
Route::post('/ville/update',[VilleController::class,'update'])->middleware('auth','responsable');
Route::get('/ville/delete/{id}',[VilleController::class,'destroy'])->middleware('auth','responsable');

#route clients
Route::get('/responsable/clients',[ClientController::class,'index'])->middleware('auth','responsable');
Route::get('/client/create',[ClientController::class,'create'])->middleware('auth','responsable');
Route::post('/client/store',[ClientController::class,'store'])->middleware('auth','responsable');
Route::get('/client/edit/{id}',[ClientController::class,'edit'])->middleware('auth','responsable');
Route::post('/client/update',[ClientController::class,'update'])->middleware('auth','responsable');
Route::get('/client/delete/{id}',[ClientController::class,'destroy'])->middleware('auth','responsable');

#route marques
Route::get('/responsable/marques',[MarqueController::class,'index'])->middleware('auth','responsable');
Route::get('/marque/create',[MarqueController::class,'create'])->middleware('auth','responsable');
Route::post('/marque/store',[MarqueController::class,'store'])->middleware('auth','responsable');
Route::get('/marque/edit/{id}',[MarqueController::class,'edit'])->middleware('auth','responsable');
Route::post('/marque/update',[MarqueController::class,'update'])->middleware('auth','responsable');
Route::get('/marque/delete/{id}',[MarqueController::class,'destroy'])->middleware('auth','responsable');








#route categories
Route::get('/responsable/categories',[CategorieController::class,'index'])->middleware('auth','responsable');
Route::get('/categorie/create',[CategorieController::class,'create'])->middleware('auth','responsable');
Route::post('/categorie/store',[CategorieController::class,'store'])->middleware('auth','responsable');
Route::get('/categorie/edit/{id}',[CategorieController::class,'edit'])->middleware('auth','responsable');
Route::post('/categorie/update',[CategorieController::class,'update'])->middleware('auth','responsable');
Route::get('/categorie/delete/{id}',[CategorieController::class,'destroy'])->middleware('auth','responsable');









#route typemoteurs
Route::get('/responsable/typemoteurs',[TypemoteurController::class,'index'])->middleware('auth','responsable');
Route::get('/typemoteur/create',[TypemoteurController::class,'create'])->middleware('auth','responsable');
Route::post('/typemoteur/store',[TypemoteurController::class,'store'])->middleware('auth','responsable');
Route::get('/typemoteur/edit/{id}',[TypemoteurController::class,'edit'])->middleware('auth','responsable');
Route::post('/typemoteur/update',[TypemoteurController::class,'update'])->middleware('auth','responsable');
Route::get('/typemoteur/delete/{id}',[TypemoteurController::class,'destroy'])->middleware('auth','responsable');


#route compagnie assurance
Route::get('/responsable/compagnies',[CompagnieAssuranceController::class,'index'])->middleware('auth','responsable');
Route::get('/compagnie/create',[CompagnieAssuranceController::class,'create'])->middleware('auth','responsable');
Route::post('/compagnie/store',[CompagnieAssuranceController::class,'store'])->middleware('auth','responsable');
Route::get('/compagnie/delete/{id}',[CompagnieAssuranceController::class,'destroy'])->middleware('auth','responsable');



#route voitures
Route::get('/responsable/voitures',[VoitureController::class,'index'])->middleware('auth','responsable');
Route::get('/voiture/create',[VoitureController::class,'create'])->middleware('auth','responsable');
Route::post('/voiture/store',[VoitureController::class,'store'])->middleware('auth','responsable');
Route::get('/voiture/edit/{id}',[VoitureController::class,'edit'])->middleware('auth','responsable');
Route::post('/voiture/update',[VoitureController::class,'update'])->middleware('auth','responsable');
Route::get('/voiture/delete/{id}',[VoitureController::class,'destroy'])->middleware('auth','responsable');


#route contrat_assurance
Route::get('/responsable/contrat_assurance',[ContratAssuranceController::class,'index'])->middleware('auth','responsable');
Route::get('/contrat_assurance/create',[ContratAssuranceController::class,'create'])->middleware('auth','responsable');
Route::post('/contrat_assurance/store',[ContratAssuranceController::class,'store'])->middleware('auth','responsable');
Route::get('/contrat_assurance/edit/{id}',[ContratAssuranceController::class,'edit'])->middleware('auth','responsable');
Route::post('/contrat_assurance/update',[ContratAssuranceController::class,'update'])->middleware('auth','responsable');
Route::get('/contrat_assurance/delete/{id}',[ContratAssuranceController::class,'destroy'])->middleware('auth','responsable');


#route reservations
Route::get('/responsable/reservations',[ReservationController::class,'index'])->middleware('auth','responsable');
Route::get('/reservation/create',[ReservationController::class,'create'])->middleware('auth','responsable');
Route::post('/reservation/store',[ReservationController::class,'store'])->middleware('auth','responsable');
Route::get('/reservation/edit/{id}',[ReservationController::class,'edit'])->middleware('auth','responsable');
Route::post('/reservation/update',[ReservationController::class,'update'])->middleware('auth','responsable');
Route::get('/reservation/delete/{id}',[ReservationController::class,'destroy'])->middleware('auth','responsable');

Route::get('/reservation/create/voiture/{id}',[ReservationController::class,'reserveeVoiture'])->middleware('auth','responsable');
Route::get('/reservation/liste',[ReservationController::class,'reservationValider'])->middleware('auth','responsable');
Route::get('/reservation/valider/{id}',[ReservationController::class,'valider'])->middleware('auth','responsable');


#route contrats
Route::get('/responsable/contrats',[ContratController::class,'index'])->middleware('auth','responsable');
Route::get('/contrat/create',[ContratController::class,'create'])->middleware('auth','responsable');
Route::post('/contrat/store',[ContratController::class,'store'])->middleware('auth','responsable');
Route::get('/contrat/edit/{id}',[ContratController::class,'edit'])->middleware('auth','responsable');
Route::post('/contrat/update',[ContratController::class,'update'])->middleware('auth','responsable');
Route::get('/contrat/delete/{id}',[ContratController::class,'destroy'])->middleware('auth','responsable');



#route responsable
Route::get('/responsable/responsables',[ResponsableController::class,'index'])->middleware('auth','responsable');
Route::get('/responsable/create',[ResponsableController::class,'create'])->middleware('auth','responsable');
Route::post('/responsable/store',[ResponsableController::class,'store'])->middleware('auth','responsable');
Route::get('/responsable/delete/{id}',[ResponsableController::class,'destroy'])->middleware('auth','responsable');




#route reservee voiture 
Route::get('/register/client',[GuestController::class,'registerClient'])->middleware('auth');
Route::post('/register/client/store',[GuestController::class,'storeClient'])->middleware('auth');
Route::get('/reservation/voiture/{id}',[GuestController::class,'reservation'])->middleware('auth');
Route::post('/client/reservation/store',[GuestController::class,'reservationStore'])->middleware('auth','client');


#route reservation client
Route::get('/client/reservation',[GuestController::class,'reservationClinet'])->middleware('auth','client');
Route::get('/client/reservation/valider/{id}',[GuestController::class,'valider'])->middleware('auth','client');




Route::get('/contrat/{id}', [ContratController::class,'contart'])->name('auth','admin');


