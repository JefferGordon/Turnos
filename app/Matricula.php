<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
     //
     protected $table = 'tbl_matriculas';
     protected $primaryKey = 'MAT_ID';
     public $timestamps = false;
}
