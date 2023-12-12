@extends('master')
@section('content')
<div class="col-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">modifier une categorie
        </h4>
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
        <form class="forms-sample" action="/categorie/update" method="POST">
            @csrf

          <div class="form-group">
            <input type="hidden" value="{{ $categorie->id }}" name="id_categorie">
            <label for="exampleInputName1">intitule marque</label>
            <input type="text" name="intitule_categorie" value="{{ $categorie->intitule_categorie }}" class="form-control" id="exampleInputName1" placeholder="intitule categorie">
          </div>
        
          <div class="form-group">
            <label for="exampleInputName1">Remarque</label>
            <input type="text" name="remarque" value="{{ $categorie->remarque }}" class="form-control" id="exampleInputName1" placeholder="remarque">
          </div>

          <button type="submit" class="btn btn-primary mr-2">Modifier</button>
          <a href="/responsable/categories" class="btn btn-light">Annuler</a>
        </form>
      </div>
    </div>
  </div>
@endsection