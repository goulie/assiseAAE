<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FORMULAIRE</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link href="{{asset('style/style.css')}}" rel="stylesheet">

    </head>
    <body>
        <div class="container-fluid">
            <div class="row blue">
                <div class="col-md-2">
                    <img src="image/afwa-logo.jfif" id="logo">
                </div>
                <div class="col-md-10 align-self-center">
                    <h1 class="text-white">
                       <b>{{__('lang.title') }}</b>
                    </h1>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 text-center" style="padding:20px 0px 20px 0px;background-color: #198754;">
                    <strong class="bg-warning">THEME :</strong> 
                    <h5 class="text-white">{{__('lang.theme')}}</h5>
                </div>
            </div>
        </div>
        <div class="container">
          <form action="{{Route('submit.form')}}" method="POST" name="formulaire" id="formulaire">
                    @csrf 
            <div class="row bg-white">
                <div class="col-md-2 offset-md-5">
                   <div class="card">
                        <div class="card-header text-center bg-info">
                           <strong>{{__('lang.langue')}}</strong>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><center>
                                <img src="{{asset('image/fr.jpg')}}" style="width:30px;height:auto;">
                                <img src="{{asset('image/anglais.jpg')}}" style="width:30px;height:auto;">
                                <select name="language" class="form-control Langchange">
                                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected': '' }}> Anglais </option>
                                    <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected': '' }}> Français </option>                    
                                </select></center>
                            </h5>
                        </div>
                    </div> 
                </div>
                <div class="col-md-10 offset-md-1">
                    <div class="alert text-center">
                        <strong><p>{{__('lang.require1')}}(<span class="star">*</span>) {{__('lang.require2')}}</p>
                        </strong>
                    </div>
                    <!---------------=========================------->
                    @if (session()->has('exist'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>{{__('lang.attention')}}</strong> {{__('lang.msgattention')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <!---------------=========================------->
                     <!---------------=========================------->
                     @if (session()->has('msg'))
                     <div class="alert alert-primary alert-dismissible fade show" role="alert">
                      <strong>Instructions:</strong><br>{{__('lang.instruction')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <!---------------=========================------->
                     <!---------------=========================------->
                     @if (session()->has('save'))
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{__('lang.enreg')}}</strong> {{__('lang.msgenreg')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <!---------------=========================------->
                    <div class="form-group alert">
                        <label for="exampleFormControlInput1" class="form-label"><strong>{{__('lang.lname')}}: <span class="star">*</span></strong></label>
                        <input type="text" name="nom" class="form-control " id="input_nom" placeholder="{{__('lang.lname')}}" value="{{ old('nom') }}">
                        @if ($errors->has('nom'))
                        <div class="alert alert-danger">{{$errors->first('nom')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group alert ">
                        <label for="exampleFormControlInput1" class="form-label"><strong>{{__('lang.fname')}}: <span class="star">*</span></strong>
                        </label>
                        <input type="text" name="prenoms" class="form-control  " id="input_prenoms" placeholder=" {{__('lang.fname')}}" value="{{ old('prenoms')}}" >
                        @if ($errors->has('prenoms'))
                        <div class="alert alert-danger">{{$errors->first('prenoms')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group alert ">
                        <label for="exampleFormControlInput1" class="form-label"><strong>E-mail: <span class="star">*</span></strong></label>
                        <input type="text" name="email" class="form-control" id="input_email" placeholder="Email" value="{{ old('email') }}" >
                        @if ($errors->has('email'))
                        <div class="alert alert-danger">{{$errors->first('email')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group alert ">
                        <label for="exampleFormControlInput1" class="form-label"><strong>{{__('lang.sexe')}}: <span class="star">*</span> </strong></label><br>

                        <div class="form-check form-check-inline">
                            <input type="radio" name="genre" value="2" class="form-check-input" id="g1" {{ (is_array(old('genre')) && in_array(2, old('genre'))) ? ' checked' : '' }}><label class="form-check-label" for="g1">{{__('lang.Homme')}}
                            </label>        
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="genre" value="1" class="form-check-input" id="g2" {{ (is_array(old('genre')) && in_array(1, old('genre'))) ? ' checked' : '' }} >
                            <label class="form-check-label" for="g2">{{__('lang.Femme')}}
                            </label>        
                        </div>
                        @if ($errors->has('genre'))
                        <div class="alert alert-danger">{{$errors->first('genre')}}</div>
                        @endif 
                    </div>

                    <div class="form-group alert">
                        <label for="exampleFormControlInput1" class="form-label"><strong>{{__('lang.country')}}: <span class="star">*</span></strong>
                        </label>
                        <select name="pays" class="form-control" value="{{ old('pays')}}" >
                            <option>{{__('lang.choix')}} ...</option>
                            <option  value="1" {{ (old("pays") == 1 ? "selected":"") }}>{{__('lang.South Africa')}}</option>
                            <option  value="2" {{ (old("pays") == 2 ? "selected":"") }}>{{__('lang.Afghanistan')}}</option>
                            <option  value="3"{{ (old("pays") ==3? "selected":"") }}>{{__('lang.Albania')}}</option>
                            <option  value="4"{{ (old("pays") ==4? "selected":"") }}>{{__('lang.Algeria')}}</option>
                            <option  value="5"{{ (old("pays") ==5? "selected":"") }}>{{__('lang.Germany')}}</option>
                            <option  value="6"{{ (old("pays") ==6? "selected":"") }}>{{__('lang.Andorra')}}</option>
                            <option  value="7"{{ (old("pays") ==7? "selected":"") }}>{{__('lang.Angola')}}</option>
                            <option  value="8"{{ (old("pays") ==8? "selected":"") }}>{{__('lang.Antigua and Barbuda')}}</option>
                            <option  value="9"{{ (old("pays") ==9? "selected":"") }}>{{__('lang.Saudi Arabia')}}</option>
                            <option  value="10"{{ (old("pays") ==10? "selected":"") }}>{{__('lang.Argentina')}}</option>                        
                            <option  value="11"{{ (old("pays") ==11? "selected":"") }}>{{__('lang.Armenia')}}</option>                       
                            <option  value="12"{{ (old("pays") ==12  ? "selected":"") }}>{{__('lang.Australia')}}</option>                       
                            <option  value="13"{{ (old("pays") ==13  ? "selected":"") }}>{{__('lang.Austria')}}</option>                       
                            <option  value="14"{{ (old("pays") ==14  ? "selected":"") }}>{{__('lang.Azerbaijan')}}</option>                        
                            <option  value="15"{{ (old("pays") ==15  ? "selected":"") }}>{{__('lang.Bahamas')}}</option>                       
                            <option  value="16"{{ (old("pays") ==16 ? "selected":"") }}>{{__('lang.Bahrain')}}</option>                       
                            <option  value="17"{{ (old("pays") ==17 ? "selected":"") }}>{{__('lang.Bangladesh')}}</option>                        
                            <option  value="18"{{ (old("pays") == 18 ? "selected":"") }}>{{__('lang.Barbados')}}</option>                        
                            <option  value="19"{{ (old("pays") == 19 ? "selected":"") }}>{{__('lang.Belgium')}}</option>                       
                            <option  value="20"{{ (old("pays") == 20 ? "selected":"") }}>{{__('lang.Belize')}}</option>                        
                            <option  value="21"{{ (old("pays") == 21 ? "selected":"") }}>{{__('lang.Benign')}}</option>                        
                            <option  value="22"{{ (old("pays") == 22 ? "selected":"") }}>{{__('lang.Bhutan')}}</option>                        
                            <option  value="23"{{ (old("pays") == 23 ? "selected":"") }}>{{__('lang.Belarus')}}</option>                       
                            <option  value="24"{{ (old("pays") == 24 ? "selected":"") }}>{{__('lang.Burma')}}</option>                       
                            <option  value="25"{{ (old("pays") == 25 ? "selected":"") }}>{{__('lang.Bolivia')}}</option>                       
                            <option  value="26"{{ (old("pays") == 26 ? "selected":"") }}>{{__('lang.Bosnia and herzegovina')}}</option>
                            <option  value="27"{{ (old("pays") == 27 ? "selected":"") }}>{{__('lang.Botswana')}}</option>
                            <option  value="28"{{ (old("pays") == 28 ? "selected":"") }}>{{__('lang.Brazil')}}</option>                        
                            <option  value="29"{{ (old("pays") == 29 ? "selected":"") }}>{{__('lang.Brunei')}}</option>                        
                            <option  value="30"{{ (old("pays") == 30 ? "selected":"") }}>{{__('lang.Bulgaria')}}</option>                        
                            <option  value="31"{{ (old("pays") == 31 ? "selected":"") }}>{{__('lang.Burkina Faso')}}</option>                        
                            <option  value="32"{{ (old("pays") == 32 ? "selected":"") }}>{{__('lang.Burundi')}}</option>                       
                            <option  value="33"{{ (old("pays") == 33 ? "selected":"") }}>{{__('lang.Cambodia')}}</option>                        
                            <option  value="34"{{ (old("pays") == 34 ? "selected":"") }}>{{__('lang.Cameroon')}}</option>                        
                            <option  value="35"{{ (old("pays") == 35 ? "selected":"") }}>{{__('lang.Canada')}}</option>                        
                            <option  value="36"{{ (old("pays") == 36 ? "selected":"") }}>{{__('lang.Green cap')}}</option>                       
                            <option  value="37"{{ (old("pays") == 37 ? "selected":"") }}>{{__('lang.Chile')}}</option>                       
                            <option  value="38"{{ (old("pays") == 38 ? "selected":"") }}>{{__('lang.China')}}</option>                       
                            <option  value="39"{{ (old("pays") == 39 ? "selected":"") }}>{{__('lang.Cyprus')}}</option>                        
                            <option  value="40"{{ (old("pays") == 40 ? "selected":"") }}>{{__('lang.Colombia')}}</option>                        
                            <option  value="41"{{ (old("pays") == 41 ? "selected":"") }}>{{__('lang.Comoros')}}</option>                       
                            <option  value="42"{{ (old("pays") == 42 ? "selected":"") }}>{{__('lang.North Korea')}}</option>                       
                            <option  value="43"{{ (old("pays") == 43 ? "selected":"") }}>{{__('lang.South Korea')}}</option>                       
                            <option  value="44"{{ (old("pays") == 44 ? "selected":"") }}>{{__('lang.Costa Rica')}}</option>                        
                            <option  value="45"{{ (old("pays") == 45 ? "selected":"") }}>{{__('lang.Ivory Coast')}}</option>                       
                            <option  value="46"{{ (old("pays") == 46 ? "selected":"") }}>{{__('lang.Croatia')}}</option>                       
                            <option  value="47"{{ (old("pays") == 47 ? "selected":"") }}>{{__('lang.Cuba')}}</option>                        
                            <option  value="48"{{ (old("pays") == 48 ? "selected":"") }}>{{__('lang.Denmark')}}</option>                       
                            <option  value="49"{{ (old("pays") == 49 ? "selected":"") }}>{{__('lang.Djibouti')}}</option>                        
                            <option  value="50"{{ (old("pays") == 50 ? "selected":"") }}>{{__('lang.Dominica')}}</option>                        
                            <option  value="51"{{ (old("pays") == 51 ? "selected":"") }}>{{__('lang.Egypt')}}</option>                       
                            <option  value="52"{{ (old("pays") == 52 ? "selected":"") }}>{{__('lang.United Arab Emirates')}}</option>
                            <option  value="53"{{ (old("pays") == 53 ? "selected":"") }}>{{__('lang.Ecuador')}}</option>                       
                            <option  value="54"{{ (old("pays") == 54 ? "selected":"") }}>{{__('lang.Eritrea')}}</option>                       
                            <option  value="55"{{ (old("pays") == 55 ? "selected":"") }}>{{__('lang.Spain')}}</option>                       
                            <option  value="56"{{ (old("pays") == 56 ? "selected":"") }}>{{__('lang.Eswatini')}}</option>                        
                            <option  value="57"{{ (old("pays") == 57 ? "selected":"") }}>{{__('lang.Estonia')}}</option>                       
                            <option  value="58"{{ (old("pays") == 58 ? "selected":"") }}>{{__('lang.United States')}}</option>                       
                            <option  value="59"{{ (old("pays") == 59 ? "selected":"") }}>{{__('lang.Ethiopia')}}</option>                        
                            <option  value="60"{{ (old("pays") == 60 ? "selected":"") }}>{{__('lang.Fiji')}}</option>                        
                            <option  value="61"{{ (old("pays") == 61 ? "selected":"") }}>{{__('lang.Finland')}}</option>                       
                            <option  value="62"{{ (old("pays") == 62 ? "selected":"") }}>{{__('lang.France')}}</option>                        
                            <option  value="63"{{ (old("pays") == 63 ? "selected":"") }}>{{__('lang.Gabon')}}</option>                       
                            <option  value="64"{{ (old("pays") == 64 ? "selected":"") }}>{{__('lang.Gambia')}}</option>                        
                            <option  value="65"{{ (old("pays") == 65 ? "selected":"") }}>{{__('lang.Georgia')}}</option>                       
                            <option  value="66"{{ (old("pays") == 66 ? "selected":"") }}>{{__('lang.Ghana')}}</option>                       
                            <option  value="67"{{ (old("pays") == 67 ? "selected":"") }}>{{__('lang.Greece')}}</option>                        
                            <option  value="68"{{ (old("pays") == 68 ? "selected":"") }}>{{__('lang.Grenade')}}</option>                       
                            <option  value="69"{{ (old("pays") == 69 ? "selected":"") }}>{{__('lang.Guatemala')}}</option>                       
                            <option  value="70"{{ (old("pays") == 70 ? "selected":"") }}>{{__('lang.Guinea')}}</option>                        
                            <option  value="71"{{ (old("pays") == 71 ? "selected":"") }}>{{__('lang.Equatorial Guinea')}}</option>
                            <option  value="72"{{ (old("pays") == 72 ? "selected":"") }}>{{__('lang.Guinea-Bissau')}}</option>                       
                            <option  value="73"{{ (old("pays") == 73 ? "selected":"") }}>{{__('lang.Guyana')}}</option>                        
                            <option  value="74"{{ (old("pays") == 74 ? "selected":"") }}>{{__('lang.Haiti')}}</option>                       
                            <option  value="75"{{ (old("pays") == 75 ? "selected":"") }}>{{__('lang.Honduras')}}</option>                        
                            <option  value="76"{{ (old("pays") == 76 ? "selected":"") }}>{{__('lang.Hungary')}}</option>                       
                            <option  value="77"{{ (old("pays") == 77 ? "selected":"") }}>{{__('lang.Cook Islands')}}</option>                        
                            <option  value="78"{{ (old("pays") == 78 ? "selected":"") }}>{{__('lang.Marshall Islands')}}</option>
                            <option  value="79"{{ (old("pays") == 79 ? "selected":"") }}>{{__('lang.India')}}</option>                       
                            <option  value="80"{{ (old("pays") == 80 ? "selected":"") }}>{{__('lang.Indonesia')}}</option>                       
                            <option  value="81"{{ (old("pays") == 81 ? "selected":"") }}>{{__('lang.Iraq')}}</option>                        
                            <option  value="82"{{ (old("pays") == 82 ? "selected":"") }}>{{__('lang.Iran')}}</option>                        
                            <option  value="83"{{ (old("pays") == 83 ? "selected":"") }}>{{__('lang.Ireland')}}</option>                       
                            <option  value="84"{{ (old("pays") == 84 ? "selected":"") }}>{{__('lang.Iceland')}}</option>                       
                            <option  value="85"{{ (old("pays") == 85 ? "selected":"") }}>{{__('lang.Israel')}}</option>                        
                            <option  value="86"{{ (old("pays") == 86 ? "selected":"") }}>{{__('lang.Italy')}}</option>                       
                            <option  value="87"{{ (old("pays") == 87 ? "selected":"") }}>{{__('lang.Jamaica')}}</option>                       
                            <option  value="88"{{ (old("pays") == 88 ? "selected":"") }}>{{__('lang.Japan')}}</option>                       
                            <option  value="89"{{ (old("pays") == 89 ? "selected":"") }}>{{__('lang.Jordan')}}</option>                        
                            <option  value="90"{{ (old("pays") == 90 ? "selected":"") }}>{{__('lang.Kazakhstan')}}</option>                        
                            <option  value="91"{{ (old("pays") == 91 ? "selected":"") }}>{{__('lang.Kenya')}}</option>                       
                            <option  value="92"{{ (old("pays") == 92 ? "selected":"") }}>{{__('lang.Kyrgyzstan')}}</option>                        
                            <option  value="93"{{ (old("pays") == 93 ? "selected":"") }}>{{__('lang.Kiribati')}}</option>                        
                            <option  value="94"{{ (old("pays") == 94 ? "selected":"") }}>{{__('lang.Kuwait')}}</option>                        
                            <option  value="95"{{ (old("pays") == 95 ? "selected":"") }}>{{__('lang.Laos')}}</option>                        
                            <option  value="96"{{ (old("pays") == 96 ? "selected":"") }}>{{__('lang.Lesotho')}}</option>                       
                            <option  value="97"{{ (old("pays") == 97 ? "selected":"") }}>{{__('lang.Latvia')}}</option>                        
                            <option  value="98"{{ (old("pays") == 98 ? "selected":"") }}>{{__('lang.Lebanon')}}</option>                       
                            <option  value="99"{{ (old("pays") == 99 ? "selected":"") }}>{{__('lang.Liberia')}}</option>                       
                            <option  value="100"{{ (old("pays") == 100 ? "selected":"") }}>{{__('lang.Libya')}}</option>
                            <option  value="101"{{ (old("pays") == 101 ? "selected":"") }}>{{__('lang.Liechtenstein')}}</option>
                            <option  value="102"{{ (old("pays") == 102 ? "selected":"") }}>{{__('lang.Lithuania')}}</option>
                            <option  value="103"{{ (old("pays") == 103 ? "selected":"") }}>{{__('lang.Luxembourg')}}</option>
                            <option  value="104"{{ (old("pays") == 104 ? "selected":"") }}>{{__('lang.fruit salad')}}</option>
                            <option  value="105"{{ (old("pays") == 105 ? "selected":"") }}>{{__('lang.Madagascar')}}</option>
                            <option  value="106"{{ (old("pays") == 106 ? "selected":"") }}>{{__('lang.Malaysia')}}</option>
                            <option  value="107"{{ (old("pays") == 107 ? "selected":"") }}>{{__('lang.Malawi')}}</option>
                            <option  value="108"{{ (old("pays") == 108 ? "selected":"") }}>{{__('lang.Maldives')}}</option>
                            <option  value="109"{{ (old("pays") == 109 ? "selected":"") }}>{{__('lang.Mali')}}</option>
                            <option  value="110"{{ (old("pays") == 110 ? "selected":"") }}>{{__('lang.Malta')}}</option>
                            <option  value="111"{{ (old("pays") == 111 ? "selected":"") }}>{{__('lang.Morocco')}}</option>
                            <option  value="112"{{ (old("pays") == 112 ? "selected":"") }}>{{__('lang.Mauritius')}}</option>
                            <option  value="113" {{ (old("pays") == 113 ? "selected":"") }}>{{__('lang.Mauritania')}}</option>
                            <option  value="114" {{ (old("pays") == 114 ? "selected":"") }}>{{__('lang.Mexico')}}</option>
                            <option  value="115" {{ (old("pays") == 115 ? "selected":"") }}>{{__('lang.Micronesia')}}</option>
                            <option  value="116" {{ (old("pays") == 116 ? "selected":"") }}>{{__('lang.Moldova')}}</option>
                            <option  value="117" {{ (old("pays") == 117 ? "selected":"") }}>{{__('lang.Monaco')}}</option>
                            <option  value="118" {{ (old("pays") == 118 ? "selected":"") }}>{{__('lang.Mongolia')}}</option>
                            <option  value="119" {{ (old("pays") == 119 ? "selected":"") }}>{{__('lang.Montenegro')}}</option>
                            <option  value="120" {{ (old("pays") == 120 ? "selected":"") }}>{{__('lang.Mozambique')}}</option>
                            <option  value="121" {{ (old("pays") == 121 ? "selected":"") }}>{{__('lang.Namibia')}}</option>
                            <option  value="122" {{ (old("pays") == 122 ? "selected":"") }}>{{__('lang.Nauru')}}</option>
                            <option  value="123" {{ (old("pays") == 123 ? "selected":"") }}>{{__('lang.Nepal')}}</option>
                            <option  value="124" {{ (old("pays") == 124 ? "selected":"") }}>{{__('lang.Nicaragua')}}</option>
                            <option  value="125" {{ (old("pays") == 125 ? "selected":"") }}>{{__('lang.Niger')}}</option>
                            <option  value="126" {{ (old("pays") == 126 ? "selected":"") }}>{{__('lang.Nigeria')}}</option>
                            <option  value="127" {{ (old("pays") == 127 ? "selected":"") }}>{{__('lang.Niue')}}</option>
                            <option  value="128" {{ (old("pays") == 128 ? "selected":"") }}>{{__('lang.Norway')}}</option>
                            <option  value="129" {{ (old("pays") == 129 ? "selected":"") }}>{{__('lang.New Zealand')}}</option>
                            <option  value="130" {{ (old("pays") == 130 ? "selected":"") }}>{{__('lang.Oman')}}</option>
                            <option  value="131" {{ (old("pays") == 131 ? "selected":"") }}>{{__('lang.Uganda')}}</option>
                            <option  value="132" {{ (old("pays") == 132 ? "selected":"") }}>{{__('lang.Uzbekistan')}}</option>
                            <option  value="133" {{ (old("pays") == 133 ? "selected":"") }}>{{__('lang.Pakistan')}}</option>
                            <option  value="134" {{ (old("pays") == 134 ? "selected":"") }}>{{__('lang.Palau')}}</option>
                            <option  value="135" {{ (old("pays") == 135 ? "selected":"") }}>{{__('lang.Palestine')}}</option>
                            <option  value="136" {{ (old("pays") == 136 ? "selected":"") }}>{{__('lang.Panama')}}</option>
                            <option  value="137" {{ (old("pays") == 137 ? "selected":"") }}>{{__('lang.Papua New Guinea')}}</option>
                            <option  value="138" {{ (old("pays") == 138 ? "selected":"") }}>{{__('lang.Paraguay')}}</option>
                            <option  value="139" {{ (old("pays") == 139 ? "selected":"") }}>{{__('lang.Netherlands')}}</option>
                            <option  value="140" {{ (old("pays") == 140 ? "selected":"") }}>{{__('lang.Peru')}}</option>
                            <option  value="141" {{ (old("pays") == 141 ? "selected":"") }}>{{__('lang.Philippines')}}</option>
                            <option  value="142" {{ (old("pays") == 142 ? "selected":"") }}>{{__('lang.Poland')}}</option>
                            <option  value="143" {{ (old("pays") == 143 ? "selected":"") }}>{{__('lang.Portugal')}}</option>
                            <option  value="144" {{ (old("pays") == 144 ? "selected":"") }}>{{__('lang.Qatar')}}</option>
                            <option  value="145" {{ (old("pays") == 145 ? "selected":"") }}>{{__('lang.Central African Republic')}}</option>
                            <option  value="146" {{ (old("pays") == 146 ? "selected":"") }}>{{__('lang.Democratic Republic of Congo')}}</option>
                            <option  value="147" {{ (old("pays") == 147 ? "selected":"") }}>{{__('lang.Dominican Republic')}}</option>
                            <option  value="148" {{ (old("pays") == 148 ? "selected":"") }}>{{__('lang.Republic of Congo')}}</option>
                            <option  value="149" {{ (old("pays") == 149 ? "selected":"") }}>{{__('lang.Czech Republic')}}</option>
                            <option  value="150" {{ (old("pays") == 150 ? "selected":"") }}>{{__('lang.Romania')}}</option>
                            <option  value="151" {{ (old("pays") == 151 ? "selected":"") }}>{{__('lang.United Kingdom')}}</option>
                            <option  value="152" {{ (old("pays") == 152 ? "selected":"") }}>{{__('lang.Russia')}}</option>
                            <option  value="153" {{ (old("pays") == 153 ? "selected":"") }}>{{__('lang.Rwanda')}}</option>
                            <option  value="154" {{ (old("pays") == 154 ? "selected":"") }}>{{__('lang.Saint Kitts and Nevis')}}</option>
                            <option  value="155" {{ (old("pays") == 155 ? "selected":"") }}>{{__('lang.Saint Vincent and the Grenadines')}}</option>
                            <option  value="156" {{ (old("pays") == 156 ? "selected":"") }}>{{__('lang.St. LUCIA')}}</option>
                            <option  value="157" {{ (old("pays") == 157 ? "selected":"") }}>{{__('lang.San Marino')}}</option>
                            <option  value="158" {{ (old("pays") == 158 ? "selected":"") }}>{{__('lang.Solomon')}}</option>
                            <option  value="159" {{ (old("pays") == 159 ? "selected":"") }}>{{__('lang.Salvador')}}</option>
                            <option  value="160" {{ (old("pays") == 160 ? "selected":"") }}>{{__('lang.Samoa')}}</option>
                            <option  value="161" {{ (old("pays") == 161 ? "selected":"") }}>{{__('lang.Sao Tome and Principe')}}</option>
                            <option  value="162" {{ (old("pays") == 162 ? "selected":"") }}>{{__('lang.Senegal')}}</option>
                            <option  value="163" {{ (old("pays") == 163 ? "selected":"") }}>{{__('lang.Serbia')}}</option>
                            <option  value="164" {{ (old("pays") == 164 ? "selected":"") }}>{{__('lang.Seychelles')}}</option>
                            <option  value="165" {{ (old("pays") == 165 ? "selected":"") }}>{{__('lang.Sierra Leone')}}</option>
                            <option  value="166" {{ (old("pays") == 166 ? "selected":"") }}>{{__('lang.Singapore')}}</option>
                            <option  value="167" {{ (old("pays") == 167 ? "selected":"") }}>{{__('lang.Slovakia')}}</option>
                            <option  value="168" {{ (old("pays") == 168 ? "selected":"") }}>{{__('lang.Slovenia')}}</option>
                            <option  value="169" {{ (old("pays") == 169 ? "selected":"") }}>{{__('lang.Somalia')}}</option>
                            <option  value="170" {{ (old("pays") == 170 ? "selected":"") }}>{{__('lang.Sudan')}}</option>
                            <option  value="171" {{ (old("pays") == 171 ? "selected":"") }}>{{__('lang.South sudan')}}</option>
                            <option  value="172" {{ (old("pays") == 172 ? "selected":"") }}>{{__('lang.Sri Lanka')}}</option>
                            <option  value="173" {{ (old("pays") == 173 ? "selected":"") }}>{{__('lang.Sweden')}}</option>
                            <option  value="174" {{ (old("pays") == 174 ? "selected":"") }}>{{__('lang.Swiss')}}</option>
                            <option  value="175" {{ (old("pays") == 175 ? "selected":"") }}>{{__('lang.Suriname')}}</option>
                            <option  value="176" {{ (old("pays") == 176 ? "selected":"") }}>{{__('lang.Syria')}}</option>
                            <option  value="177" {{ (old("pays") == 177 ? "selected":"") }}>{{__('lang.Tajikistan')}}</option>
                            <option  value="178" {{ (old("pays") == 178 ? "selected":"") }}>{{__('lang.Tanzania')}}</option>
                            <option  value="179" {{ (old("pays") == 179 ? "selected":"") }}>{{__('lang.Chad')}}</option>
                            <option  value="180" {{ (old("pays") == 180 ? "selected":"") }}>{{__('lang.Thailand')}}</option>
                            <option  value="181"  {{ (old("pays") == 181 ? "selected":"") }}>{{__('lang.East Timor')}}</option>
                            <option  value="182"  {{ (old("pays") == 182 ? "selected":"") }}>{{__('lang.Togo')}}</option>
                            <option  value="183" {{ (old("pays") == 183 ? "selected":"") }}>{{__('lang.Tonga')}}</option>
                            <option  value="184" {{ (old("pays") == 184 ? "selected":"") }}>{{__('lang.Trinidad and Tobago')}}</option>
                            <option  value="185" {{ (old("pays") == 185 ? "selected":"") }}>{{__('lang.Tunisia')}}</option>
                            <option  value="186" {{ (old("pays") == 186 ? "selected":"") }}>{{__('lang.Turkmenistan')}}</option>
                            <option  value="187" {{ (old("pays") == 187 ? "selected":"") }}>{{__('lang.Turkey')}}</option>
                            <option  value="188" {{ (old("pays") == 188 ? "selected":"") }}>{{__('lang.Tuvalu')}}</option>
                            <option  value="189" {{ (old("pays") == 189 ? "selected":"") }}>{{__('lang.Ukraine')}}</option>
                            <option  value="190" {{ (old("pays") == 190 ? "selected":"") }}>{{__('lang.Uruguay')}}</option>
                            <option  value="191" {{ (old("pays") == 191 ? "selected":"") }}>{{__('lang.Vanuatu')}}</option>
                            <option  value="192" {{ (old("pays") == 192 ? "selected":"") }}>{{__('lang.Vatican')}}</option>
                            <option  value="193" {{ (old("pays") == 193 ? "selected":"") }}>{{__('lang.Venezuela')}}</option>
                            <option  value="194" {{ (old("pays") == 194 ? "selected":"") }}>{{__('lang.Vietnam')}}</option>
                            <option  value="195" {{ (old("pays") == 195 ? "selected":"") }}>{{__('lang.Yemen')}}</option>
                            <option  value="196" {{ (old("pays") == 196 ? "selected":"") }}>{{__('lang.Zambia')}}</option>
                            <option  value="197" {{ (old("pays") == 197 ? "selected":"") }}>{{__('lang.Zimbabwe')}}</option>
                        </select>
                        @if ($errors->has('pays'))
                        <div class="alert alert-danger">{{$errors->first('pays')}}
                        </div>
                        @endif 
                    </div>

                    <div class="form-group alert ">
                        <label for="exampleFormControlInput1" class="form-label"><strong>{{__('lang.org')}} <span class="star">*</span> </strong></label>
                        <input type="text" name="organisation" onkeyup='this.value=this.value.toUpperCase()' class="form-control" placeholder="{{__('lang.organisation')}}" value="{{ old('organisation') }}">
                         @if ($errors->has('organisation'))
                        <div class="alert alert-danger">{{$errors->first('organisation')}}</div>
                        @endif 
                    </div>

                    <div class="form-group alert ">
                        <label for="exampleFormControlInput1" class="form-label"><strong>{{__('lang.job')}}:</strong></label>
                        <input type="text" name="fonction" class="form-control" id="input_poste" placeholder="{{__('lang.job')}}" value="{{ old('fonction')}}" value="{{ old('fonction') }} >
                         @if ($errors->has('poste'))
                        <div class="alert alert-danger">{{$errors->first('poste')}}</div>
                        @endif 
                    </div>

                    <div class="form-group alert ">
                        <label for="exampleFormControlInput1" class="form-label"><strong>{{__('lang.T_org')}}:</strong></label>
                        <select name="typ_org" onclick="javascript:hide3()" class="form-control" value="{{ old('typ_org')}}" >
                            <option value="">{{__('lang.choix')}}</option>
                            <option value="1" {{ (old("typ_org") ==1 ? "selected":"") }}>{{__('lang.wsc')}}</option>
                            <option value="2" {{ (old("typ_org") ==2 ? "selected":"") }}>{{__('lang.Industry')}}</option>
                            <option value="3" {{ (old("typ_org") ==3? "selected":"") }}>{{__('lang.NGO')}}</option>
                            <option value="4" {{ (old("typ_org") ==4? "selected":"") }}>{{__('lang.fp')}}</option>
                            <option value="5" {{ (old("typ_org") ==5? "selected":"") }}>{{__('lang.ss')}}</option>
                            <option value="6" {{ (old("typ_org") ==6? "selected":"") }}>{{__('lang.AI')}}</option>
                            <option value="7" {{ (old("typ_org") ==7? "selected":"") }}>{{__('lang.Media')}}</option>
                            <option id="autre" value="8">{{__('lang.Autre')}}</option>
                        </select>
                            @if ($errors->has('type_org'))
                            <div class="alert alert-danger">{{$errors->first('type_org')}}</div>
                            @endif 
                    </div>

                    <div class="form-group alert " id="type_org" style="display: none;">
                        <label for="exampleFormControlInput1" class="form-label"><strong>{{__('lang.type_org')}}</strong></label>
                        <input type="text" name="autre_typ_org" class="form-control" id="input_poste" placeholder="{{__('lang.type_org')}}" value="{{ old('autre_typ_org')}}" >
                          @if ($errors->has('autre_type_org'))
                        <div class="alert alert-danger">{{$errors->first('autre_type_org')}}</div>
                        @endif 
                    </div>

                    <div class="form-group alert ">
                        <label for="exampleFormControlInput1" class="form-label"><strong>{{__('lang.member')}} ? <span class="star">*</span></strong>
                        </label> 
                        <div class="form-check form-check">
                              <input type="radio" onclick="javascript:hide1();" name="membre_aae" value="oui" class="form-check-input" id="oui_m" {{ (is_array(old('membre_aae')) && in_array('oui', old('membre_aae'))) ? ' checked' : '' }} >
                              <label class="form-check-label" for="oui_m"> {{__('lang.y_member')}}</label>
                        </div>
                        <div class="form-check form-check">
                                <input type="radio" onclick="javascript:hide1();" name="membre_aae" value="non" class="form-check-input" id="non_m" {{ (is_array(old('membre_aae')) && in_array('non', old('membre_aae'))) ? ' checked' : '' }} >
                                <label class="form-check-label" for="non_m"> {{__('lang.n_member')}}</label>
                        </div>
                        @if ($errors->has('membre'))
                        <div class="alert alert-danger">{{$errors->first('membre')}}
                        </div>
                        @endif 
                    </div>

                    <div class="form-group alert" id="type_m" style="display:none;">
                        <label for="exampleFormControlInput1" class="form-label"><strong>{{__('lang.t_member')}}?</strong></label>
                        <select name="type_m" class="form-control" value="{{ old('type_m')}}" >
                          <option>{{__('lang.choix')}}...</option>
                          <option value="1" {{ (old("type_m") == 1 ? "selected":"") }}>{{__('lang.aff_member')}}</option>
                          <option value="2"{{ (old("type_m") == 2 ? "selected":"") }}>{{__('lang.a_member')}}</option>
                          <option value="3"{{ (old("type_m") == 3 ? "selected":"") }}>{{__('lang.ind_member')}}</option>
                          <option value="5"{{ (old("type_m") == 5 ? "selected":"") }}>{{__('lang.h_member')}}</option>
                        </select>
                        @if ($errors->has('type_membre'))
                        <div class="alert alert-danger">{{$errors->first('type_membre')}}</div>
                        @endif 
                    </div>
                  
                    <div class="form-group alert ">
                        <label for="exampleFormControlInput1" class="form-label"><strong>{{__('lang.session_group')}} ?</strong></label>
                        <div class="form-check form-check alert alert-info">
                            <input type="radio" name="cs" value="1" class="form-check-input" id="cs1" {{ (is_array(old('cs')) && in_array(1, old('cs'))) ? ' checked' : '' }} >
                            <label class="form-check-label" for="cs1"><strong>{{__('lang.cs1')}}</strong></label>
                        </div>
                        <div class="form-check form-check alert alert-info">
                            <input type="radio" name="cs" value="2" class="form-check-input" id="cs2" {{ (is_array(old('cs')) && in_array(2, old('cs'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="cs2"><strong>{{__('lang.cs2')}}</strong></label>
                        </div>
                        <div class="form-check form-check alert alert-info">
                            <input type="radio" name="cs" value="3" class="form-check-input" id="cs3" {{ (is_array(old('cs')) && in_array(3, old('cs'))) ? ' checked' : '' }} >
                            <label class="form-check-label" for="cs3"><strong>{{__('lang.cs3')}}</strong></label>
                        </div>
                        @if ($errors->has('cs'))
                        <div class="alert alert-danger">{{$errors->first('cs')}}</div>
                        @endif 
                    </div>

                    <div class="form-group alert ">
                      <label for="exampleFormControlInput1" class="form-label"><strong>{{__('lang.sondage')}} ? <span class="star">*</span></strong></label>

                        <div class="form-check form-check">
                            <input type="radio" onclick="javascript:hide();" name="sondage" value="oui" class="form-check-input" id="oui_p" {{ (is_array(old('sondage')) && in_array('oui', old('sondage'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="oui_p" >  {{__('lang.yes')}}</label>
                        </div>
                        <div class="form-check form-check">
                            <input type="radio" onclick="javascript:hide();" name="sondage" value="non" class="form-check-input" id="non_p" {{ (is_array(old('sondage')) && in_array('non', old('sondage'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="non_p">  {{__('lang.no')}}</label>
                        </div>
                         @if ($errors->has('sondage'))
                        <div class="alert alert-danger">{{$errors->first('sondage')}}</div>
                        @endif 
                    </div>

                    <div class="form-check alert " id="raison_p" style="display:none;">
                        <label for="exampleFormControlInput1" class="form-label">
                            <strong>{{__('lang.n_participate')}}:</strong>
                        </label>
                        <div class="form-check ">
                            <input type="radio" onclick="hide5();" name="raison_sondage" value="Je n'ai même pas eu connaissance d'un tel sondage" class="form-check-input" id="r1>
                            <label class="form-check-label" for="r1"> {{__('lang.pool_such')}}</label>
                        </div>
                        <div class="form-check ">
                            <input type="radio" onclick="hide5();" name="raison_sondage" value="Le premier responsable de l’Organisation n’a pas donné son accord" class="form-check-input" id="r2">
                            <label class="form-check-label" for="r2">  {{__('lang.f_official')}}</label>
                        </div>

                        <div class="form-check ">
                            <input type="radio" onclick="hide5()"; name="raison_sondage" value="L’AAE n’a pas fourni suffisamment d’informations pour inciter à y répondre" class="form-check-input" id="r3">
                            <label class="form-check-label" for="r3">  {{__('lang.prompt_r')}}</label>
                        </div>

                        <div class="form-check">
                            <input type="radio" onclick="hide5();" name="raison_sondage" value="autre" class="form-check-input" id="autre_raison">
                            <label class="form-check-label" for="autre_raison"> {{__('lang.other')}}</label>
                        </div>

                        <div class="form-group"  id="raison" style="display:none;">
                            <label><strong>{{__('lang.reason')}} :</strong></label>
                            <textarea class="form-control" onkeypress="hide6()"  name="autre_raison_s" >{{ old('autre_raison_s') }}</textarea>
                            
                                @if ($errors->has('raison'))
                            <div class="alert alert-danger">{{$errors->first('raison')}}
                            </div>
                                @endif 
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                  <br><br>
                  <button class="btn btn-success btn-lg" type="submit" style="padding:10px 100px 10px 100px;border:#fff solid;"><i class="fa fa-check"></i> {{__('lang.reg')}}
                  </button>
                </div>
            </div>
        </form>
    </div>
    
    <section class="container-fluid bg-light text-dark" style="margin-top:200px">
        <footer style="padding-bottom: 20px">
            <div class="row">
                <div class="col-md-12">
                    <hr style="width:100%">
                </div>
            </div>
            <div class="row text-center text-sm">
                <span>ASSOCIATION AFRICAINE DE L'EAU - Côte d'Ivoire - Abidjan - Cocody Riviera Palmeraie, rond point place de la renaissance, immeuble SODECI 2e étage </span>
                <span>Tél. : <a href="tel:+2252722499611">(+225) 27 22 49 96 11 </a> /<a href="+225272499613"> 27 22 49 96 13 </a>- Email : <a href="mailto:contact@afwa-hq.org" target="_blank">contact@afwa-hq.org </a> - Website : <a href="https://www.afwa-hq.org/index.php"> www.afwa-hq.org </a> - 25 BP 1174 Abidjan 25 Côte d'Ivoire</span>
                <span>Copyright © {{ date('Y') }} / AAE. Tous droits réservés</span>
            </div>      
        </footer>
    </section>

      @if (Session()->has('msg'))
         <script type="text/javascript">
             swal("Good job!", "You clicked the button!", "success");
         </script>            
    @endif
<!-------------===============================================================
                Menu des langues
   =================================================================--------------->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js">
        </script>

         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        <script type="text/javascript" src="style/style.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
        <script type="text/javascript">
          var url = "{{ route('LangChange') }}";
          $(".Langchange").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    }); 


//Lancement du modal apres 1 seconde

  /*        $(window).on('load', function(){
            setTimeout(function(){

            $('#modal').modal('show')
            },1000);
          });
          */
        </script>
    
    </body>
</html>
