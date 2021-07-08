<!DOCTYPE html>
<html>
<head>
    <title>Liste des inscrits</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    
<div class="container-fluid">
    <h1>Liste complète des incrits<br/></h1>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Genre</th>
                <th>Nom</th>
                <th>Prénoms</th>
                <th>Fonction</th>
                <th>Comité Spécial</th>
                <th>Pays</th>
                <th>Email</th>
                <th>Date</th>
                <th>Heure</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
   
</body>
   
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('inscrits') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'libelle', name: 'libelle'},
            {data: 'nom', name: 'nom'},
            {data: 'prenoms', name: 'prenoms'},
            {data: 'fonction', name: 'fonction'},
            {data: 'libelle_cs', name: 'libelle_cs'},
            {data: 'libelle_pays', name: 'libelle_pays'},
            {data: 'email', name: 'email'},
            {data: 'date', name: 'date'},
            {data: 'heure', name: 'heure'},
           // {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>
</html>