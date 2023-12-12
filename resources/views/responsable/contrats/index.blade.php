@extends('master')
@section('content')
<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Liste Contrat</h4>
        <a href="/contrat/create" type="button" class="btn btn-success btn-icon-text">
        <i class="ti-upload btn-icon-prepend"></i>                                                    
            Ajouter une Contrat
        </a>
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
                    prix_total
                </th>
                <th>
                    remarque
                </th>
                <th>
                    autre_indeminités
                </th>
                <th>
                    voiture_id 
                </th>
                <th>
                    client_id 
                </th>
                <th>
                    date reservation  
                </th>
                <th>
                    Actions
                </th>
                <th>
                  Imprimer
              </th>
              </tr>
            </thead>
            <tbody>

              @foreach ($contrats as $item)
              <tr>
               
                <td>
                  {{ $item->date_debut }}
                </td>
                <td>
                    {{ $item->date_fin }}
                </td>
                  <td>
                    <?php
                    $prix_par_jour = $item->voiture->prix;
                    $date_fin = $item->date_fin;
                    $date_debut = $item->date_debut;

                    $timestamp1 = strtotime($date_debut);
                    $timestamp2 = strtotime($date_fin);

                    $nbr_jours = round(($timestamp2 - $timestamp1)/86400);
                    $prix_total = $prix_par_jour*$nbr_jours;

                    if($prix_total>0){
                      echo $prix_total.'DH';
                    }else {
                      ?>
                      <span class="badge badge-danger">ya un problem de date</span>
                      <?php
                    }
                    ?>
                </td>
                  <td>
                    {{ $item->remarque }}
                </td>
                <td>
                  @if (isset($item->autre_indeminités))
                      {{ $item->autre_indeminités }}
                  @else
                  <button type="button" class="btn btn-primary btn-rounded btn-icon ">
                    <a class="text-white" href="/contrat/edit/{{ $item->id }}"><i class="ti-plus"></i></a>
                  </button>
                  @endif
                </td>
                <td>
                    {{ $item->voiture->immatruculation }}
                </td>
                <td>
                    {{ $item->client->nom }}
                </td>
                <td>
                    {{ $item->reservation->date_reservation ?? 'None' }}
                </td>
                <td>
                   
                      <button type="button" class="btn btn-danger btn-rounded btn-icon">
                        <a class="text-white" href="/contrat/delete/{{ $item->id }}"><i class="ti-trash"></i></a>
                    </button>
                </td>
                <td>
                  <a href="/contrat/{{ $item->id }}" class="btn btn-info btn-rounded btn-icon">
                      <i class="ti-download"></i> Imprimer PDF
                  </a>
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