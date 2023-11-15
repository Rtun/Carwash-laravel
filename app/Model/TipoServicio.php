<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
  protected $table = "tipo_servicio";
  protected $primaryKey = 'idtiposervicio';
  public $timestamps = false;
}