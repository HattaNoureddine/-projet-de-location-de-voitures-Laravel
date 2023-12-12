@extends('master')
@section('content')
<!-- Content wrapper -->
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">modifier </span> une contrat de loyer</h4>
      <!-- Basic Layout -->
      <div class="row">
        <div class="col-xl">
          <div class="card mb-4">
        
            <div class="card-body">
              <form action="/reservation/update" method="POST">
                @csrf
                <div class="mb-3">
                    <input name="id" type="hidden" value="{{ $reservation->id }}">
                  <label class="form-label" for="basic-default-fullname">Date reservation</label>
                  <input type="date" value="{{ $reservation->date_reservation }}" name="date_reservation" class="form-control" id="basic-default-fullname" placeholder="date reservation" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-company">Date debut</label>
                  <input type="date" value="{{ $reservation->date_debut }}" name="date_debut" class="form-control" id="basic-default-company" placeholder="date debut" />
                </div>
            
                <div class="mb-3">
                  <label class="form-label" for="basic-default-phone">Date fin</label>
                  <input
                    type="date"
                    id="basic-default-phone"
                    class="form-control phone-mask"
                    placeholder="date fin"
                    name="date_fin"
                    value="{{ $reservation->date_fin }}"
                  />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-message">Remarque</label>
                  <textarea
                    id="basic-default-message"
                    class="form-control"
                    placeholder="remarque?"
                    name="remarque"
                  >{{ $reservation->remarque }}</textarea>
                </div>
                <button  type="submit" class="btn btn-primary">Send</button>
         
            </div>
          </div>
        </div>
        <div class="col-xl">
          <div class="card mb-4">
            <div class="card-body">
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname">Voiture</label>
                  <select class="form-control form-control-sm" name="voiture" id="">
                    @foreach ($voitures as $item)
                        <option value="{{ $item->id }}">{{ $item->immatruculation }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Client</label>
                    <select class="form-control form-control-sm" name="client" id="">
                      @foreach ($clients as $item)
                          <option value="{{ $item->id }}">{{ $item->nom }}</option>
                      @endforeach
                    </select>
                  </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-phone">Prix par jour</label>
                  <div class="input-group input-group-merge">
                
                    <input
                      type="text"
                      id="basic-icon-default-phone"
                      class="form-control phone-mask"
                      placeholder="Prix par jour"
                      aria-label="658 799 8941"
                      aria-describedby="basic-icon-default-phone2"
                      name="prix_par_jour"
                      value="{{ $reservation->prix_par_jour }}"
                    />
                  </div>
                </div>
             
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->
@endsection