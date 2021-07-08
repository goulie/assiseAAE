<?php

namespace App\Exports;

use App\Models\inscription;
use Maatwebsite\Excel\Concerns\FromCollection;

class test implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return inscription::all();
    }
}
