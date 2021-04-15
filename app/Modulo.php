<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    //
    protected $table = 'tbl_modulos';
    protected $primaryKey = 'MOD_ID';
    public $timestamps = false;
}
