@extends('master')
@section('content')
<div class="col-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">modifier un moteur</h4>
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
        <form class="forms-sample" action="/typemoteur/update" method="POST">
            @csrf

          <div class="form-group">
            <input type="hidden" value="{{ $typemoteur->id }}" name="id_typemoteur">
            <label for="exampleInputName1">intitule typemoteur</label>
            <input type="text" name="intitule_moteur" value="{{ $typemoteur->intitule_moteur }}" class="form-control" id="exampleInputName1" placeholder="intitule marque">
          </div>
        
          <div class="form-group">
            <label for="exampleInputName1">Remarque</label>
            <input type="text" name="remarque" value="{{ $typemoteur->remarque }}" class="form-control" id="exampleInputName1" placeholder="remarque">
          </div>

          <button type="submit" class="btn btn-primary mr-2">Modifier</button>
          <a href="/responsable/typemoteur" class="btn btn-light">Annuler</a>
        </form>
      </div>
    </div>
  </div>
@endsection