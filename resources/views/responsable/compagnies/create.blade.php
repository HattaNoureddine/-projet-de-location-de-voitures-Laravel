@extends('master')
@section('content')
<div class="col-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Ajouter une compagnie</h4>
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
        <form class="forms-sample" action="/compagnie/store" method="POST">
            @csrf

          <div class="form-group">
            <label for="exampleInputName1">Nom</label>
            <input type="text" name="nom" class="form-control" id="exampleInputName1" placeholder="nom">
          </div>
        
          <div class="form-group">
            <label for="exampleInputName1">Addresse</label>
            <input type="text" name="addresse" class="form-control" id="exampleInputName1" placeholder="addresse">
          </div>

          <div class="form-group">
            <label for="exampleInputName1">Remarque</label>
            <input type="text" name="remarque" class="form-control" id="exampleInputName1" placeholder="remarque">
          </div>

          <div class="form-group">
            <label for="exampleInputName1">Phone</label>
            <input type="text" name="tel" class="form-control" id="exampleInputName1" placeholder="phone">
          </div>

          <div class="form-group">
            <label for="exampleInputName1">Email</label>
            <input type="text" name="email" class="form-control" id="exampleInputName1" placeholder="email">
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect3">Ville</label>
            <select name="ville" class="form-control form-control-sm" id="exampleFormControlSelect3">
                <option name="" id="">Choisir une ville</option>
                @foreach ($villes as $item)
                <option value="{{ $item->id }}">{{ $item->nom }}</option>
                @endforeach
            </select>
          </div>

          <button type="submit" class="btn btn-primary mr-2">Ajouter</button>
          <a href="/responsable/compagnies" class="btn btn-light">Annuler</a>
        </form>
      </div>
    </div>
  </div>
@endsection