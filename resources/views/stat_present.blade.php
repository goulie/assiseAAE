

@extends('layout')

@section('page-title','TABLEAU DE BORD')

@section('script')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
           @foreach ($membre as $row)
          [ "{{ $row->libelle }}", {{ $row->inscriptions->count() }} ],
          @endforeach
        ]);

        var options = {
          title: 'MEMBRE PRESENT PAR GENRE',
          pieHole: 0.4,
           is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
     <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
      ['membre', 'inscriptions'],
      @foreach ($pays as $row) 
      [ "{{ $row->libelle_pays }}", {{ $row->inscriptions->count() }} ],
      @endforeach
    ]);

        var options = {
          title: 'Présent par Pays',
          is3D: false,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pays'));

        chart.draw(data, options);
      }
    </script>
        <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
           @foreach ($organisation as $row)
          [ "{{ $row->libelle_type_org }}", {{ $row->inscriptions->count() }} ],
          @endforeach
        ]);

        var options = {
          title: 'MEMBRE PRESENT PAR TYPE ORGANISATION',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('organisation'));
        chart.draw(data, options);
      }
    </script>

            <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
           @foreach ($membreaae as $row)
          [ '{{ $row->lib_typ_membre }}', {{ $row->inscriptions->count()}} ],
          @endforeach
        ]);

        var options = {
          title: 'MEMBRE PRESENT PAR MEMBRE',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('membre'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
           @foreach ($cs as $row)
          [ '{{ $row->libelle_cs }}', {{ $row->inscriptions->count()}} ],
          @endforeach
        ]);

        var options = {
          title: 'MEMBRE PRESENT PAR MEMBRE',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('cs'));
        chart.draw(data, options);
      }
    </script>

    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!------------------end-------------->
@endsection

@section('content')
<div class="container-fluid">
  <div class="col-md-12">
    <div class="row">
      <div class=col-md-6>
        <div class="card">
          <div class="card-header">
            <div class="card-title text-center">
              <h4>PRESENT PAR PAYS</h4>
            </div>
          </div>
          <div class="card-body">
             <div id="pays" style="width:700px; height: 300px;"></div>
          </div>
        </div>
      </div>
      <div class=col-md-6>
        <div class="card">
          <div class="card-header ">
            <div class="card-title text-center">
              <h4>MEMBRE PRESENT PAR GENRE</h4>
            </div>
          </div>
          <div class="card-body">
             <div id="donutchart" style="width:700px; height: 300px;"></div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class=col-md-6>
        <div class="card">
          <div class="card-header">
            <div class="card-title text-center">
              <h4>MEMBRE PRESENT PAR MEMBRE</h4>
            </div>
          </div>
          <div class="card-body">
             <div id="membre" style="width:700px; height: 300px;"></div>
          </div>
        </div>
      </div>
      <div class=col-md-6>
        <div class="card">
          <div class="card-header">
            <div class="card-title text-center">
              <h4>MEMBRES PRESENTS PAR TYPE D'ORGANISATION</h4>
            </div>
          </div>
          <div class="card-body">
             <div id="organisation" style="width:700px; height: 300px;"></div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class=col-md-12>
        <div class="card">
          <div class="card-header bg-primary">
            <div class="card-title align-">
              <h4>MEMBRES PRESENTS PAR COMITE SPECIAL</h4>
            </div>
          </div>
          <div class="card-body d-flex justify-content-center">
             <div id="cs" style="width:900px; height: 300px;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>

@endsection
@section('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@endsection