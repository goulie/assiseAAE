

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
      @foreach ($membre as $row) // On parcourt les catégories
      [ "{{ $row->libelle }}", {{ $row->inscriptions->count() }} ],
      @endforeach
    ]);

        var options = {
          title: '',
          is3D:'true'
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


@endsection

@section('content')
  <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 pr-2 mb-3">
          <div class="card text-white bg-primary">
            <div class="card-header"><i class="fa fa-shopping-bag"></i>Inscrits
            </div>
            <div class="card-body">
            <h1 class="card-title">{{$total->count()}}</h1></a>
            </div>
          </div>
        </div>
      <div class="col-lg-4 col-md-4 col-sm-12 pr-2 mb-3">
        <div class="card text-white bg-success">
          <div class="card-header"><i class="fa fa-bar-chart"></i>PAYS
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
    </div>
    
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 pr-2 mb-3">
            <div class="card-collapsible card">
              <div class="card-header bg-success">
                <strong>INSCRITS PAR PAYS</strong><i class="fa fa-caret-down caret"></i>
              </div>
              <div class="card-body d-flex justify-content-around">
              	<div id="membre_par_pays" style="width:auto; height: 300px;"></div>
              </div>
            </div>
          </div>
        </div>

        <div class="row ">
          <div class="col-lg-12 col-md-12 col-sm-12 pr-2 mb-3 ">
            <div class="card-collapsible card">
              <div class="card-header bg-warning">
                <strong>INSCRITS PAR GENRE</strong><i class="fa fa-caret-down caret"></i>
              </div>
              <div class="card-body d-flex justify-content-around">
              	<div id="incrits_par_genre" style="width: 100%;height: 400px;"></div>
              </div>
            </div>
          </div>
        </div>

        <div class="row ">
          <div class="col-lg-12 col-md-12 col-sm-12 pr-2 mb-3 ">
            <div class="card-collapsible card">
              <div class="card-header bg-warning">
                <strong>INSCRITS PAR TYPE D'ORGANISATION</strong><i class="fa fa-caret-down caret"></i>
              </div>
              <div class="card-body d-flex justify-content-around">
              	<div id="membre_par_type_org" style="width: auto; height: 300px;"></div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 pr-2 mb-3">
            <div class="card-collapsible card">
              <div class="card-header bg-danger">
                <strong>INSCRITS PAR COMITE SPECIALISE</strong><i class="fa fa-caret-down caret"></i>
              </div>
              <div class="card-body d-flex justify-content-around">
                 <div id="incrits_par_cs" style="width:100%; height: 500px;"></div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 pr-2 mb-3">
            <div class="card-collapsible card">
              <div class="card-header">
                <strong>INSCRITS PAR MEMBRE AAE/AFWA</strong><i class="fa fa-caret-down caret"></i>
              </div>
              <div class="card-body d-flex justify-content-around">
                  <div id="genre_par_m" style="width:100%;height:500px;"></div>
                 
              </div>
            </div>
          </div>
        </div>
      </div>

        
@endsection