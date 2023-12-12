<!DOCTYPE html>
<html>
<head>
    <style>
        /* Add any necessary styling for the PDF */
    </style>
</head>
<body>
    <div class="container">
    <h1>Contract Information</h1>
    <p>Date Debut: {{ $contrat->date_debut }}</p>
    <p>Date Fin: {{ $contrat->date_fin }}</p>
    {{-- <p>Prix Total: {{ $contrat->prix_total }}</p> --}}
  </div>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
