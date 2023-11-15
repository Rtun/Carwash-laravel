<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Estacion;

class EstacionController extends Controller{

	public function lista(){
		$estaciones=Estacion::all();
		$datos=array();
		$datos['listas']=$estaciones;
		return view('estacion.lista')->with($datos);
	}


	public function formulario(Request $r){
		$datos=$r->all(); 

		if($r->isMethod('post')){
		//Si va por post significa que va a agregar
         //dd('vamos a agregar');
			$operacion='Agregar';
			$estacion=new Estacion();
		}
		else{
		//Si va por get significa que va a modificar
			//dd('vamos a editar');
			$operacion='Editar';
			$estacion=Estacion::find($datos['idestacion']);
		}
		//dd($servicio);
		//Para enviar informacion a la vista
		$informacion=array();
		$informacion['operacion']=$operacion;
		$informacion['estacion']=$estacion;
		//$informacion['servicio']=$operacion;
		return view('estacion.formulario')->with($informacion);
	}


	public function save(Request $r){
      $datos=$r->all();

      switch ($datos['operacion']) {
      	case 'Agregar':
      		 $estacion=new Estacion();
             $estacion->nombre=$datos['nombre'];
             $estacion->save();
      		break;
      		case 'Editar':
      		 $estacion=Estacion::find($datos['idestacion']);
             $estacion->nombre=$datos['nombre'];
             $estacion->save();
      		break;
      	
      	    case 'Eliminar':
      		 $estacion=Estacion::find($datos['idestacion']);
             $estacion->delete();
      		break;
      }
      //dd($datos);

     
      return $this->lista();
	}
}