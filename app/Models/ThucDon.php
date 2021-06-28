<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThucDon extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'tenmon', 'gia' , 'loaimon' , 'id_loaitd' , 'id_quan'
    ];
    protected $primaryKey = 'id_thucdon';
    protected $table = 'thucdon';
}
