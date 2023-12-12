@extends('guest.master_client')
@section('content')
<div class="col-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Ajouter un client</h4>
        <p class="card-description">
          remplir ce formulaire
        </p>
        <form class="forms-sample" action="/register/client/store" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
            <label for="exampleInputName1">Nom</label>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" id="">
            <input type="text" value="{{ Auth::user()->name }}" name="nom" class="form-control" id="exampleInputName1" placeholder="Name">
          </div>

          <div class="form-group">
            <label for="exampleInputName1">prenom</label>
            <input type="text" name="prenom" class="form-control" id="exampleInputName1" placeholder="Name">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail3">Email address</label>
            <input type="email" value="{{ Auth::user()->email }}"  name="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail3">Phone</label>
            <input type="number" name="tel" class="form-control" id="exampleInputEmail3" placeholder="Phone">
          </div>

          
          <div class="form-group">
            <label for="exampleInputEmail3">CIN</label>
            <input type="text" name="cin" class="form-control" id="exampleInputEmail3" placeholder="CIN">
          </div>
                    
          <div class="form-group">
            <label for="exampleInputEmail3">Numero Passport</label>
            <input type="text" name="num_passport" class="form-control" id="exampleInputEmail3" placeholder="Passport">
          </div>
                              
          <div class="form-group">
            <label for="exampleInputEmail3">Numero permi</label>
            <input type="text" name="num_permi" class="form-control" id="exampleInputEmail3" placeholder="Permi">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail3">Image Permi</label>
            <input type="file" name="image" class="form-control" id="exampleInputEmail3" placeholder="Email">
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
         

          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <a href="/responsable/clients"  class="btn btn-light">Cancel</a>
        </form>
      </div>
    </div>
  </div>

  
@endsection