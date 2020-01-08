<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleReserva extends Model
{
    public $timestamps=false;
    protected $table='detalle_reserva';
    protected $primaryKey = 'id_det_reserva';
    protected $fillable = ['fk_reserva','fk_servicio','cantidad_serv_det_reserva'];  // nombre usuario , password


    public function servicios()
    {
        return $this->hasMany(servicios::class,'id_servicios');
    }

}
