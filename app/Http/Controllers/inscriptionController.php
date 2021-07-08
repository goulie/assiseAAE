<?php

namespace App\Http\Controllers;
use App\Models\assise;
use App\Models\pays;
use App\Models\sexe;
use App\Models\type_organisation;
use App\Models\comite_special;
use App\Models\inscription;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use App\Mail\mail_en;
use App\Mail\mail_fr;
use Illuminate\Support\Facades\session;


class inscriptionController extends Controller
{
    

    public function index()
    {
        /*
      $current_date = date('Y-m-d');

        $etat = DB::table('assises')
            ->select('date_fin','id','periode')
            ->latest('id')
             ->first();

                if ($etat->date_fin >= $current_date ) 
                        {
                      
                      return view('formulaire2');
                        }     
                else    {
                            return('Le délai d\'inscription est passé depuis le ' .$etat->date_fin );
                        } */
                        
                         return view('formulaire2')->with('msg','message'); 
    }


    public function add (Request $request){

    	$validated = $request->validate([
        'nom' => 'required|max:15',
        'prenoms' => 'required|max:30',
        'email' => 'required|max:30',
        'genre' => 'required|max:10',
        'pays' => 'required|max:20',
        'membre_aae' => 'required|max:5',
        'organisation' => 'required|max:50',
        'fonction' => 'required|max:30',
        'cs' => 'required|max:50',
        'sondage' => 'required|max:20',
    ]);
        $id_assise = DB::table('assises')->latest('id')->first(); 
        $mail = $request->email;
             


    $date = date('y-m-d');
    $heure= date('H:i:s');
    
        if (inscription::where('email',$mail)->where('code_assise',$id_assise->id)
        ->count()>0)
        {
          //$request->session()->flash('exist');

          return redirect()->back()->with('exist','message');
        }
        else

        {

        $inscription = new inscription;
        $inscription ->nom                  = $request->nom;
        $inscription ->prenoms              = $request->prenoms;
        $inscription ->email                = $request->email;
        $inscription ->pays_id              = $request->pays;
        $inscription ->genre_id             = $request->genre;
        $inscription ->membre_AAE           = $request->membre_aae;
        $inscription ->organisation         = $request->organisation;
        $inscription ->fonction             = $request->fonction;
        $inscription ->type_org_id          = $request->typ_org;
        $inscription ->part_sondage2020     = $request->sondage;
        $inscription ->code_cs              = $request->cs;
        $inscription ->code_assise          = $id_assise->id;
        $inscription ->date                 = $date;
        $inscription ->heure                = $heure;
  /****************************************************************
    
    ****************************************************************/
    if ($request->sondage =='oui') 
    {
        $inscription ->raison_sondage = 'aucun';

        $inscription ->autre_raison_sondage = 'aucun';
    }
    elseif ($request->sondage =='non' && $request->autre_raison_s =='') {
        
        $inscription ->raison_sondage = $request->raison_sondage;
        $inscription ->autre_raison_sondage = 'aucun';
    }
    else { 

        $inscription ->raison_sondage = 'aucun';
        $inscription ->autre_raison_sondage = $request->autre_raison_s;
    }

    /****************************************************************

    ****************************************************************/

    if ($request->typ_org == 8) 
    {$inscription ->autr_type_org = $request->autre_typ_org;
    }
    else { $inscription->autr_type_org = 'aucun'; 
    }

    /****************************************************************

    ****************************************************************/

    if ($request->membre_aae =='non') 
    {
        $inscription ->type_membre_id= '4';
    }
    else { 
       $inscription ->type_membre_id = $request->type_m;
    }

    $inscription->save();


    $lang = $request->language;
    $nom = $request->nom;
    $prenoms = $request->prenoms;
    $email = $request->email;

    if ($lang == "fr") 
        {

        \Mail::to($request->email)->send(new \App\Mail\email_fr);

        return view('confirmation',compact('nom','prenoms','email'))->with('save','message');
        }
    else
    {
        \Mail::to($request->email)->send(new \App\Mail\email_en);

        return view('confirmation',compact('nom','prenoms','email'))->with('save','message');

    }
}

  
    }
}
