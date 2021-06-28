<?php

namespace App\Imports;

use App\Models\ThucDon;
use Maatwebsite\Excel\Concerns\ToModel;

use Session;

class ThucDonImports implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

       $id_quan =  Session::get('id_quan');
       $id_loaitd = Session::get('id_loaitd');
        return new ThucDon([
            'tenmon' => $row[0],
            'gia' => $row[1],
            'loaimon' => $row[2],
            'id_loaitd' => $id_loaitd,
            'id_quan'=> $id_quan
        ]);
    }
}
