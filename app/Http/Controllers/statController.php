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


class statController extends Controller
{
   public function by_assise(Request $request){

   $id  = $request->id_assise;
 //nombre inscrits par genre avec code assise 
$membre = sexe::with(['inscriptions'=>function ($q) use($id){
   $q->where('code_assise',$id);
}])->get();


//nombres inscrits par pays
$membre_typ_org = pays::with(['inscriptions'=>function ($q) use($id){
   $q->where('code_assise',$id);
}])->get();


//membre par pays
$membre_par_pays = pays::with(['inscriptions'=>function ($q) use($id){
   $q->where('code_assise',$id);
}])
->whereExists(function ($query) {
               $query->select(DB::raw(1))
                     ->from('inscriptions')
                     ->whereColumn('inscriptions.pays_id', 'pays.id');})->get();


//membre par type d'organisation
$membre_typ_org = type_organisation::with(['inscriptions'=>function ($q)  use($id){
   $q->where('code_assise',$id);
}])
->whereExists(function ($query) {
               $query->select(DB::raw(1))
               ->from('inscriptions')
               ->whereColumn('inscriptions.type_org_id', 'type_organisations.id');})->get();


//inscrits par comité spécial
$membre_cs = comite_special::with(['inscriptions'=>function ($q) use($id){
   $q->where('code_assise',$id);
}])->get();



//==========================================================================================
   
//============================================================================================

//liste des inscrits type membre AAE
$membreaae = type_membre::with(['inscriptions'=>function ($q) use($id){
   $q->where('code_assise',$id);
}])
->whereExists(function ($query) {
               $query->select(DB::raw(1))
               ->from('inscriptions')
               ->whereColumn('inscriptions.type_membre_id', 'type_membres.id');})->get();


//=================================================================//

// =================================================================//
/*
$genreh_pays = DB::table('inscriptions')
         ->join('pays','inscriptions.pays_id','=','pays.id')
         ->join('sexes','inscriptions.genre_id','=','sexes.id')
         ->where('pays.libelle','Afrique du sud')
            ->select('sexes.libelle', DB::raw('count(sexes.id) as Genre')) 
            ->orderBy('pays.libelle', 'asc')
            ->groupBy('sexes.libelle')
            ->get();
*/
/****************************
      Liste par assise
*********************************/


//membre AAE
$AAE = DB::table('inscriptions')
->where('membre_AAE','=','oui')
->where('code_assise',$id)
->count();

//les assises
$assise = DB::table('assises')
->where('id',$id)
->get();

//total inscrits
$total = DB::table('inscriptions')
->where('code_assise',$id)
->get();

//total des pays participants
$pays_pat = pays::with('inscriptions')
->whereExists(function ($query)use($id) {
               $query->select (DB::raw(1))
                     ->from('inscriptions')
                     ->where('code_assise',$id)
                     ->whereColumn('inscriptions.pays_id', 'pays.id');})
            ->select('libelle_pays')
            ->distinct()
            ->count();

return view('admin',compact('membre','membre_par_pays','membre_typ_org','membre_cs','total','pays_pat','membreaae','AAE','assise'));

	//return dd($membreaae);
	
   }



   public function index ()
   {

   $last_id= assise::latest('id')->first('id');
   $last_titre= assise::latest('titre')->first('titre');

   $id = $last_id->id;

   $titre = $last_titre->titre;

   //nombre inscrits par genre à l'assise recente
   $membre = sexe::with(['inscriptions'=>function ($q) use($id){
   $q->where('code_assise',$id);
   }])->get();


   //nombres inscrits par pays à l'assise recente
   $membre_typ_org = pays::with(['inscriptions'=>function ($q) use($id){
   $q->where('code_assise',$id);
   }])->get();


   //membre par pays
   $membre_par_pays = pays::with(['inscriptions'=>function ($q) use($id){
   $q->where('code_assise',$id);
   }])
   ->whereExists(function ($query) {
               $query->select(DB::raw(1))
                     ->from('inscriptions')
                     ->whereColumn('inscriptions.pays_id', 'pays.id');})->get();


//membre par type d'organisation
$membre_typ_org = type_organisation::with(['inscriptions'=>function ($q)  use($id){
   $q->where('code_assise',$id);
}])
->whereExists(function ($query) {
               $query->select(DB::raw(1))
               ->from('inscriptions')
               ->whereColumn('inscriptions.type_org_id', 'type_organisations.id');})->get();

//Inscrits par comité spécial
$membre_cs = comite_special::with(['inscriptions'=>function ($q) use($id){
   $q->where('code_assise',$id);
}])->get();



//==========================================================================================
   
//============================================================================================

//liste des inscrits type membre AAE
$membreaae = type_membre::with(['inscriptions'=>function ($q) use($id){
   $q->where('code_assise',$id);
}])
->whereExists(function ($query) {
               $query->select(DB::raw(1))
               ->from('inscriptions')
               ->whereColumn('inscriptions.type_membre_id', 'type_membres.id');})->get();


//=================================================================//

// =================================================================//
/*
$genreh_pays = DB::table('inscriptions')
         ->join('pays','inscriptions.pays_id','=','pays.id')
         ->join('sexes','inscriptions.genre_id','=','sexes.id')
         ->where('pays.libelle','Afrique du sud')
            ->select('sexes.libelle', DB::raw('count(sexes.id) as Genre')) 
            ->orderBy('pays.libelle', 'asc')
            ->groupBy('sexes.libelle')
            ->get();
*/
/*******************************
      Liste par assise
      
*********************************/

//membre AAE
$AAE = DB::table('inscriptions')
->where('membre_AAE','=','oui')
->where('code_assise',$id)
->count();

//les assises
$assise = DB::table('assises')
->where('id',$id)
->get();


//total inscrits
$total = DB::table('inscriptions')
->where('code_assise',$id)
->get();

//total des pays participants
$pays_pat = pays::with('inscriptions')
->whereExists(function ($query)use($id) {
               $query->select (DB::raw(1))
                     ->from('inscriptions')
                     ->where('code_assise',$id)
                     ->whereColumn('inscriptions.pays_id', 'pays.id');})
            ->select('libelle_pays')
            ->distinct()
            ->count();
            //non-membres AAE
            $nonAAE = DB::table('inscriptions')
            ->where('membre_AAE','=','non')
            ->where('code_assise',$id)
            ->count();



//Liste inscrits
$list_inscrit = DB::table('inscriptions')
                 ->where('inscriptions.code_assise',$id)
                 ->join('sexes','inscriptions.genre_id','=','sexes.id')
                 ->join('pays','inscriptions.pays_id','=','pays.id')
                 ->join('type_membres','inscriptions.type_membre_id','=','type_membres.id')
                 ->join('type_organisations','inscriptions.type_org_id','=','type_organisations.id')
                 ->join('comite_specials','inscriptions.code_cs','=','comite_specials.id')
                 ->join('assises','inscriptions.code_assise','=','assises.id')
                 ->select(DB::raw('DATE_FORMAT(inscriptions.date, "%d-%M-%Y") as date'),
                  'inscriptions.id','inscriptions.nom','inscriptions.prenoms',
                            'sexes.libelle','inscriptions.email','pays.libelle_pays','inscriptions.fonction','inscriptions.membre_AAE',
                            'type_membres.lib_typ_membre','inscriptions.organisation','type_organisations.libelle_type_org',
                            'inscriptions.autr_type_org','comite_specials.libelle_cs','assises.titre','inscriptions.part_sondage2020','inscriptions.raison_sondage',
                            'inscriptions.autre_raison_sondage','inscriptions.heure')
                    ->orderBy('inscriptions.id','asc')
                    ->get();
//presents et inscrits
      $presents = DB::table('presents')
        ->where('assise_id',$id)
            ->whereExists(function ($query) {
               $query->select(DB::raw(1))
                     ->from('inscriptions')
                     ->whereColumn('inscriptions.email', 'presents.email');
           })
           ->distinct()
           ->get(['presents.email']);

$abs = $list_inscrit->count() - $presents->count();

$firstStringCharacter = substr("hello", 0, 1);

return view('homepage',compact('presents','nonAAE','titre','membre','membre_par_pays','membre_typ_org','abs','membre_cs','total','pays_pat','membreaae','AAE','assise','list_inscrit'));


   
   }

   



}


