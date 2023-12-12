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
              <form action="/contrat/update" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="hidden" value="{{ $contrat->id }}" name="id_contrat">
                  <label class="form-label" for="basic-default-fullname">date_debut</label>
                  <input type="date" value="{{ $contrat->date_debut }}" name="date_debut" class="form-control" id="basic-default-fullname" placeholder="date reservation" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-company">date_fin</label>
                  <input type="date" value="{{ $contrat->date_fin }}" name="date_fin" class="form-control" id="basic-default-company" placeholder="date debut" />
                </div>
            
                <div class="mb-3">
                  <label class="form-label" for="basic-default-phone">prix_total</label>
                  <input
                    type="text"
                    id="basic-default-phone"
                    class="form-control phone-mask"
                    placeholder="prix_total"
                    name="prix_total"
                    value="{{ $contrat->prix_total }}"
                  />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-message">Remarque</label>
                  <textarea
                    id="basic-default-message"
                    class="form-control"
                    placeholder="remarque?"
                    name="remarque"
                    
                  > {{ $contrat->remarque }} </textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-message">autre_indeminités	</label>
                    <textarea
                      id="basic-default-message"
                      class="form-control"
                      placeholder="remarque?"
                      name="autre_indeminités"
                    >{{ $contrat->autre_indeminités }} </textarea>
                  </div>
                <button type="submit" class="btn btn-primary">Send</button>
         
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
                    <label class="form-label" for="basic-icon-default-fullname">reservation</label>
                    <select class="form-control form-control-sm" name="reservation" id="">
                      @foreach ($reservations as $item)
                          <option value="{{ $item->id }}">{{ $item->date_reservation }}</option>
                      @endforeach
                    </select>
                  </div>
              
             
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->
@endsection