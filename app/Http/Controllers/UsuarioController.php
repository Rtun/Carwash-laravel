<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\UsuarioLista;
use App\Model\Rol;

class UsuarioController extends Controller{

	public function lista(){
		//$usuarios=UsuarioLista::all();
		$usuarios=UsuarioLista::join('rol','rol.idrol','=','usuario.idrol')
                 ->select(
                          "usuario.idusuario"
                          ,"usuario.email"
                          ,"usuario.password"
						  ,"rol.idrol"
                          ,"rol.nombre as nom_rol"
                  )
                 ->get();
		$datos=array();
		$datos['lista']=$usuarios;
		return view('usuarios.lista')->with($datos);
	}
}