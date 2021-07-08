<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>EDITER:::ASSISE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/main.css">
  <style type="text/css">
    @import url("https://fonts.googleapis.com/css?family=Sacramento&display=swap");
  </style>
</head>
<body>
<div class="container">
  <div class="col-md-12">
    <div class="card text-white bg-primary mt-5">
      <div class="card-header">Edition d'assise</div>
      <div class="card-body">
        <h5 class="card-title"></h5>
         <form class="text-primary" action="{{Route('edit_assise')}}" method="POST">
        @csrf
          <div class="form-group">
            <input type="hidden"  name="id" value="{{$assise['id']}}">

            <label for="exampleInputEmail1"><strong class="text-white">TITRE</strong></label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Titre intégrale de l'assise à programmer" name="titre" value="{{$assise['titre']}}">
            <small id="emailHelp" class="form-text text-muted"></small>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1"><strong class="text-white">THEME</strong></label>
            <textarea class="form-control" rows="3" name="theme">{{$assise['theme']}}</textarea>
            
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col">
                <label for="exampleInputPassword1"><strong class="text-white">DATE DEBUT</strong></label>
                <input type="date" class="form-control" name="debut" value="{{$assise['date_debut']}}">
              </div>
              <div class="col">
                <label for="exampleInputPassword1"><strong class="text-white">DATE FIN </strong></label>
                <input type="date" class="form-control" name="fin" value="{{$assise['date_fin']}}">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <label for="exampleInputPassword1"><strong class="text-white">PERIODE CORRESPONDANTE A L'ASSISE</strong></label>
              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="La période correspondante à l'assise" value="{{$assise['periode']}}" name="periode">
            </div>
          </div>
          <div class="row">
            <button type="submit" class="btn btn-warning btn-lg"><i class="fa fa-check"></i> Modifier</button>
          </div> 
          @if(Session::has('msg'))
          <div class="row">
            <div class="col-md-12 text-center alert-success">
              <p class="text-weight-bold">{{ Session::get('msg') }}</p>
            </div>
          </div>
          <div class="row">
            <a href="/admin" class="btn btn-block btn-danger">Quitter</a>
          </div>
          @endif
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

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
</body>
</html>
