@extends('guest.layouts')
@section('content')
   
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">Choose Your Car</h1>
        </div>
      </div>
    </div>
  </section>
      

      <section class="ftco-section bg-light">
      <div class="container">
          <div class="row">
            @foreach ($voitures as $item)
            <div class="col-md-4">
                <div class="car-wrap rounded ftco-animate">
                    <div class="img rounded d-flex align-items-end" style="background-image: url({{ asset('upload') }}/{{ $item->image }})">
                    </div>
                    <div class="text">
                        <h2 class="mb-0"><a href="car-single.html">{{ $item->nom }}</a></h2>
                        <div class="d-flex mb-3">
                            <span class="cat">{{ $item->categorie->intitule_categorie ?? 'none' }}</span>
                            <p class="price ml-auto">{{ $item->prix }} DH<span>/day</span></p>
                        </div>
                        <p class="d-flex mb-0 d-block">
                            
                            @if ($item->etat == "despo")
                <a href="/reservation/voiture/{{ $item->id }}" type="button" class="btn btn-primary" >Réserver</a>
                @else
                <button type="button" class="btn btn-primary" disabled>Réserver</button>
                @endif
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Launch demo modal
                  </button> --}}

                  
                   <a type="button" data-toggle="modal" data-target="#exampleModal{{ $item->id }}" class="btn btn-secondary py-2 ml-1">Détails</a>

                 
                    </div>
                </div>
            </div>
            @endforeach

            
          </div>
          <div class="row mt-5">
        <div class="col text-center">
          <div class="block-27">
            <ul>
              <li><a href="#">&lt;</a></li>
              <li class="active"><span>1</span></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">&gt;</a></li>
            </ul>
          </div>
        </div>
      </div>
      </div>
  </section>



  <!-- Modal -->
@foreach ($voitures as $item)
<div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Détails</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Nom : {{ $item->nom }} <br>
          Immatruculation : {{ $item->immatruculation }}<br>
          Module : {{ $item->module }}<br>
          Année Achat : {{ $item->année_achat }}<br>
          Prix Achat : {{ $item->prix_achat }}<br>
          Prix : {{ $item->prix	}}<br>
          Marque : {{ $item->marque->intitule_marque }}<br>
          Categorie : {{ $item->categorie->intitule_categorie }}<br>
          Typemoteur : {{ $item->typemoteur->intitule_moteur }}<br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

@endforeach
@endsection