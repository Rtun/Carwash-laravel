<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Materiaprima extends Model
{
  protected $table = "materia_prima";
  protected $primaryKey = 'idmateria_prima';
  public $timestamps = false;
}
