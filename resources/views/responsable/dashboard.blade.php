<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/select.dataTables.min.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
  @include('layouts.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
     @include('layouts.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
    
       
    
          <a href="/reservation/liste" class="btn btn-outline-primary" data-mdb-ripple-color="dark">Voir tout les reservation</a>


            <div class="row">
            @forelse ($voitures as $item)
            <div class="col-md-6 col-lg-4 mb-4 mb-md-0 mt-3">
              <div class="card">
                <div class="d-flex justify-content-between p-3">
                  <p class="lead mb-0">remise de</p>
                  <div
                    class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                    style="width: 35px; height: 35px;">
                    <?php 
                    $prix =  $item->prix;
                    $prix_promotion = $item->prix_promotion;
                    $total = $prix - ($prix*($prix_promotion/100));
                    ?>
                    <p class="text-white mb-0 small">-<?php echo $prix_promotion ?>%</p>
                  </div>
                </div>
                <img  src="{{ asset('upload') }}/{{ $item->image }}"
                  class="card-img-top w-100" alt="Gaming Laptop" />
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <p class="small"><a href="/responsable/categories" class="text-muted">{{ $item->categorie->intitule_categorie }}</a></p>
                    <p class="small text-danger">{{ $item->nbr_place }} places </p>
                  </div>
      
                  <div class="d-flex justify-content-between mb-3">
                    <h5 class="mb-0">{{ $item->nom }}</h5>
                    <h5 class="text-dark mb-0">{{ $total }}DH</h5>
                  </div>
                  <?php 





// $servername = "localhost";
// $username = "root";
// $password = "";

// try {
//   $conn = new PDO("mysql:host=$servername;dbname=app_agency", $username, $password);
//   // set the PDO error mode to exception
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   //echo "Connected successfully";
// } catch(PDOException $e) {
//   echo "Connection failed: " . $e->getMessage();
// }    
//  $date_fin = $conn->query("SELECT r.date_fin 
// FROM reservations r INNER JOIN voitures v ON r.voiture_id = v.id WHERE v.etat = 'reservé' AND r.etat = 1")->fetchAll(PDO::FETCH_OBJ);
 
// foreach ($date_fin as $value) {
//   echo $value->date_fin;
// }



                   $date_fin_reservation = $item->date_fin;
                  $date_aujourdhui = date('Y-m-d');
                  // $etat = $item->reservation->etat;
                  // echo $date_fin_reservation;
                  // echo $date_aujourdhui;
                 
                  if($date_fin_reservation == $date_aujourdhui){
                    ?>
                    
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <div class="alert-message">
                        <strong> Attention!</strong> la reservation de voiture a été terminée.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    </div>
                    <?php

                  }elseif ($date_fin_reservation == 0) {
                    ?><p></p><?php
                  }elseif($item->etat == 'reservé') {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <div class="alert-message">
                        <strong>En cours!</strong> la réservation de voiture en cours.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    </div>
                    <?php
                  }else{
                    ?><p></p><?php
                  }

                  ?>
      
      <?php 
        // $etat = $item->reservation->etat ?? 0;
      ?>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
                      @if ($item->etat == "despo")
                      <span class="badge badge-success">desponible</span>
                      @else
                      <span class="badge badge-danger">déja réservé</span>
                      @endif
                      @if ($item->etat == "despo")
                      <a href="/reservation/create/voiture/{{ $item->id }}" type="button" class="btn btn-primary" >Réserver</a>
                      @else
                      <button type="button" class="btn btn-primary" disabled>Réserver</button>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @empty
              
            @endforelse
            </div>




        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span> 
          </div>
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
  <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('assets/js/template.js') }}"></script>
  <script src="{{ asset('assets/js/settings.js') }}"></script>
  <script src="{{ asset('assets/js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('assets/js/Chart.roundedBarCharts.js') }}"></script>
  <!-- End custom js for this page-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>

