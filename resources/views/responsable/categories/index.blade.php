@extends('master')
@section('content')
<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Liste Categories</h4>
        <a href="/categorie/create" type="button" class="btn btn-success btn-icon-text">
        <i class="ti-upload btn-icon-prepend"></i>                                                    
            Ajouter une Categories
        </a>
        <div class="table-responsive pt-3">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>
                    intitule categorie
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
              @forelse ($categories as $index => $item)
              <tr>
                <td>
                  {{ $index+1 }}
                </td>
                <td>
                  {{ $item->intitule_categorie }}
                </td>
                <td>
                    {{ $item->remarque }}
                  </td>
                <td>
                    <button type="button" class="btn btn-primary btn-rounded btn-icon ">
                        <a class="text-white" href="/categorie/edit/{{ $item->id }}"><i class="ti-pencil"></i></a>
                      </button>
                      <button type="button" class="btn btn-danger btn-rounded btn-icon">
                        <a class="text-white" href="/categorie/delete/{{ $item->id }}"><i class="ti-trash"></i></a>
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