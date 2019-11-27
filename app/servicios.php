<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notifiable;

class servicios extends Model
{
    protected $table = 'servicios';
    protected $primaryKey = 'id_servicios';
    public $timestamps=false;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_servicios','nombre_servicio','descripcion_servicio','valor_servicio','estado_servicios'
    ];
}
