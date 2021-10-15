<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raza extends Model
{
    //
    protected $table='razas';

    protected $primaryKey='id_razas';

    public $incrementing=true;
    public $timestamps=false;

    public $fillabe=[
        'id_razas',
        'razas'
    ];

}
