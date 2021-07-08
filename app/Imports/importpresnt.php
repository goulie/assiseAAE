<?php

namespace App\Imports;

use App\Models\present;
use Maatwebsite\Excel\Concerns\ToModel;

class importpresnt implements ToModel
{
    protected $id;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function model(array $row)
    {
        return new present([
            'assise_id'     => $this->id,
            'email'    => $row[1], 
        ]);
    }
}
