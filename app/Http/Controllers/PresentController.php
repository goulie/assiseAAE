<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sexe;
use App\Models\assise;
use App\Models\inscription;
use App\Models\pays;
use App\Models\Present;
use App\Models\type_organisation;
use App\Models\comite_special;
use App\Models\type_membre;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExporPresent;




class PresentController extends Controller
{
    public function export(Request $request)
    { 
      $id = $request->id;
      ob_end_clean (); // cet 
      ob_start (); // et ceci 
       return Excel::download(new ExporPresent($id), 'liste_de_presence.xlsx');
    }  


    public function delete(Request $request)
    { 
      $id = $request->id;
      DB::table('presents')->where('assise_id', $id)->delete();
       return redirect()->back();
    }

    public function statistiques()
    {
 $last_id= assise::latest('id')->first('id');
$id=$last_id->id;
//liste de presence
$presents = DB::table('inscriptions')
            ->whereExists(function ($query) {
            $query->select(DB::raw(1))
            ->from('presents')
            ->whereColumn('presents.email','inscriptions.email');})
        ->where('inscriptions.code_assise',$id)
        ->join('sexes','inscriptions.genre_id','=','sexes.id')
        ->join('pays','inscriptions.pays_id','=','pays.id')
        ->join('type_membres','inscriptions.type_membre_id','=','type_membres.id')
        ->join('type_organisations','inscriptions.type_org_id','=','type_organisations.id')
        ->join('comite_specials','inscriptions.code_cs','=','comite_specials.id')
        ->join('assises','inscriptions.code_assise','=','assises.id')
        ->select('inscriptions.id','inscriptions.nom','inscriptions.prenoms',
                'sexes.libelle','inscriptions.email','pays.libelle_pays','inscriptions.fonction','inscriptions.membre_AAE','type_membres.lib_typ_membre','inscriptions.organisation','type_organisations.libelle_type_org',
                'inscriptions.autr_type_org','comite_specials.libelle_cs','assises.titre','inscriptions.part_sondage2020','inscriptions.raison_sondage',
                'inscriptions.autre_raison_sondage','inscriptions.date','inscriptions.heure')
        ->orderBy('inscriptions.id','asc')
        ->get();
  
//Nombre inscrits present par genre
      $membre = sexe::with(['inscriptions'=>function ($q) use($id){
         $q->where('code_assise',$id)
         ->whereExists(function ($query) 
         {
            $query->select(DB::raw(1))
            ->from('presents')
            ->whereColumn('presents.email','inscriptions.email');
          });
      }])->get();


//Nombre inscrits present par pays
$pays = pays::with(['inscriptions'=>function ($q) use($id){
   $q->where('code_assise',$id)
   ->whereExists(function ($query) {
      $query->select(DB::raw(1))
      ->from('presents')
      ->whereColumn('presents.email','inscriptions.email');
      });
    }])->get();


//Nombre inscrits present par type d'organisation
$organisation = type_organisation::with(['inscriptions'=>function ($q)  use($id){
   $q->where('code_assise',$id)
      ->whereExists(function ($query) {
      $query->select(DB::raw(1))
      ->from('presents')
      ->whereColumn('presents.email','inscriptions.email');
      });
}])
->whereExists(function ($query) {
               $query->select(DB::raw(1))
               ->from('inscriptions')
               ->whereColumn('inscriptions.type_org_id', 'type_organisations.id');})->get();

//liste des inscrits present type membre AAE
$membreaae = type_membre::with(['inscriptions'=>function ($q) use($id){
   $q->where('code_assise',$id)
   ->whereExists(function ($query) {
      $query->select(DB::raw(1))
      ->from('presents')
      ->whereColumn('presents.email','inscriptions.email');
      });
}])
->whereExists(function ($query) {
               $query->select(DB::raw(1))
               ->from('inscriptions')
               ->whereColumn('inscriptions.type_membre_id', 'type_membres.id');})->get();

//Présents inscrits par comité spécial
$cs = comite_special::with(['inscriptions'=>function ($q) use($id){
   $q->where('code_assise',$id)->whereExists(function ($query) {
      $query->select(DB::raw(1))
      ->from('presents')
      ->whereColumn('presents.email','inscriptions.email');
      });
}])->get();


//Genre par pays
 $genre_pays = sexe::with(['inscriptions'=>function ($q) use($id){
   $q->where('code_assise',$id)->whereExists(function ($query) {
      $query->select(DB::raw(1))
      ->from('presents')
      ->whereColumn('presents.email','inscriptions.email');
      });
}])->get();
     
   //Membres par pays
   $membre_pays_h = DB::table('inscriptions')
   ->where('inscriptions.genre_id',2)
      ->join('sexes','inscriptions.genre_id','=','sexes.id')
      ->join('pays','inscriptions.pays_id','=','pays.id')
      /*
      ->select('sexes.libelle as Genre',DB::raw('GROUP_CONCAT(pays.libelle_pays) as Pays'),DB::raw('count(inscriptions.id) as Total'))*/

       ->select('pays.libelle_pays as Pays',DB::raw('GROUP_CONCAT(sexes.libelle) as Genre'),DB::raw('count(inscriptions.id) as Total'))
      ->groupBy('pays.libelle_pays')
      ->get();       
/*
$members = DB::table('inscriptions')
           ->whereExists(function ($query) {
               $query->select(DB::raw(1))
                     ->from('sexes')
                     ->whereColumn('inscriptions.genre_id', 'sexes.id');
           })
           ->whereExists(function ($query) {
               $query->select(DB::raw(1))
                     ->from('pays')
                     ->whereColumn('inscriptions.pays_id', 'pays.id');
           })
      ->join('sexes','inscriptions.genre_id','=','sexes.id')
      ->join('pays','inscriptions.pays_id','=','pays.id')
      ->select('pays.libelle_pays as Pays','sexes.libelle as Genre',DB::raw(count'GROUP_CONCAT(sexes.libelle) as Gender'),DB::raw('count(inscriptions.id) as Total'))
      ->groupBy('pays.libelle_pays')
      ->groupBy('sexes.libelle')
      ->get();*/
   

   $membre = sexe::with(['inscriptions'=>function ($q) use($id){
   $q->where('code_assise',$id)->whereExists(function ($query) {
      $query->select(DB::raw(1))
      ->from('presents')
      ->whereColumn('presents.email','inscriptions.email');
      });
   }])->get();

   //membre par pays
   $members = pays::with(['inscriptions'=>function ($q) use($id){
   $q->where('code_assise',$id)
   ->join('sexes','inscriptions.genre_id','=','sexes.id');
   //->groupBy('inscriptions.libelle');
      }])

   ->get();

   /*
   $members = pays::with(['inscriptions'=>function ($q) use($id){
   $q->where('code_assise',$id);
   }])
   ->whereExists(function ($query) {
               $query->select(DB::raw(1))
                     ->from('inscriptions')
                     ->whereColumn('inscriptions.pays_id', 'pays.id');})->get();
*/

//Liste de présence
$data = DB::table('inscriptions')
        ->where('inscriptions.code_assise',$last_id)
            ->whereExists(function ($query) {
               $query->select(DB::raw(1))
            ->from('presents')
            ->whereColumn('presents.email','inscriptions.email');
        })
        ->join('sexes','inscriptions.genre_id','=','sexes.id')
                 ->join('pays','inscriptions.pays_id','=','pays.id')
                 ->join('type_membres','inscriptions.type_membre_id','=','type_membres.id')
                 ->join('type_organisations','inscriptions.type_org_id','=','type_organisations.id')
                 ->join('comite_specials','inscriptions.code_cs','=','comite_specials.id')
                 ->select('inscriptions.id as id','inscriptions.nom','inscriptions.prenoms',
               'inscriptions.email','pays.libelle_pays','inscriptions.fonction',
                'type_membres.lib_typ_membre','inscriptions.organisation',
                'type_organisations.libelle_type_org','comite_specials.sigle')
                 ->paginate(10);

return view('stat_present',compact('membre','pays','organisation','membreaae','cs','members','data'));

    }

