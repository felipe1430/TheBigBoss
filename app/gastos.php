<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notifiable;


class gastos extends Model
{
    protected $table = 'gastos';
    protected $primaryKey = 'id_gastos';
    public $timestamps=false;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_gastos','descripcion_gastos','valor_gastos','fecha_gastos'
    ];
}
