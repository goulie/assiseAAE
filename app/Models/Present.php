<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Present extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='presents';
    protected $fillable = ['assise_id','email'];

    public function assise()
    {
    return $this->belongsTo(assise::class);
    }
}
