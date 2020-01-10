<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservas extends Model
{
    public $timestamps=false;
    protected $table='reservas';
    protected $primaryKey = 'id_reserva';
    protected $fillable = ['title','color','start_date','end_date','fk_id_usuario','fk_id_empleado','fecha_reserva','estado_reserva'];  // nombre usuario , password


   

    public function Servicios()
    {
        return $this->belongsToMany(servicios::class,'detalle_reserva','fk_reserva','fk_servicio');
    }

    public function User()
    {
        return $this->belongsTo(User::class,'fk_id_usuario');
    }
  

    public function Empleado()
    {
        return $this->belongsTo(empleados::class,'fk_id_empleado');
    }
}
