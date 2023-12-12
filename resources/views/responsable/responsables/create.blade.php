@extends('master')
@section('content')
<!-- Content wrapper -->
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">ajouter </span> responsable</h4>
      <!-- Basic Layout -->
      <div class="row">
        <div class="col-xl">
          <div class="card mb-4">
        
            <div class="card-body">
              <form action="/responsable/store" method="POST">
                @csrf
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">nom</label>
                  <input type="text" name="name" class="form-control" id="basic-default-fullname" placeholder="name" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-company">prenom</label>
                  <input type="text" name="prenom" class="form-control" id="basic-default-company" placeholder="prenom" />
                </div>
            
                <div class="mb-3">
                  <label class="form-label" for="basic-default-phone">phone</label>
                  <input
                    type="number"
                    id="basic-default-phone"
                    class="form-control phone-mask"
                    placeholder="phone"
                    name="tel"
                  />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-phone">password</label>
                    <input
                      type="password"
                      id="basic-default-phone"
                      class="form-control phone-mask"
                      placeholder="password"
                      name="password"
                    />
                  </div>
                <button type="submit" class="btn btn-primary">Send</button>
         
            </div>
          </div>
        </div>
        <div class="col-xl">
          <div class="card mb-4">
            <div class="card-body">
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname">Ville</label>
                  <select class="form-control form-control-sm" name="ville" id="">
                    @foreach ($villes as $item)
                        <option value="{{ $item->id }}">{{ $item->nom }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-message">cin</label>
                    <input
                      id="basic-default-message"
                      class="form-control"
                      placeholder="cin?"
                      name="cin"
                    >
                  </div>
                  <div class="mb-3">
                      <label class="form-label" for="basic-default-message">Email</label>
                      <input
                        id="basic-default-message"
                        class="form-control"
                        placeholder="email?"
                        name="email"
                        type="email"
                      >
                    </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->
@endsection