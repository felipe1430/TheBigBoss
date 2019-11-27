<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservas extends Model
{
    public $timestamps=false;
    protected $table='reservas';
    protected $fillable = ['title','color','start_date','end_date'];  // nombre usuario , password

}
