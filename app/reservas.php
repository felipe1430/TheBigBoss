<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservas extends Model
{
    public $timestamps=false;
    protected $table='reservas';
    protected $fillable = ['title','color','start_date','end_date','fk_id_usuario','fk_id_empleado','fecha_reserva','estado_reserva'];  // nombre usuario , password

}
