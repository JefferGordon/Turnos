<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    //
    protected $table = 'tbl_modulos';
    protected $primaryKey = 'MOD_ID';
    public $timestamps = false;
    protected $fillable = ['MOD_NUMERO','MOD_DESCRIPCION','MOD_ESTADO','MOD_EMPRESA'];
} 
