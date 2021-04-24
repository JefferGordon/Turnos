<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Empresa extends Model
{
    //
   

    protected $table = 'tbl_empresa';
    protected $primaryKey = 'EMP_ID';
    public $timestamps = false;
    protected $fillable = ['EMP_RAZONSOCIAL', 'EMP_COMERCIAL','EMP_RUC','EMP_DIRECCION','EMP_TELEFONO1','EMP_TELEFONO2','EMP_CORREO','EMP_LOGO','EMP_REPRESENTANTE','EMP_ESTADO'];
  
}
