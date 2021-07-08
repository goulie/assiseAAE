
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>@yield('page-title')::AAE</title>



  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/main.css">
@yield('script')
@yield('css')
  <style type="text/css">
    @import url("https://fonts.googleapis.com/css?family=Sacramento&display=swap");

h6 {
  font-size: calc(10px + 10vh);
  line-height: calc(10px + 10vh);
/*   text-shadow: 0 0 5px #f562ff, 0 0 15px #f562ff, 0 0 25px #f562ff,
    0 0 20px #f562ff, 0 0 30px #890092, 0 0 80px #890092, 0 0 80px #890092;
  color: #fccaff; */
  text-shadow: 0 0 5px #ffa500, 0 0 15px #ffa500, 0 0 20px #ffa500, 0 0 40px #ffa500, 0 0 60px #ff0000, 0 0 10px #ff8d00, 0 0 98px #ff0000;
    color: #fff6a9;
  font-family: "Sacramento", cursive;
  text-align: center;
  animation: blink 2s infinite;
  -webkit-animation: blink 2s infinite;
}

@-webkit-keyframes blink {
  20%,
  24%,
  55% {
    color: #111;
    text-shadow: none;
  }

  0%,
  19%,
  21%,
  23%,
  25%,
  54%,
  56%,
  100% {
/*     color: #fccaff;
    text-shadow: 0 0 5px #f562ff, 0 0 15px #f562ff, 0 0 25px #f562ff,
      0 0 20px #f562ff, 0 0 30px #890092, 0 0 80px #890092, 0 0 80px #890092; */
  text-shadow: 0 0 5px #ffa500, 0 0 15px #ffa500, 0 0 20px #ffa500, 0 0 40px #ffa500, 0 0 60px #ff0000, 0 0 10px #ff8d00, 0 0 98px #ff0000;
    color: #fff6a9;
  }
}

@keyframes blink {
  20%,
  24%,
  55% {
    color: #111;
    text-shadow: none;
  }

  0%,
  19%,
  21%,
  23%,
  25%,
  54%,
  56%,
  100% {
/*     color: #fccaff;
    text-shadow: 0 0 5px #f562ff, 0 0 15px #f562ff, 0 0 25px #f562ff,
      0 0 20px #f562ff, 0 0 30px #890092, 0 0 80px #890092, 0 0 80px #890092; */
  text-shadow: 0 0 5px #ffa500, 0 0 15px #ffa500, 0 0 20px #ffa500, 0 0 40px #ffa500, 0 0 60px #ff0000, 0 0 10px #ff8d00, 0 0 98px #ff0000;
    color: #fff6a9;
  }
}

  </style>
</head>

<body>

  <header class="navbar navbar-expand sticky-top bg-info navbar-dark flex-column flex-md-row bd-navbar">
    <a class="navbar-brand mr-0 mr-md-2" href="#">
      <img class="navbar-brand--img " src="../image/afwa-logo.jfif"
        title="AAE/AFWA">
    </a>

    <div class="navbar-nav-scroll" style="padding-left: 10px">
      <ul class="navbar-nav bd-navbar-nav flex-row"> 
        <li class="nav-item px-2">
          <a class="nav-link text-white " href="/admin"><i class="fa fa-home"></i> <strong> Accueil</strong> </a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link text-white" href="/gestion_assise"><i class="fa fa-cog"></i><strong> Gestion des Assises</strong></a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link text-white" href="{{Route('extraction')}}"><i class="fa fa-line-chart"></i><strong> Extraction de données</strong></a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link text-white" href="{{Route('gestion_presence')}}"><i class="fa fa-edit"></i><strong>Gestion des présences</strong></a>
        </li> 
        <li class="nav-item px-2">
          <a class="nav-link text-white" href="/statistique-present"><i class="fa fa-edit"></i><strong> Statistiques de présence</strong></a>
        </li>
      </ul>
    </div>

    <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
      <li class="nav-item dropdown">         
          <a class="dropdown-item" href="/logout">
            <i class="fa fa-power-off pr-2"></i>Se déconnecter
          </a>
      </li>
    </ul>
  </header>

  <div class="container-fluid">
    <div class="row">
      <main class="col-md-12 ml-sm-auto col-lg-12 ">
        <div class="alert alert-sucess bg-dark">
          <h6>African  Water Association</h6>
        </div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2 text-primary"><i class="fa fa-tachometer"></i> TABLEAU DE BORD DES ASSISES
          </h1>
          <!----------------------
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Extraire par Assise</button>
            </div>
          </div>
          ---------------------->
        </div>
      </main>
@yield('content')

      
    </div>
  </div>
        <!-- Modal statistiques avancées-->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">

            <form action="{{Route('extract')}}" method="POST">
              @csrf
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-bar-chart"></i> STATISTIQUES PAR ASSISE</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label=" Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js"></script>
  
  <script src="js/main.js"></script>
  <script src="js/chart.js"></script>

  @yield('js')

</body>

</html>
