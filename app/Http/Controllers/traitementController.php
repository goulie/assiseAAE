<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Exports\extraction;
use App\Models\sexe;
use App\Models\assise;
use App\Models\inscription;
use App\Models\pays;
use App\Models\Present;
use App\Models\type_organisation;
use App\Models\comite_special;
use App\Models\type_membre;
use App\Exports\export_assise;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;


class traitementController extends Controller
{
    public function index()
    {
    	$assise = DB::table('assises')->get();
    	return view('extraction',compact('assise'));
    }


    
    public function assise(Request $request)
    {
    	$id = $request->assise;
        ob_end_clean (); //exportation xlsx lisible
        ob_start (); //exportation xlsx lisible
         return Excel::download(new export_assise($id),'assise.xlsx');

    }


    public function all()
    {
        ob_end_clean (); //exportation xlsx lisible
        ob_start (); //exportation xlsx lisible
        return Excel::download(new extraction, 'all_assise.xlsx');
    }

    public function liste_inscrits(Request $request)
    {
        $last_id= assise::latest('id')->first('id');
        $id = $last_id->id;
             //liste de tous les inscrits à l'assise recente
            if ($request->ajax()) 
               {
               $list_assise = DB::table('inscriptions')
                 ->where('inscriptions.code_assise',$id)
                 ->join('sexes','inscriptions.genre_id','=','sexes.id')
                 ->join('pays','inscriptions.pays_id','=','pays.id')
                 ->join('type_membres','inscriptions.type_membre_id','=','type_membres.id')
                 ->join('type_organisations','inscriptions.type_org_id','=','type_organisations.id')
                 ->join('comite_specials','inscriptions.code_cs','=','comite_specials.id')
                 ->join('assises','inscriptions.code_assise','=','assises.id')
                 ->select(DB::raw('DATE_FORMAT(inscriptions.date, "%d-%M-%Y") as date'),'inscriptions.id','inscriptions.nom as nom','inscriptions.prenoms',
                            'sexes.libelle','inscriptions.email','pays.libelle_pays','inscriptions.fonction','inscriptions.membre_AAE',
                            'type_membres.lib_typ_membre','inscriptions.organisation','type_organisations.libelle_type_org',
                            'inscriptions.autr_type_org','comite_specials.libelle_cs','assises.titre','inscriptions.part_sondage2020','inscriptions.raison_sondage',
                            'inscriptions.autre_raison_sondage','inscriptions.date','inscriptions.heure')
                    ->orderBy('inscriptions.id','asc')
                    ->get();
                     return Datatables::of($list_assise)
                                    ->addIndexColumn()
                                    ->addColumn('action', function($row){
               
                                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBook">Edit</a>';
                
                        })
                                ->rawColumns(['action'])
                                ->make(true);
                    }  

            return view('liste_inscrits');

    }

        
}
