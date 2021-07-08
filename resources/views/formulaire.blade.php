<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AAE</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link href="style/style.css" rel="stylesheet">

    </head>
    <body style="background: linear-gradient(176deg, rgba(2,0,36,1) 5%, rgba(9,9,121,1) 16%, rgba(255,255,255,1) 100%) fixed;">
        <div class="container" style="padding-top:50px">
            <div class="row" style="background: linear-gradient(90deg, rgba(51,50,144,1) 0%, rgba(221,221,221,1) 49%, rgba(25,135,84,1) 100%);" >
                <div class="col-2">
                    <img src="image/afwa-logo.jfif" style="width:90px;height: auto; padding: 10px 10px 10px 10px">
                </div>
                <div class="col-10">
                    <h1 class="text-white">
                       <b>{{__('lang.title') }}</b>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 alert alert-success">
                    <strong>THEME :</strong> 
                    <b class="text-danger">{{__('lang.theme')}}</b>
                </div>
            </div>
          <form action="{{Route('submit.form')}}" method="POST" name="formulaire" id="formulaire" onsubmit="">
                    @csrf 
            <div class="row">
                <div class="col-md-8 offset-md-2 bg-white" >
                  <div class="alert text-center">
                    <strong><p>{{__('lang.require1')}}(<span class="star">*</span>) {{__('lang.require2')}}</p></strong>
                  </div>
                  <div class="form-group alert ">
                    <label for="exampleFormControlInput1" class="form-label"><strong>{{__('lang.lname')}}: <span class="star">*</span></strong></label>
                    <input type="text" name="nom" class="form-control " id="input_nom" placeholder="{{__('lang.lname')}}" >
                    @if ($errors->has('nom'))
                    <div class="alert alert-danger">{{$errors->first('nom')}}</div>
                    @endif
                  </div>
                  <div class="form-group alert ">
                    <label for="exampleFormControlInput1" class="form-label"><strong>{{__('lang.fname')}}: <span class="star">*</span></strong></label>
                    <input type="text" name="prenoms" class="form-control " id="input_prenoms" placeholder=" {{__('lang.fname')}}" >
                    @if ($errors->has('prenoms'))
                    <div class="alert alert-danger">{{$errors->first('prenoms')}}</div>
                    @endif
                  </div>

                  <div class="form-group alert ">
                    <label for="exampleFormControlInput1" class="form-label"><strong>E-mail: <span class="star">*</span></strong></label>
                    <input type="text" name="email" class="form-control" id="input_email" placeholder="Email" >
                    @if ($errors->has('email'))
                    <div class="alert alert-danger">{{$errors->first('email')}}</div>
                    @endif
                  </div>

                  <div class="form-group alert ">
                    <label for="exampleFormControlInput1" class="form-label"><strong>{{__('lang.sexe')}}: <span class="star">*</span> </strong></label><br>

                    <div class="form-check form-check-inline">
                      <input type="radio" name="genre" value="1" class="form-check-input" id="g1" ><label class="form-check-label" for="g1">{{__('lang.Homme')}}</label>        
                    </div>
                    <div class="form-check form-check-inline">
                      <input type="radio" name="genre" value="2" class="form-check-input" id="g2" ><label class="form-check-label" for="g2">{{__('lang.Femme')}}</label>        
                    </div>


                     @if ($errors->has('genre'))
                    <div class="alert alert-danger">{{$errors->first('genre')}}</div>
                    @endif 
                  </div>

                  <div class="form-group alert">
                    <label for="exampleFormControlInput1" class="form-label"><strong>{{__('lang.country')}}: <span class="star">*</span> </strong></label>
                    <select name="pays" class="form-control" >
                      <option>{{__('lang.choix')}} ...</option>
                      <option  value=>{{__('lang.South Africa')}}</option                       >
