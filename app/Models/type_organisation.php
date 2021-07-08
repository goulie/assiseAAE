<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_organisation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='type_organisations';
    protected $fillable = ['libelle_type_org'];

     public function inscriptions()
    {
    	 return $this->HasMany(inscription::class,'type_org_id','id');
    }
}
