<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class UsuarioLista extends Model
{
  protected $table = "usuario";
  protected $primaryKey = 'idusuario';
  public $timestamps = false;
}