<option  value="1">{{__('lang.Afghanistan')}}</option>
<option  value="2">{{__('lang.Albania')}}</option>
<option  value="3">{{__('lang.Algeria')}}</option>
<option  value="4">{{__('lang.Germany')}}</option>
<option  value="5">{{__('lang.Andorra')}}</option>
<option  value="6">{{__('lang.Angola')}}</option>
<option  value="7">{{__('lang.Antigua and Barbuda')}}</option>
<option  value="8">{{__('lang.Saudi Arabia')}}</option>
<option  value="9">{{__('lang.Argentina')}}</option>                        
<option  value="10">{{__('lang.Armenia')}}</option>                       
<option  value="11">{{__('lang.Australia')}}</option>                       
<option  value="12">{{__('lang.Austria')}}</option>                       
<option  value="13">{{__('lang.Azerbaijan')}}</option>                        
<option  value="14">{{__('lang.Bahamas')}}</option>                       
<option  value="15">{{__('lang.Bahrain')}}</option>                       
<option  value="16">{{__('lang.Bangladesh')}}</option>                        
<option  value="17">{{__('lang.Barbados')}}</option>                        
<option  value="18">{{__('lang.Belgium')}}</option>                       
<option  value="19">{{__('lang.Belize')}}</option>                        
<option  value="20">{{__('lang.Benign')}}</option>                        
<option  value="21">{{__('lang.Bhutan')}}</option>                        
<option  value="22">{{__('lang.Belarus')}}</option>                       
<option  value="23">{{__('lang.Burma')}}</option>                       
<option  value="24">{{__('lang.Bolivia')}}</option>                       
<option  value="25">{{__('lang.Bosnia and herzegovina')}}</option>                        
<option  value="26">{{__('lang.Botswana')}}</option>                        
<option  value="27">{{__('lang.Brazil')}}</option>                        
<option  value="28">{{__('lang.Brunei')}}</option>                        
<option  value="29">{{__('lang.Bulgaria')}}</option>                        
<option  value="30">{{__('lang.Burkina Faso')}}</option>                        
<option  value="31">{{__('lang.Burundi')}}</option>                       
<option  value="32">{{__('lang.Cambodia')}}</option>                        
<option  value="33">{{__('lang.Cameroon')}}</option>                        
<option  value="34">{{__('lang.Canada')}}</option>                        
<option  value="35">{{__('lang.Green cap')}}</option>                       
<option  value="36">{{__('lang.Chile')}}</option>                       
<option  value="37">{{__('lang.China')}}</option>                       
<option  value="38">{{__('lang.Cyprus')}}</option>                        
<option  value="39">{{__('lang.Colombia')}}</option>                        
<option  value="40">{{__('lang.Comoros')}}</option>                       
<option  value="41">{{__('lang.North Korea')}}</option>                       
<option  value="42">{{__('lang.South Korea')}}</option>                       
<option  value="43">{{__('lang.Costa Rica')}}</option>                        
<option  value="44">{{__('lang.Ivory Coast')}}</option>                       
<option  value="45">{{__('lang.Croatia')}}</option>                       
<option  value="46">{{__('lang.Cuba')}}</option>                        
<option  value="47">{{__('lang.Denmark')}}</option>                       
<option  value="48">{{__('lang.Djibouti')}}</option>                        
<option  value="49">{{__('lang.Dominica')}}</option>                        
<option  value="50">{{__('lang.Egypt')}}</option>                       
<option  value="51">{{__('lang.United Arab Emirates')}}</option>                        
<option  value="52">{{__('lang.Ecuador')}}</option>                       
<option  value="53">{{__('lang.Eritrea')}}</option>                       
<option  value="54">{{__('lang.Spain')}}</option>                       
<option  value="55">{{__('lang.Eswatini')}}</option>                        
<option  value="56">{{__('lang.Estonia')}}</option>                       
<option  value="57">{{__('lang.United States')}}</option>                       
<option  value="58">{{__('lang.Ethiopia')}}</option>                        
<option  value="59">{{__('lang.Fiji')}}</option>                        
<option  value="60">{{__('lang.Finland')}}</option>                       
<option  value="61">{{__('lang.France')}}</option>                        
<option  value="62">{{__('lang.Gabon')}}</option>                       
<option  value="63">{{__('lang.Gambia')}}</option>                        
<option  value="64">{{__('lang.Georgia')}}</option>                       
<option  value="65">{{__('lang.Ghana')}}</option>                       
<option  value="66">{{__('lang.Greece')}}</option>                        
<option  value="67">{{__('lang.Grenade')}}</option>                       
<option  value="68">{{__('lang.Guatemala')}}</option>                       
<option  value="69">{{__('lang.Guinea')}}</option>                        
<option  value="70">{{__('lang.Equatorial Guinea')}}</option>                       
<option  value="71">{{__('lang.Guinea-Bissau')}}</option>                       
<option  value="72">{{__('lang.Guyana')}}</option>                        
<option  value="73">{{__('lang.Haiti')}}</option>                       
<option  value="74">{{__('lang.Honduras')}}</option>                        
<option  value="75">{{__('lang.Hungary')}}</option>                       
<option  value="76">{{__('lang.Cook Islands')}}</option>                        
<option  value="77">{{__('lang.Marshall Islands')}}</option>                        
<option  value="78">{{__('lang.India')}}</option>                       
<option  value="79">{{__('lang.Indonesia')}}</option>                       
<option  value="80">{{__('lang.Iraq')}}</option>                        
<option  value="81">{{__('lang.Iran')}}</option>                        
<option  value="82">{{__('lang.Ireland')}}</option>                       
<option  value="83">{{__('lang.Iceland')}}</option>                       
<option  value="84">{{__('lang.Israel')}}</option>                        
<option  value="85">{{__('lang.Italy')}}</option>                       
<option  value="86">{{__('lang.Jamaica')}}</option>                       
<option  value="87">{{__('lang.Japan')}}</option>                       
<option  value="88">{{__('lang.Jordan')}}</option>                        
<option  value="89">{{__('lang.Kazakhstan')}}</option>                        
<option  value="90">{{__('lang.Kenya')}}</option>                       
<option  value="91">{{__('lang.Kyrgyzstan')}}</option>                        
<option  value="92">{{__('lang.Kiribati')}}</option>                        
<option  value="93">{{__('lang.Kuwait')}}</option>                        
<option  value="94">{{__('lang.Laos')}}</option>                        
<option  value="95">{{__('lang.Lesotho')}}</option>                       
<option  value="96">{{__('lang.Latvia')}}</option>                        
<option  value="97">{{__('lang.Lebanon')}}</option>                       
<option  value="98">{{__('lang.Liberia')}}</option>                       
<option  value="99">{{__('lang.Libya')}}</option>
                        <option  value="100">{{__('lang.Liechtenstein')}}</option>
                        <option  value="101">{{__('lang.Lithuania')}}</option>
                        <option  value="102">{{__('lang.Luxembourg')}}</option>
                        <option  value="103">{{__('lang.fruit salad')}}</option>
                        <option  value="104">{{__('lang.Madagascar')}}</option>
                        <option  value="105">{{__('lang.Malaysia')}}</option>
                        <option  value="106">{{__('lang.Malawi')}}</option>
                        <option  value="107">{{__('lang.Maldives')}}</option>
                        <option  value="108">{{__('lang.Mali')}}</option>
                        <option  value="109">{{__('lang.Malta')}}</option>
                        <option  value="110">{{__('lang.Morocco')}}</option>
                        <option  value="111">{{__('lang.Mauritius')}}</option>
                        <option  value="112">{{__('lang.Mauritania')}}</option>
                        <option  value="113">{{__('lang.Mexico')}}</option>
                        <option  value="114">{{__('lang.Micronesia')}}</option>
                        <option  value="115">{{__('lang.Moldova')}}</option>
                        <option  value="116">{{__('lang.Monaco')}}</option>
                        <option  value="117">{{__('lang.Mongolia')}}</option>
                        <option  value="118">{{__('lang.Montenegro')}}</option>
                        <option  value="119">{{__('lang.Mozambique')}}</option>
                        <option  value="120">{{__('lang.Namibia')}}</option>
                        <option  value="121">{{__('lang.Nauru')}}</option>
                        <option  value="122">{{__('lang.Nepal')}}</option>
                        <option  value="123">{{__('lang.Nicaragua')}}</option>
                        <option  value="124">{{__('lang.Niger')}}</option>
                        <option  value="125">{{__('lang.Nigeria')}}</option>
                        <option  value="126">{{__('lang.Niue')}}</option>
                        <option  value="127">{{__('lang.Norway')}}</option>
                        <option  value="128">{{__('lang.New Zealand')}}</option>
                        <option  value="129">{{__('lang.Oman')}}</option>
                        <option  value="130">{{__('lang.Uganda')}}</option>
                        <option  value="131">{{__('lang.Uzbekistan')}}</option>
                        <option  value="132">{{__('lang.Pakistan')}}</option>
                        <option  value="133">{{__('lang.Palau')}}</option>
                        <option  value="134">{{__('lang.Palestine')}}</option>
                        <option  value="135">{{__('lang.Panama')}}</option>
                        <option  value="136">{{__('lang.Papua New Guinea')}}</option>
                        <option  value="137">{{__('lang.Paraguay')}}</option>
                        <option  value="138">{{__('lang.Netherlands')}}</option>
                        <option  value="139">{{__('lang.Peru')}}</option>
                        <option  value="140">{{__('lang.Philippines')}}</option>
                        <option  value="141">{{__('lang.Poland')}}</option>
                        <option  value="142">{{__('lang.Portugal')}}</option>
                        <option  value="143">{{__('lang.Qatar')}}</option>
                        <option  value="144">{{__('lang.Central African Republic')}}</option>
                        <option  value="145">{{__('lang.Democratic Republic of Congo')}}</option>
                        <option  value="146">{{__('lang.Dominican Republic')}}</option>
                        <option  value="147">{{__('lang.Republic of Congo')}}</option>
                        <option  value="148">{{__('lang.Czech Republic')}}</option>
                        <option  value="149">{{__('lang.Romania')}}</option>
                        <option  value="150">{{__('lang.United Kingdom')}}</option>
                        <option  value="151">{{__('lang.Russia')}}</option>
                        <option  value="152">{{__('lang.Rwanda')}}</option>
                        <option  value="153">{{__('lang.Saint Kitts and Nevis')}}</option>
                        <option  value="154">{{__('lang.Saint Vincent and the Grenadines')}}</option>
                        <option  value="155">{{__('lang.St. LUCIA')}}</option>
                        <option  value="156">{{__('lang.San Marino')}}</option>
                        <option  value="157">{{__('lang.Solomon')}}</option>
                        <option  value="158">{{__('lang.Salvador')}}</option>
                        <option  value="159">{{__('lang.Samoa')}}</option>
                        <option  value="160">{{__('lang.Sao Tome and Principe')}}</option>
                        <option  value="161">{{__('lang.Senegal')}}</option>
                        <option  value="162">{{__('lang.Serbia')}}</option>
                        <option  value="163">{{__('lang.Seychelles')}}</option>
                        <option  value="164">{{__('lang.Sierra Leone')}}</option>
                        <option  value="165">{{__('lang.Singapore')}}</option>
                        <option  value="166">{{__('lang.Slovakia')}}</option>
                        <option  value="167">{{__('lang.Slovenia')}}</option>
                        <option  value="168">{{__('lang.Somalia')}}</option>
                        <option  value="169">{{__('lang.Sudan')}}</option>
                        <option  value="170">{{__('lang.South sudan')}}</option>
                        <option  value="171">{{__('lang.Sri Lanka')}}</option>
                        <option  value="172">{{__('lang.Sweden')}}</option>
                        <option  value="173">{{__('lang.Swiss')}}</option>
                        <option  value="174">{{__('lang.Suriname')}}</option>
                        <option  value="175">{{__('lang.Syria')}}</option>
                        <option  value="176">{{__('lang.Tajikistan')}}</option>
                        <option  value="177">{{__('lang.Tanzania')}}</option>
                        <option  value="178">{{__('lang.Chad')}}</option>
                        <option  value="179">{{__('lang.Thailand')}}</option>
                        <option  value="180">{{__('lang.East Timor')}}</option>
                        <option  value="181">{{__('lang.Togo')}}</option>
                        <option  value="182">{{__('lang.Tonga')}}</option>
                        <option  value="183">{{__('lang.Trinidad and Tobago')}}</option>
                        <option  value="184">{{__('lang.Tunisia')}}</option>
                        <option  value="185">{{__('lang.Turkmenistan')}}</option>
                        <option  value="186">{{__('lang.Turkey')}}</option>
                        <option  value="187">{{__('lang.Tuvalu')}}</option>
                        <option  value="188">{{__('lang.Ukraine')}}</option>
                        <option  value="189">{{__('lang.Uruguay')}}</option>
                        <option  value="190">{{__('lang.Vanuatu')}}</option>
                        <option  value="191">{{__('lang.Vatican')}}</option>
                        <option  value="192">{{__('lang.Venezuela')}}</option>
                        <option  value="193">{{__('lang.Vietnam')}}</option>
                        <option  value="194">{{__('lang.Yemen')}}</option>
                        <option  value="195">{{__('lang.Zambia')}}</option>
                        <option  value="196">{{__('lang.Zimbabwe')}}</option>
                    </select>
                     @if ($errors->has('pays'))
                    <div class="alert alert-danger">{{$errors->first('pays')}}</div>
                    @endif 
                  </div>

                  <div class="form-group alert ">
                    <label for="exampleFormControlInput1" class="form-label"><strong>{{__('lang.org')}} <span class="star">*</span> </strong></label>
                    <input type="text" name="organisation" onkeyup='this.value=this.value.toUpperCase()' class="form-control" placeholder="{{__('lang.organisation')}}" >
                     @if ($errors->has('organisation'))
                    <div class="alert alert-danger">{{$errors->first('organisation')}}</div>
                    @endif 
                  </div>

                  <div class="form-group alert ">
                    <label for="exampleFormControlInput1" class="form-label"><strong>{{__('lang.job')}}:</strong></label>
                    <input type="text" name="fonction" class="form-control" id="input_poste" placeholder="{{__('lang.job')}}" >
                     @if ($errors->has('poste'))
                    <div class="alert alert-danger">{{$errors->first('poste')}}</div>
                    @endif 
                  </div>

                  <div class="form-group alert ">
                    <label for="exampleFormControlInput1" class="form-label"><strong>{{__('lang.T_org')}}:</strong></label>
                    <select name="typ_org" onclick="javascript:hide3()" class="form-control" >
                                             <option value="197">{{__('lang.choix')}}</option>
                      <option value="1">{{__('lang.Industry')}}</option>
                      <option value="2">{{__('lang.NGO')}}</option>
                      <option value="3">{{__('lang.fp')}}</option>
                      <option value="4">{{__('lang.ss')}}</option>
                      <option value="5">{{__('lang.AI')}}</option>
                      <option value="6">{{__('lang.Media')}}</option>
                      <option id="autre" value="autre">{{__('lang.Autre')}}</option>
                    </select>
                     @if ($errors->has('type_org'))
                    <div class="alert alert-danger">{{$errors->first('type_org')}}</div>
                    @endif 
                  </div>

                  <div class="form-group alert " id="type_org" style="display: none;">
                    <label for="exampleFormControlInput1" class="form-label"><strong>{{__('lang.type_org')}}</strong></label>
                    <input type="text" name="autre_typ_org" class="form-control" id="input_poste" placeholder="{{__('lang.type_org')}}" >
                      @if ($errors->has('autre_type_org'))
                    <div class="alert alert-danger">{{$errors->first('autre_type_org')}}</div>
                    @endif 
                  </div>

                  <div class="form-group alert ">
                      <label for="exampleFormControlInput1" class="form-label"><strong>{{__('lang.member')}} ? <span class="star">*</span></strong></label> 
                      <div class="form-check form-check">
                          <input type="radio" onclick="javascript:hide1();" name="membre_aae" value="oui" class="form-check-input" id="oui_m" ><label class="form-check-label" for="oui_m"> {{__('lang.y_member')}}</label>                      
                      </div>
                      <div class="form-check form-check">
                          <input type="radio" onclick="javascript:hide1();" name="membre_aae" value="non" class="form-check-input" id="non_m" ><label class="form-check-label" for="non_m"> {{__('lang.n_member')}}</label>                      
                      </div>
                      @if ($errors->has('membre'))
                    <div class="alert alert-danger">{{$errors->first('membre')}}</div>
                    @endif 
                  </div>

                  <div class="form-group alert" id="type_m" style="display:none;">
                    <label for="exampleFormControlInput1" class="form-label"><strong>{{__('lang.t_member')}}?</strong></label>
                    <select name="type_m" class="form-control" >
                      <option>{{__('lang.choix')}}...</option>
                      <option value="1">{{__('lang.aff_member')}}</option>
                      <option value="2">{{__('lang.a_member')}}</option>
                      <option value="3">{{__('lang.ind_member')}}</option>
                    </select>
                    @if ($errors->has('type_membre'))
                    <div class="alert alert-danger">{{$errors->first('type_membre')}}</div>
                    @endif 
                  </div>
                  
                  <div class="form-group alert ">
                    <label for="exampleFormControlInput1" class="form-label"><strong>{{__('lang.session_group')}} ?</strong></label>
                    <div class="form-check form-check alert alert-success">
                        <input type="radio" name="cs" value="4" class="form-check-input" id="cs1" ><label class="form-check-label" for="cs1"><strong>{{__('lang.cs1')}}</strong></label>
                    </div>
                    <div class="form-check form-check alert alert-success">
                        <input type="radio" name="cs" value="5" class="form-check-input" id="cs2" ><label class="form-check-label" for="cs2"><strong>{{__('lang.cs2')}}</strong></label>
                    </div>
                    <div class="form-check form-check alert alert-success">
                        <input type="radio" name="cs" value="6" class="form-check-input" id="cs3" ><label class="form-check-label" for="cs3"><strong>{{__('lang.cs3')}}</strong></label>
                    </div>
                    @if ($errors->has('cs'))
                    <div class="alert alert-danger">{{$errors->first('cs')}}</div>
                    @endif 
                  </div>

                <div class="form-group alert ">
                  <label for="exampleFormControlInput1" class="form-label"><strong><strong>{{__('lang.sondage')}} ? <span class="star">*</span></strong></strong></label>

                    <div class="form-check form-check">
                        <input type="radio" onclick="javascript:hide();" name="sondage" value="oui" class="form-check-input" id="oui_p"><label class="form-check-label" for="oui_p" >  {{__('lang.yes')}}</label>                      
                    </div>
                    <div class="form-check form-check">
                        <input type="radio" onclick="javascript:hide();" name="sondage" value="non" class="form-check-input" id="non_p"><label class="form-check-label" for="non_p">  {{__('lang.no')}}</label>                      
                    </div>
                     @if ($errors->has('sondage'))
                    <div class="alert alert-danger">{{$errors->first('sondage')}}</div>
                    @endif 
                </div>

                <div class="form-check alert " id="raison_p" style="display:none;">
                    <label for="exampleFormControlInput1" class="form-label"><strong><strong>{{__('lang.n_participate')}}:</strong></strong></label>

                    <div class="form-check ">
                        <input type="radio" onclick="hide5();" name="raison_sondage" value="Je n'ai même pas eu connaissance d'un tel sondage" class="form-check-input" id="r1">
                        <label class="form-check-label" for="r1"> {{__('lang.pool_such')}}</label>
                    </div>
                    <div class="form-check ">
                        <input type="radio" onclick="hide5();" name="raison_sondage" value="Le premier responsable de l’Organisation n’a pas donné son accord" class="form-check-input" id="r2"><label class="form-check-label" for="r2">  {{__('lang.f_official')}}</label>                      
                    </div>

                    <div class="form-check ">
                        <input type="radio" onclick="hide5()"; name="raison_sondage" value="L’AAE n’a pas fourni suffisamment d’informations pour inciter à y répondre" class="form-check-input" id="r3"><label class="form-check-label" for="r3">  {{__('lang.prompt_r')}}</label>
                    </div>

                    <div class="form-check">
                        <input type="radio" onclick="hide5();" name="raison_sondage" value="autre" class="form-check-input" id="autre_raison"><label class="form-check-label" for="autre_raison"> {{__('lang.other')}}</label>
                    </div>

                    <div class="form-group"  id="raison" style="display:none;">
                        <label><strong>{{__('lang.reason')}} :</strong></label>
                        <textarea class="form-control" onkeypress="hide6()"  name="autre_raison_s"></textarea>
                        
                         @if ($errors->has('raison'))
                    <div class="alert alert-danger">{{$errors->first('raison')}}</div>
                    @endif 
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-8 offset-md-2">
                  <br>  <button class="btn btn-info btn-lg btn-block" type="submit"><i class="fa fa-check"></i> {{__('lang.reg')}}</button>
                </div>
            </div>
          </form>
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

<!-------------------------------------------------------------------
                Menu des langues
    -------------------------------------------------------->
    <ul id=menu class="bg-info">
        <p><span>{{__('lang.langue')}}</span></p>
        <p><span>
          <select class="form-control Langchange">

                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected': '' }}>Anglais</option>
                    <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected': '' }}>Français</option>                    
                </select>
        
        </span></p>
    </ul>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        <script type="text/javascript" src="style/style.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
        <script type="text/javascript">

          var url = "{{ route('LangChange') }}";
          $(".Langchange").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });  
        </script>
    </body>
</html>
