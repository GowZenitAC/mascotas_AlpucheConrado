<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table='productos';
    //definimos la llave primaria
    protected $primaryKey='sku';
//solo si la PK sea numerica, si no es numerica se coloca false
     public $incrementing=false;
 //activar o desactivar etiquetas de tiempo
     public $timestamps=false;

     protected $fillable=[
        'sku',
        'nombre',
        'precio_venta',
        'cantidad'
     ];
}
