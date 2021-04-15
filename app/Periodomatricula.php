<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodomatricula extends Model
{
    protected $table = 'tbl_periodos_matriculas';
    protected $primaryKey = 'PMAR_ID';
    public $timestamps = false;
}
