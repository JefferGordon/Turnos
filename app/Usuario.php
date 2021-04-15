<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
   

    protected $table = 'tbl_usuarios';
    protected $primaryKey = 'USU_ID';
    public $timestamps = false;
    protected $fillable = ['txtuser', 'txtpass'];
  
}
