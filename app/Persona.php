<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    protected $table = 'tbl_personas';
    protected $primaryKey = 'PER_ID';
    public $timestamps = false;
    protected $fillable = ['GEN_ID', 'MOD_ID','PER_NOMBRES','PER_APELLIDOS','PER_CEDULA','PER_EMAIL','PER_ESTADO','PER_USUARIO','PER_CLAVE','PER_ROL','PER_ADD','PER_EMPRESA'];
}
