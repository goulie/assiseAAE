<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inscription extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='inscriptions';
    protected $fillable = ['nom','prenoms','email','pays','membre_AAE','type_membre_id','organisation','fonction','type_org','autr_type_org','part_sondage2020','raison_sondage','autre_raison_sondage','code_cs','code_assise','date','heure'];

	public function comite_spécials()
	{
    return $this->belongsTo(comite_spécial::class);

    }

    public function sexes()
	{
    return $this->belongsTo(sexe::class);

    }

    public function pays()
	{
    return $this->belongsTo(pays::class);

    }

    public function type_organisations()
	{
    return $this->belongsTo(type_organisation::class);

    }

    public function type_membres()
    {
    return $this->belongsTo(type_membre::class);

    }

    public function inscriptions()
    {
    return $this->belongsTo(inscription::class);

    }

}
