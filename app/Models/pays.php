<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pays extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='pays';
    protected $fillable = ['id','libelle_pays'];

    public function inscriptions()
    {
    	 return $this->HasMany(inscription::class);
    }

    
}
