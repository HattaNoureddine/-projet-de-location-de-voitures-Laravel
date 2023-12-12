@extends('master')
@section('content')
<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Liste Marques</h4>
        <a href="/marque/create" type="button" class="btn btn-success btn-icon-text">
        <i class="ti-upload btn-icon-prepend"></i>                                                    
            Ajouter une marque
        </a>
        <div class="table-responsive pt-3">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>
                Intitule Marque
                </th>
                <th>
                    Remarque
                </th>
                <th>
                    Actions
                </th>
              </tr>
            </thead>
            <tbody>
              @forelse ($marques as $index => $item)
              <tr>
                <td>
                  {{ $index+1 }}
                </td>
                <td>
                  {{ $item->intitule_marque }}
                </td>
                <td>
                    {{ $item->remarque }}
                  </td>
                <td>
                    <button type="button" class="btn btn-primary btn-rounded btn-icon ">
                        <a class="text-white" href="/marque/edit/{{ $item->id }}"><i class="ti-pencil"></i></a>
                      </button>
                      <button type="button" class="btn btn-danger btn-rounded btn-icon">
                        <a class="text-white" href="/marque/delete/{{ $item->id }}"><i class="ti-trash"></i></a>
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