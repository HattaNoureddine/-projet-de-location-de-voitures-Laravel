@extends('master')
@section('content')
<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Liste Compagnies</h4>
        <a href="/compagnie/create" type="button" class="btn btn-success btn-icon-text">
        <i class="ti-upload btn-icon-prepend"></i>                                                    
            Ajouter une marque
        </a>
        <div class="table-responsive pt-3">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>
                    Nom
                </th>
                <th>
                    Addresse
                </th>
                <th>
                    Phone
                </th>
                <th>
                    Email
                </th>
                <th>
                    Remarque
                </th>
                <th>
                    Ville
                </th>
                <th>
                    Actions
                </th>
              </tr>
            </thead>
            <tbody>
              @forelse ($compagnies as $index => $item)
              <tr>
                <td>
                  {{ $item->nom }}
                </td>
                <td>
                    {{ $item->addresse }}
                </td>
                <td>
                    {{ $item->tel }}
                </td>
                <td>
                    {{ $item->email }}
                </td>
                <td>
                    {{ $item->remarque }}
                </td>
                <td>
                    {{ $item->ville->nom }}
                </td>
                <td>

                      <button type="button" class="btn btn-danger btn-rounded btn-icon">
                        <a class="text-white" href="/compagnie/delete/{{ $item->id }}"><i class="ti-trash"></i></a>
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