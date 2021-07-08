<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CONFIRMATION D'INSCRIPTION</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link href="style/style.css" rel="stylesheet">

    </head>
    <body style="background: #ffffff fixed;">
        <div class="container" style="padding-top:50px">
            <div class="row" style="background: linear-gradient(90deg, rgba(51,50,144,1) 0%, rgba(221,221,221,1) 49%, rgba(25,135,84,1) 100%);" >
                <div class="col-md-2">
                    <img src="image/afwa-logo.jfif" style="width:90px;height: auto; padding: 10px 10px 10px 10px">
                </div>
                <div class="col-md-10">
                    <h1 class="text-white">
                        86èmes Assises du Conseil Scientifique et Technique
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 alert alert-success">
                    <strong>THEME :</strong> Contribution du secteur WASH dans le combat contre la COVID-19 à l'aune du Forum Mondial de l'eau 2022.
                </div>
            </div>
            <div class="row">
              <div class="card ">
                <div class="card-header alert bg-success text-white">
                  <center><h3>Confirmation d'inscription</h3></center>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Salut <strong>{{$prenoms}} {{$nom}}</strong></h5>
                  <p class="card-text">Pour la  86ème Assises du Conseil Scientifique et Technique, votre inscription a bien été pris en compte...<br>Un email contenant votre lien d'inscription vous a été envoyé à l'adresse <strong>{{$email}}</strong></p>
                </div>
              </div>
            </div>



    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        <script type="text/javascript" src="style/style.js"></script>

        
       
    </body>
</html>
