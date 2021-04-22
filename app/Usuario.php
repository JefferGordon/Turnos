<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
   

    protected $table = 'tbl_personas';
    protected $primaryKey = 'PER_ID';
    public $timestamps = false;
    protected $fillable = ['usuario', 'clave'];
  
}
