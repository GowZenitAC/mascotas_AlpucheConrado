<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    //
    protected $table='mascotas';

    //definimos la llave primaria
    protected $primaryKey='id_mascota';

    //especificar las relaciones
    public $with=['especie'];

    //solo si la PK sea numerica, si no es numerica se coloca false
    public $incrementing=true;

     //activar o desactivar etiquetas de tiempo
       public $timestamps=true;

       public $fillable=[
        'id_mascota',
        'nombre',
        'genero',
        'peso',
        'id_propietario',
        'id_especie'
    ];

    public function especie(){
        return $this->belongsTo(Especie::class, 'id_epecie','id_especie');
    }
}
    