<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Rol;

class RolController extends Controller{

	public function lista(){
		$roles=Rol::all();
		$datos=array();
		$datos['listas']=$roles;
		return view('rol.lista')->with($datos);
	}


	public function formulario(Request $r){
		$datos=$r->all(); 

		if($r->isMethod('post')){
		//Si va por post significa que va a agregar
         //dd('vamos a agregar');
			$operacion='Agregar';
			$rol=new Rol();
		}
		else{
		//Si va por get significa que va a modificar
			//dd('vamos a editar');
			$operacion='Editar';
			$rol=Rol::find($datos['idrol']);
		}
		//dd($servicio);
		//Para enviar informacion a la vista
		$informacion=array();
		$informacion['operacion']=$operacion;
		$informacion['rol']=$rol;
		//$informacion['servicio']=$operacion;
		return view('rol.formulario')->with($informacion);
	}


	public function save(Request $r){
      $datos=$r->all();

      switch ($datos['operacion']) {
      	case 'Agregar':
      		 $rol=new Rol();
             $rol->nombre=$datos['nombre'];
             $rol->save();
      		break;
      		case 'Editar':
      		 $rol=Rol::find($datos['idrol']);
             $rol->nombre=$datos['nombre'];
             $rol->save();
      		break;
      	
      	    case 'Eliminar':
      		 $rol=Rol::find($datos['idrol']);
             $rol->delete();
      		break;
      }
      //dd($datos);

     
      return $this->lista();
	}
}
