<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Puntos_socio extends Model
{
  protected $table = "puntos_socio";

  protected $primaryKey = 'idpuntos_socio';

  public $timestamps = false;
}