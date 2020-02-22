<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notifiable;

class empleados extends Model
{
    protected $table = 'empleados';
    protected $primaryKey = 'id_empleado';
    public $timestamps=false;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_empleado','nombre_empleado','apellido_empleado','rut_empleado','descripcion_empleado','correo_empleado','telefono_empleado','comision_empleado','direccion_empleado','created_at','updated_at','fk_empleado_tipo_user','estado_empleado','imagen'
    ];
}

