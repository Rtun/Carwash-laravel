<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Permiso;

class PermisoController extends Controller{

	public function lista(){
		$permisos=Permiso::all();
		$datos=array();
		$datos['listas']=$permisos;
		return view('permisos.listado')->with($datos);
	}


	public function formulario(Request $r){
		$datos=$r->all(); 

		if($r->isMethod('post')){
		//Si va por post significa que va a agregar
         //dd('vamos a agregar');
			$operacion='Agregar';
			$permiso=new Permiso();
		}
		else{
		//Si va por get significa que va a modificar
			//dd('vamos a editar');
			$operacion='Editar';
			$permiso=Permiso::find($datos['idpermiso']);
		}
		//dd($servicio);
		//Para enviar informacion a la vista
		$informacion=array();
		$informacion['operacion']=$operacion;
		$informacion['permiso']=$permiso;
		//$informacion['servicio']=$operacion;
		return view('permisos.formulario')->with($informacion);
	}


	public function save(Request $r){
      $datos=$r->all();

      switch ($datos['operacion']) {
      	case 'Agregar':
      		 $permiso=new Permiso();
             $permiso->nombre=$datos['nombre'];
             $permiso->clave=$datos['clave'];
             $permiso->save();
      		break;
      		case 'Editar':
      		 $permiso=Permiso::find($datos['idpermiso']);
             $permiso->nombre=$datos['nombre'];
             $permiso->clave=$datos['clave'];
             $permiso->save();
      		break;
      	
      	    case 'Eliminar':
      		 $permiso=Permiso::find($datos['idpermiso']);
             $permiso->delete();
      		break;
      }
      //dd($datos);

     
      return $this->lista();
	}
}