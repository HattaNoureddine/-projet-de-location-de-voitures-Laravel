@extends('master')
@section('content')
<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Liste clients</h4>
        <a href="/client/create" type="button" class="btn btn-success btn-icon-text">
        <i class="ti-upload btn-icon-prepend"></i>                                                    
            Aouter un client
        </a>
        <div class="table-responsive pt-3">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>
                  Nom
                </th>
                <th>
                    Prenom
                </th>
                <th>
                    Email
                </th>
                <th>
                    Phone
                </th>
                <th>
                    Cin
                </th>
                <th>
                    Numero de passport
                </th>
                <th>
                    Numero de permi
                </th>
                <th>
                    Image de permi
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
              @forelse ($clients as $index => $item)
              <tr>
                <td>
                  {{ $item->nom }}
                </td>
                <td>
                    {{ $item->prenom }}
                  </td>
                  <td>
                    {{ $item->email }}
                  </td>
                  <td>
                    {{ $item->tel }}
                  </td>
                  <td>
                    {{ $item->cin }}
                  </td>
                  <td>
                    {{ $item->num_passport }}
                  </td>
                  <td>
                    {{ $item->num_permi }}
                  </td>
                  <td>
                   <img style="border-radius: 0%;width:100%;height:100%;" src="{{ asset('upload') }}/{{ $item->image_permi }}" alt="">
                  </td>
                  <td>
                    {{ $item->ville->nom }}
                  </td>
                <td>
                    <button type="button" class="btn btn-primary btn-rounded btn-icon ">
                        <a class="text-white" href="/client/edit/{{ $item->id }}"><i class="ti-pencil"></i></a>
                      </button>
                      <button type="button" class="btn btn-danger btn-rounded btn-icon">
                        <a class="text-white" href="/client/delete/{{ $item->id }}"><i class="ti-trash"></i></a>
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