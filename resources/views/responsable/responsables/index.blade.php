@extends('master')
@section('content')
<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Liste Responsable</h4>
        <a href="/responsable/create" type="button" class="btn btn-success btn-icon-text">
        <i class="ti-upload btn-icon-prepend"></i>                                                    
            Ajouter un responsable
        </a>
        <div class="table-responsive pt-3">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>
                    nom
                </th>
                <th>
                    prenom
                </th>
                <th>
                    phone
                </th>
                <th>
                    cin
                </th>
                <th>
                    ville
                </th>
                <th>
                    email 
                </th>
                <th>
                    Actions
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($responsables as $item)
              <tr>

                <td>
                  {{ $item->name }}
                </td>
                <td>
                    {{ $item->prenom }}
                </td>
                  <td>
                    {{ $item->tel }}
                </td>
                  <td>
                    {{ $item->cin }}
                </td>
                  <td>
                    {{ $item->ville->nom ?? 'none' }}
                </td>
                <td>
                    {{ $item->email }}
                </td>
                <td>
                      <button type="button" class="btn btn-danger btn-rounded btn-icon">
                        <a class="text-white" href="/responsable/delete/{{ $item->id }}"><i class="ti-trash"></i></a>
                    </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection