@extends('master')
@section('content')
<div class="col-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Ajouter une Typemoteurs</h4>
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
        <form class="forms-sample" action="/typemoteur/store" method="POST">
            @csrf

          <div class="form-group">
            <label for="exampleInputName1">intitule typemoteur</label>
            <input type="text" name="intitule_moteur" class="form-control" id="exampleInputName1" placeholder="intitule typemoteur">
          </div>
        
          <div class="form-group">
            <label for="exampleInputName1">Remarque</label>
            <input type="text" name="remarque" class="form-control" id="exampleInputName1" placeholder="remarque">
          </div>

          <button type="submit" class="btn btn-primary mr-2">Ajouter</button>
          <a href="/responsable/typemoteurs" class="btn btn-light">Annuler</a>
        </form>
      </div>
    </div>
  </div>
@endsection