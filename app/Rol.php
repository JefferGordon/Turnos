<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //
    protected $table = 'tbl_roles';
    protected $primaryKey = 'ROL_ID';
    public $timestamps = false;
}
