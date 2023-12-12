@extends('master')
@section('content')
<div class="col-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Ajouter une Categorie</h4>
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
        <form class="forms-sample" action="/categorie/store" method="POST">
            @csrf

          <div class="form-group">
            <label for="exampleInputName1">intitule categorie</label>
            <input type="text" name="intitule_categorie" class="form-control" id="exampleInputName1" placeholder="intitule categorie">
          </div>
        
          <div class="form-group">
            <label for="exampleInputName1">Remarque</label>
            <input type="text" name="remarque" class="form-control" id="exampleInputName1" placeholder="remarque">
          </div>

          <button type="submit" class="btn btn-primary mr-2">Ajouter</button>
          <a href="/responsable/categories" class="btn btn-light">Annuler</a>
        </form>
      </div>
    </div>
  </div>
@endsection