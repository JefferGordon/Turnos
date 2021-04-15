<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table = 'tbl_periodos';
    protected $primaryKey = 'PERI_ID';
    public $timestamps = false;
}
