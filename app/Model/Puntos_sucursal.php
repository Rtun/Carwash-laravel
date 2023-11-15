<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Puntos_sucursal extends Model
{
  protected $table = "puntos_sucursal";

  protected $primaryKey = 'idpuntossu';

  public $timestamps = false;
}