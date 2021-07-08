

@extends('layout')

@section('page-title','TABLEAU DE BORD')

@section('script')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
      ['membre', 'inscriptions'],
      @foreach ($membre as $row)
      [ "{{ $row->libelle }}", {{ $row->inscriptions->count() }} ],
      @endforeach
    ]);

        var options = {
          title: '',
          is3D:'false'
        };

        var chart = new google.visualization.PieChart(document.getElementById('incrits_par_genre'));

        chart.draw(data, options);
      }
    </script>

     <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
      ['membre', 'inscriptions'],
      @foreach ($membre_par_pays as $row) 
      [ "{{ $row->libelle_pays }}", {{ $row->inscriptions->count() }} ],
      @endforeach
    ]);

        var options = {
          title: 'inscription par Genre'
        };

        var chart = new google.visualization.PieChart(document.getElementById('membr_par_pays'));

        chart.draw(data, options);
      }
    </script>

<script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['', 'Nombe inscrits'],
          @foreach ($membre_par_pays as $row)
      [ "{{ $row->libelle_pays }}", {{ $row->inscriptions->count() }} ],
      @endforeach
    ]);
          var options = {
          width: 800,
          legend: { position: 'none' },
          chart: {
            title: '',
            subtitle: '' },
          axes: {
            x: {
              0: { side: 'bottom', label: 'Pays participants'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('membre_par_pays'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
</script>

<script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['', 'Nombe inscrits',{ role: 'style' }],
          @foreach ($membre_typ_org as $row)
      [ "{{ $row->libelle_type_org }}", {{ $row->inscriptions->count() }},'#b87333' ], 
      @endforeach
    ]);
          var options = {
          width: 800,
          legend: { position: 'none' },
          chart: {
            title: ''},
          axes: {
            x: {
              0: { side: 'top', label: 'Types d\'organisation'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('membre_par_type_org'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
</script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
      ['membre', 'inscriptions'],
      @foreach ($membre_cs as $row) 
      [ "{{ $row->libelle_cs }}", {{ $row->inscriptions->count() }} ], 
      @endforeach
    ]);

        var options = {
          title: 'Inscription par Comité spécialisé'
        };

        var chart = new google.visualization.PieChart(document.getElementById('incrits_par_cs'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawTitleSubtitle);

function drawTitleSubtitle() {
      var data = new google.visualization.DataTable();
      data.addColumn('timeofday', 'Tous les pays participants ');
      data.addColumn('number', 'Femme');
      data.addColumn('number', 'Homme');

      data.addRows([
        [{v: [8, 0, 0], f: 'pays'}, 11, 11],
        
        
      ]);

      var options = {
        chart: {
          title: '',
          subtitle: ''
        },
        hAxis: {
          title: '',
          format: '',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'Rating (scale of 1-10)'
        }
      };

      var materialChart = new google.charts.Bar(document.getElementById('genre_par_pays'));
      materialChart.draw(data, options);
    }
    </script>
     <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
      ['Type Membre', 'inscrits'],
      @foreach ($membreaae as $row) 
      [ "{{ $row->lib_typ_membre }}", {{ $row->inscriptions->count()}} ],
      @endforeach
    ]);

        var options = {
          title: ''
        };

        var chart = new google.visualization.PieChart(document.getElementById('genre_par_m'));

        chart.draw(data, options);
      }
    </script>

    <script>
      $(document).ready(function(){
        $(".nav-tabs a").click(function(){
          $(this).tab('show');
        });
      });
    </script>
    <style type="text/css">
      .card-title{
        margin-top:0px;
        margin-bottom:0px;
        font-size: 3.5em;
        text-align: center;
        font-weight: bold;
      }
    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!------------------end-------------->
@endsection

@section('content')
  <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 pr-2 mb-3">
          <div class="card text-white bg-secondary">
            <div class="card-header"><i class="fa fa-shopping-bag"></i> INSCRITS
            </div>
            <div class="card-body"><a href="/liste-complete-des-inscrits" class="text-white" data-toggle="tooltip" data-placement="top">
            <h1 class="card-title" title="Cliquer pour voir la liste">{{$total->count()}}</h1></a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 pr-2 mb-3">
          <div class="card  bg-warning">
            <div class="card-header"><i class="fa fa-user"></i> PRESENTS
          </div>
          <div class="card-body">
            <h1 class="card-title">{{$presents->count()}}</h1>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 pr-2 mb-3">
        <div class="card text-white bg-dark">
          <div class="card-header"><i class="fa fa-user"></i> ABSENTS
          </div>
          <div class="card-body">
            <h1 class="card-title"> {{$abs}} </h1>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12 pr-2 mb-3">
        <div class="card text-white bg-success">
          <div class="card-header"><i class="fa fa-bar-chart"></i> PAYS
          </div>
          <div class="card-body">
            <h1 class="card-title"> {{$pays_pat}}
            </h1>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 pr-2 mb-3">
        <div class="card text-white bg-info">
          <div class="card-header"><i class="fa fa-user-plus"></i> MEMBRES AAE
          </div>
          <div class="card-body">
            <h1 class="card-title"> {{$AAE}} </h1>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 pr-2 mb-3">
        <div class="card text-white bg-danger">
          <div class="card-header"><i class="fa fa-user"></i> NON MEMBRES AAE
          </div>
          <div class="card-body">
            <h1 class="card-title"> {{$nonAAE}} </h1>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="callout">
          <marquee behavior="right"><h4>{{$titre}}</h4></marquee>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12">
        <nav class="nav nav-tabs nav-justified">
          <a data-toggle="tab"  class="nav-item nav-link border-bottom" href="#Type_org">Participant/Type d'organisation</a>
          <a data-toggle="tab"  class="nav-item nav-link" href="#pays">Participant/Pays</a>
          <a data-toggle="tab"  class="nav-item nav-link" href="#genre">Participant/Genre</a>
          <a data-toggle="tab"  class="nav-item nav-link" href="#comité">Participant/Comité spécialisé</a>
          <a data-toggle="tab"  class="nav-item nav-link" href="#typemembre">Participant/Type de Membre</a>
        </nav>
      </div>
    </div>
      <div class="container-fluid">
        <div class="tab-content">
          <div id="Type_org" class="tab-pane fade in active">
            <h3>Participants par Type d'organisation</h3>
            <div class="row ">
                <div class="col-lg-12 col-md-12 col-sm-12 pr-2 mb-3 ">
                  <div class="card-collapsible card">
                    <div class="card-body d-flex justify-content-around">
                      <div id="membre_par_type_org"></div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div id="pays" class="tab-pane fade">
            <h3>Participant par Pays</h3>
            <div class="row ">
                <div class="col-lg-12 col-md-12 col-sm-12 pr-2 mb-3 ">
                  <div class="card-collapsible card">
                    <div class="card-body d-flex justify-content-around">
                      <div id="membre_par_pays"></div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div id="genre" class="tab-pane fade">
            <h3>Participant par Genre</h3>
              <div class="row ">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="card-collapsible card">
                    <div class="card-body d-flex justify-content-around">
                    <div id="incrits_par_genre"></div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div id="comité" class="tab-pane fade">
            <h3>Participant par Comité Spécialisé</h3>
            <div class="row ">
                <div class="col-lg-12 col-md-12 col-sm-12 pr-2 mb-3 ">
                  <div class="card-collapsible card">
                    <div class="card-body d-flex justify-content-around">
                      <div id="incrits_par_cs"></div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div id="typemembre" class="tab-pane fade">
            <h3>Participant par Type de membre</h3>
            <div class="row ">
                <div class="col-lg-12 col-md-12 col-sm-12 pr-2 mb-3 ">
                  <div class="card-collapsible card">
                    <div class="card-body d-flex justify-content-around">
                      <div id="genre_par_m"></div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-primary text-center">
              <h2>Liste des Inscrits</h2>
            </div> 
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
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
        </div>
      </div>
    </div>

        
@endsection
@section('js')
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@endsection