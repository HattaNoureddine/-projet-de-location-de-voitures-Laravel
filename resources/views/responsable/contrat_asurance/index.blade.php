@extends('master')
@section('content')
<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Liste Marques</h4>
        <a href="/contrat_assurance/create" type="button" class="btn btn-success btn-icon-text">
        <i class="ti-upload btn-icon-prepend"></i>                                                    
            Ajouter une marque
        </a>
        <div class="table-responsive pt-3">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>
                    date_début
                </th>
                <th>
                    date_fin
                </th>
                <th>
                    remarque
                </th>
                <th>
                    voiture
                </th>
                <th>
                    Actions
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($contrats as $item)
              <tr>

                <td>
                  {{ $item->date_début }}
                </td>
                <td>
                    {{ $item->date_fin }}
                </td>
                <td>
                    {{ $item->remarque }}
                </td>
                <td>
                    {{ $item->voiture->immatruculation }}
                </td>
                <td>
                    <button type="button" class="btn btn-primary btn-rounded btn-icon ">
                        <a class="text-white" href="/contrat_assurance/edit/{{ $item->id }}"><i class="ti-pencil"></i></a>
                      </button>
                      <button type="button" class="btn btn-danger btn-rounded btn-icon">
                        <a class="text-white" href="/contrat_assurance/delete/{{ $item->id }}"><i class="ti-trash"></i></a>
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