    public function gestion ()
    {
      $assise = DB::table('assises')->get();   
        $id_assise = DB::table('assises')->latest('id')->first(); 
        $last_id  = $id_assise->id;

        $presents = DB::table('inscriptions')
            ->whereExists(function ($query) {
               $query->select(DB::raw(1))
            ->from('presents')
            ->whereColumn('presents.email','inscriptions.email');
        })
        ->where('inscriptions.code_assise',$last_id)
        ->join('sexes','inscriptions.genre_id','=','sexes.id')
                ->join('pays','inscriptions.pays_id','=','pays.id')
                ->join('type_membres','inscriptions.type_membre_id','=','type_membres.id')
                ->join('type_organisations','inscriptions.type_org_id','=','type_organisations.id')
                ->join('comite_specials','inscriptions.code_cs','=','comite_specials.id')
                ->get();



                //count participant by country
                $p_pays = pays::with(['inscriptions'=>function ($q) use($last_id){
                   $q->where('code_assise',$last_id);
                }])
                ->whereExists(function ($query) {
                               $query->select(DB::raw(1))
                                     ->from('inscriptions')
                                     ->whereExists(function ($query) {
                                           $query->select(DB::raw(1))
                                        ->from('presents')
                                        ->whereColumn('presents.email','inscriptions.email');
                                    })
                                     ->whereColumn('inscriptions.pays_id', 'pays.id');})
                        ->select('pays.libelle_pays')
                        ->get();


                // AFWA Members
                $members = DB::table('inscriptions')
                            ->whereExists(function ($query) {
                               $query->select(DB::raw(1))
                            ->from('presents')
                            ->whereColumn('presents.email','inscriptions.email');
                        })
                        ->where('inscriptions.code_assise',$last_id)
                        //->join('type_membres','inscriptions.type_membre_id','=','type_membres.id')
                        ->where('inscriptions.type_membre_id','<>',4)
                        ->get();

                //AFWA members 
                $members = DB::table('inscriptions')
                ->where('inscriptions.code_assise',$last_id)
               ->where('inscriptions.membre_AAE','oui')                
               ->whereExists(function ($query) {
                                           $query->select(DB::raw(1))
                                        ->from('presents')
                                        ->whereColumn('inscriptions.email','presents.email');
                                    })->get();

                //presents numbers
                //$pnbre=DB::table('presents')->count();

//Liste de présence
$data = DB::table('inscriptions')
        ->where('inscriptions.code_assise',$last_id)
            ->whereExists(function ($query) {
               $query->select(DB::raw(1))
            ->from('presents')
            ->whereColumn('presents.email','inscriptions.email');
        })
        ->join('sexes','inscriptions.genre_id','=','sexes.id')
                 ->join('pays','inscriptions.pays_id','=','pays.id')
                 ->join('type_membres','inscriptions.type_membre_id','=','type_membres.id')
                 ->join('type_organisations','inscriptions.type_org_id','=','type_organisations.id')
                 ->join('comite_specials','inscriptions.code_cs','=','comite_specials.id')
                 ->select('inscriptions.id as id','inscriptions.nom','inscriptions.prenoms',
               'inscriptions.email','pays.libelle_pays','inscriptions.fonction',
                'type_membres.lib_typ_membre','inscriptions.organisation',
                'type_organisations.libelle_type_org','comite_specials.sigle')
                 ->paginate(10);
    return view('gestion_presents',compact('assise','p_pays','members','presents','data'));
    }
     


}
