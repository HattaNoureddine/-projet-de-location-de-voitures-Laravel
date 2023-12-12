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
                  etat 
              </th>
                <th>
                    Actions
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
                    @if ($item->etat == 0)
                    <span class="badge badge-success">déjà terminé</span>
                    @else
                    <span class="badge badge-danger">En cours</span>
                    @endif
                  </td>
                <td>
                    <button type="button" class="btn btn-primary btn-rounded btn-icon ">
                        <a class="text-white" href="/reservation/edit/{{ $item->id }}"><i class="ti-pencil"></i></a>
                      </button>
                      <button type="button" class="btn btn-danger btn-rounded btn-icon">
                        <a class="text-white" href="/reservation/delete/{{ $item->id }}"><i class="ti-trash"></i></a>
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