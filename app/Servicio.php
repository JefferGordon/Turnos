<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    //
    protected $table = 'tbl_servicio';
    protected $primaryKey = 'SER_ID';
    public $timestamps = false;
    protected $fillable = ['SER_DESCRIPCION','SER_SECUENCIAL','SER_IDENTIFICADOR','SER_HORAA','SER_HORAF','SER_ESTADO'];
} 
