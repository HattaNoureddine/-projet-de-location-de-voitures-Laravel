@extends('master')
@section('content')
<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Liste voitures</h4>
        <a href="/voiture/create" type="button" class="btn btn-success btn-icon-text">
        <i class="ti-upload btn-icon-prepend"></i>                                                    
            Aouter une voiture
        </a>
        <div class="table-responsive pt-3">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>
                  image
                </th>
                <th>
                  Nom
                </th>
                <th>
                    immatruculation
                </th>
                <th>
                    module
                </th>
                <th>
                    année_achat
                </th>
                <th>
                    prix_achat
                </th>
                <th>
                    nbr_place
                </th>
                <th>
                    prix
                </th>
                <th>
                    prix_promotion
                </th>
                <th>
                    etat
                </th>
                <th>
                    marque
                </th>
                <th>
                    categorie
                </th>                
                <th>
                    typemoteur
                </th>
                <th>
                    Actions
                </th>
              </tr>
            </thead>
            <tbody>
              @forelse ($voitures as  $item)
              <tr>
                <td>
                  <img style="border-radius: 0%;width:100px;height:100%;" src="{{ asset('upload') }}/{{ $item->image }}" alt="image">
                </td>
                <td>
                  {{ $item->nom }}
              </td>
                <td>
                    {{ $item->immatruculation }}
                </td>
                <td>
                  {{ $item->module }}
                </td>
                <td>
                    {{ $item->année_achat }}
                  </td>
                  <td>
                    {{ $item->prix_achat }}
                  </td>
                  <td>
                    {{ $item->nbr_place }}
                  </td>
                  <td>
                    {{ $item->prix }}
                  </td>
                  <td>
                    {{ $item->prix_promotion }}
                  </td>
                  <td>
                    {{ $item->etat }}
                  </td>
                  <td>
                    {{ $item->marque->intitule_marque  }}
                  </td>
                  <td>
                    {{ $item->categorie->intitule_categorie  }}
                  </td>      
                  <td>
                    {{ $item->typemoteur->intitule_moteur  }}
                  </td>                  
                <td>
                    <button type="button" class="btn btn-primary btn-rounded btn-icon ">
                        <a class="text-white" href="/voiture/edit/{{ $item->id }}"><i class="ti-pencil"></i></a>
                    </button>
                    <button type="button" class="btn btn-danger btn-rounded btn-icon">
                        <a class="text-white" href="/voiture/delete/{{ $item->id }}"><i class="ti-trash"></i></a>
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