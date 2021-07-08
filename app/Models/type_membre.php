<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_membre extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='type_membres';
    protected $fillable = ['lib_typ_membre'];

    public function inscriptions()
    {
    	 return $this->HasMany(inscription::class,'type_membre_id','id');
    }
}
