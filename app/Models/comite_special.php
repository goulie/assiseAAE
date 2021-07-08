<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comite_special extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'comite_specials';
    protected $fillable = ['id','libelle_cs','sigle','code_assise'];

    public function assise()
	{
    return $this->belongsTo(assise::class);
	}
	public function inscriptions()
	{
    return $this->HasMany(inscription::class, 'code_cs','id');
	}
}
