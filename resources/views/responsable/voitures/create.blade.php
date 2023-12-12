@extends('master')
@section('content')
<div class="col-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Ajouter une voiture</h4>
        <p class="card-description">
            remplir ce formulaire
        </p>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form class="forms-sample" action="/voiture/store" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">image</label>
            <input type="file" name="image" class="form-control" id="exampleInputName1" >
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Nom</label>
            <input type="text" name="nom" class="form-control" id="exampleInputName1" placeholder="nom...">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">immatruculation</label>
            <input type="text" name="immatruculation" class="form-control" id="exampleInputName1" placeholder="immatruculation">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">module</label>
            <input type="date" name="module" class="form-control" id="exampleInputName1" placeholder="module">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">année_achat</label>
            <input type="date" name="année_achat" class="form-control" id="exampleInputName1" placeholder="année_achat">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">prix_achat</label>
            <input type="text" name="prix_achat" class="form-control" id="exampleInputName1" placeholder="prix_achat">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">nbr_place</label>
            <input type="text" name="nbr_place" class="form-control" id="exampleInputName1" placeholder="nbr_place">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">prix</label>
            <input type="text" name="prix" class="form-control" id="exampleInputName1" placeholder="prix">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Promotion%</label>
            <input type="text" name="prix_promotion" class="form-control" id="exampleInputName1" placeholder="prix_promotion">
          </div>         
           <div class="form-group">
            <label for="exampleInputName1">etat</label>
            <input type="text" name="etat" class="form-control" id="exampleInputName1" placeholder="etat">
          </div>         
   
          <div class="form-group">
            <label for="exampleFormControlSelect3">marque</label>
            <select name="marque" class="form-control form-control-sm" >
                @foreach ($marques as $item)
                <option value="{{ $item->id }}">{{ $item->intitule_marque }}</option>
                @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect3">categorie</label>
            <select name="categorie" class="form-control form-control-sm" >
                @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->intitule_categorie }}</option>
                @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect3">typemoteur</label>
            <select name="typemoteur" class="form-control form-control-sm" >
                @foreach ($typemoteurs as $item)
                <option value="{{ $item->id }}">{{ $item->intitule_moteur }}</option>
                @endforeach
            </select>
          </div>
        
          <button type="submit" class="btn btn-primary mr-2">Ajouter</button>
          <a href="/responsable/villes" class="btn btn-light">Annuler</a>
        </form>
      </div>
    </div>
  </div>
@endsection