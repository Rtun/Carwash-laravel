<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Porcentaje extends Model
{
  protected $table = "porcentajexsucursal";

  protected $primaryKey = 'idporcentaje';

  public $timestamps = false;
}