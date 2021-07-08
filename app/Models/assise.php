<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assise extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'assises';
    protected $fillable =['titre','theme','date_debut','date_fin','periode'];

    public function comite_specials()
    {
        return $this->hasMany(comite_special::class);
    }

    public function inscriptions()
    {
        return $this->hasMany(inscription::class);
    }
}
