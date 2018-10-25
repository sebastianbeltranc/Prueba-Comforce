<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
  protected $table = 'procesos';

  /*NOMBRE DE LA LLAVE PRIMARIA EN LA BASE DE DATOS*/
  protected $primaryKey  = 'Id_proceso';

  protected $fillable = ['Numero_proceso','Descripcion','Sede','Presupuesto','user_id'];


  //Scope para busqueda de productos
  public function scopeBuscar($query, $Busqueda){
    if($Busqueda){
        return $query->where('created_at', 'LIKE', "%$Busqueda%");
    }
  }
}
