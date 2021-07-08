<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sexe extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='sexes';
    protected $fillable = ['id','libelle'];

    public function inscriptions()
	{
    return $this->HasMany(inscription::class,'genre_id','id');

    }
}
