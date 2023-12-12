@extends('master')
@section('content')
<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Liste reservation</h4>
        <div class="table-responsive pt-3">
          <table class="table table-bordered">
            <thead>
              <tr>

                <th>
                    date_debut
                </th>
                <th>
                    date_fin
                </th>
                <th>
                    prix_par_jour
                </th>
                <th>
                    remarque
                </th>
                <th>
                    voiture_id 
                </th>
                <th>
                    client_id 
                </th>
               <th>
                valider
               </th>
              </tr>
            </thead>
            <tbody>
              @forelse ($reservations as $index => $item)
              <tr>

                <td>
                    {{ $item->date_debut }}
                  </td>
                  <td>
                    {{ $item->date_fin }}
                  </td>
                  <td>
                    {{ $item->prix_par_jour }}
                  </td>
                  <td>
                    {{ $item->remarque }}
                  </td>
                  <td>
                    {{ $item->voiture->nom}}
                  </td>
                  <td>
                    {{ $item->client->nom }}
                  </td>
                  <td>
                    <button type="button" class="btn btn-primary btn-rounded btn-icon ">
                      <a class="text-white" href="/reservation/valider/{{ $item->id }}"><i class="ti-arrow-circle-down"></i></a>
                    </button>
                  </td>
              </tr>
              @empty
                  
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection