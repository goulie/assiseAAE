<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\assise;
use App\Models\Present;
use App\Models\pays;
use App\Models\sexe;
use App\Models\type_membre;
use App\Models\type_organisation;
use App\Models\comite_special;
use App\Models\inscription;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\importpresnt;
//use DataTables;

class gestionController extends Controller
{
    public function index(Request $request){


//liste par genre et par pays
    /*	$group = DB::table('inscriptions')
    	->join('sexes','inscriptions.genre_id','=','sexes.id')
    	->join('pays','inscriptions.pays_id','=','pays.id')
    	->select('pays.id as pays','pays.libelle as lib','sexes.libelle as genre',DB::raw('count(inscriptions.id) as nbre_genre'),'pays.id')
    	->groupBy('pays.libelle','pays.id')
    	->groupBy('sexes.id','sexes.libelle')
    	->get();    	
    	return print_r($group);*/

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

/*if ($request->ajax()) 
               { 
        //liste de presence
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
                 ->select('inscriptions.id','inscriptions.nom','inscriptions.prenoms',
               'inscriptions.email','pays.libelle_pays','inscriptions.fonction',
                'type_membres.lib_typ_membre','inscriptions.organisation',
                'type_organisations.libelle_type_org','comite_specials.sigle');
                    
                    return Datatables::of($data)
                                ->addIndexColumn()
                                ->rawColumns(['action'])
                                ->make(true);
                    }*/


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
        /*
$members = type_membre::with(['inscriptions'=>function ($q) use($last_id){
   $q->where('code_assise',$last_id);
}])
->whereExists(function ($query) {
                           $query->select(DB::raw(1))
                        ->from('inscriptions')
                        ->join('presents','inscriptions.code_assise','presents.assise_id')
                        ->where('inscriptions.type_membre_id',2)
                        ->whereColumn('presents.email','inscriptions.email');
                    })->get();
*/

//presents numbers
//$pnbre=DB::table('presents')->count();

return view('gestion_presents',compact('assise','p_pays','members','presents','data'));
  
    }

    public function gestion (Request $request){

        $assise = DB::table('assises')->get();

    return view('gestion',compact('assise'));
  
    }



    public function import_present(Request $request) 
    {
        $id = $request->id;
        Excel::import(new importpresnt ($id) ,request()->file('file'));
             
        return back()->with('success','Les présents on été tous importé !');
    }

    public function add_assise(Request $request)
    {
        $validated = $request->validate([
        'titre' => 'required',
        'theme' => 'required',
        'debut' => 'required',
        'fin' => 'required',
    ]);

    $assise = new assise;
    $assise->titre = $request->titre;
    $assise->theme = $request->theme;
    $assise->date_debut = $request->debut;
    $assise->date_fin = $request->fin;
    $assise->periode = $request->periode;
    $assise->save();
    return back();
    }

    public function add_type_membre(Request $request)
    {
        $validated = $request->validate([
        'libelle' => 'required',
    ]);
    $type_membre = new type_membre;
    $type_membre->lib_type_membre = $request->libelle;
    $type_membre->save();
    return back();
     

    }

    public function add_type_org(Request $request)
    {
        $validated = $request->validate([
        'libelle' => 'required',
        ]);

    $type_org = new type_organisation;
    $type_org->libelle = $request->libelle;
    $type_org->save();
    return back();

    }

    public function add_cs(Request $request)
    {
        $validated = $request->validate([
        'libelle' => 'required',
    ]);
    $comite_special = new comite_special;
    $comite_special->libelle_cs = $request->libelle;
    $comite_special->code_assise = $request->id_assise;
    $comite_special->save();
    return back();
    }

    public function editer($id)
    {
        $assise = assise::find($id);
        return view('edit_assise',compact('assise'));
    }
     
     public function update_assise(Request $request)
     {
        $update = assise::find($request->id);
        $update->titre = $request->titre;
        $update->theme = $request->theme;
        $update->date_debut = $request->debut;
        $update->date_fin = $request->fin;
        $update->periode = $request->periode;
        $update->save();
        return redirect()->back()->with('msg',"l'assise a bien été modifiée !");
     }
}
