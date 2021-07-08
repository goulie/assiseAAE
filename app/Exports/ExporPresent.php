<?php

namespace App\Exports;


use App\Models\inscription;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

    class ExporPresent implements FromCollection,WithHeadings
    {
        protected $id;
       
       /* @return \Illuminate\Support\Collection

      */

        public function __construct($id)
        {
            $this->id = $id;
        }

    public function headings(): array
    {
        return [
            '#ID',
            'Nom',
            'Prénoms',
            'Genre',
            'Email',
            'Pays',
            'Fonction',
            'Membre_AAE',
            'type_Membre',
            'Organisation',
            'Type_org',
            'Autre_typ_org',
            'Comité_spécial',
            'Assise',
            'sondage_2020',
            'Raison_NP',
            'Autre_Raison_NP',
            'Date',
            'Heure',

        ];
    }
    public function collection()
    {
        $presents = DB::table('inscriptions')
            ->whereExists(function ($query) {
            $query->select(DB::raw(1))
            ->from('presents')
            ->whereColumn('presents.email','inscriptions.email');})
        ->where('inscriptions.code_assise',$this->id)
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
        return $presents;
    }
}
