<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    protected $table = 'tbl_personas';
    protected $primaryKey = 'PER_ID';
    public $timestamps = false;
    protected $fillable = ['txtnombres', 'txtapellidos','txtcedula','txtcorreo','cbxgenero','cbxmodulo'];
}
