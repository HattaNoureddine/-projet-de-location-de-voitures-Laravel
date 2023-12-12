@extends('master')
@section('content')
<div class="col-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Ajouter une contrat</h4>
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
        <form class="forms-sample" action="/contrat_assurance/store" method="POST">
            @csrf

          <div class="form-group">
            <label for="exampleInputName1">date_début</label>
            <input type="date" name="date_début" class="form-control" id="exampleInputName1" placeholder="date_début">
          </div>
        
          <div class="form-group">
            <label for="exampleInputName1">date_fin</label>
            <input type="date" name="date_fin" class="form-control" id="exampleInputName1" placeholder="date_fin">
          </div>

          <div class="form-group">
            <label for="exampleInputName1">remarque</label>
            <input type="text" name="remarque" class="form-control" id="exampleInputName1" placeholder="remarque">
          </div>

          
          <div class="form-group">
            <label for="exampleInputName1">voiture</label>
            <select  class="form-control form-control-sm"  name="voiture">
                @foreach ($voitures as $item)
                    <option value="{{ $item->id }}">{{ $item->immatruculation }}</option>
                @endforeach
            </select>
        </div>

          <button type="submit" class="btn btn-primary mr-2">Ajouter</button>
          <a href="/responsable/contrat_assurance" class="btn btn-light">Annuler</a>
        </form>
      </div>
    </div>
  </div>
@endsection