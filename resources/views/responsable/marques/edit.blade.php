@extends('master')
@section('content')
<div class="col-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">modifier une marque</h4>
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
        <form class="forms-sample" action="/marque/update" method="POST">
            @csrf

          <div class="form-group">
            <input type="hidden" value="{{ $marque->id }}" name="id_marque">
            <label for="exampleInputName1">intitule marque</label>
            <input type="text" name="intitule_marque" value="{{ $marque->intitule_marque }}" class="form-control" id="exampleInputName1" placeholder="intitule marque">
          </div>
        
          <div class="form-group">
            <label for="exampleInputName1">Remarque</label>
            <input type="text" name="remarque" value="{{ $marque->remarque }}" class="form-control" id="exampleInputName1" placeholder="remarque">
          </div>

          <button type="submit" class="btn btn-primary mr-2">Modifier</button>
          <a href="/responsable/marques" class="btn btn-light">Annuler</a>
        </form>
      </div>
    </div>
  </div>
@endsection