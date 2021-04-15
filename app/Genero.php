<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    //
    protected $table = 'tbl_generos';
    protected $primaryKey = 'GEN_ID';
    public $timestamps = false;
}
