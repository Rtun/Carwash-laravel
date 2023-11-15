<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\TipoServicio;

class TiposervicioController extends Controller{

	public function lista(){
		$tiposervicios=TipoServicio::all();
		$datos=array();
		$datos['listas']=$tiposervicios;
		return view('tiposervicio.lista')->with($datos);
	}


	public function formulario(Request $r){
		$datos=$r->all(); 

		if($r->isMethod('post')){
		//Si va por post significa que va a agregar
         //dd('vamos a agregar');
			$operacion='Agregar';
			$tiposervicio=new TipoServicio();
		}
		else{
		//Si va por get significa que va a modificar
			//dd('vamos a editar');
			$operacion='Editar';
			$tiposervicio=TipoServicio::find($datos['idtiposervicio']);
		}
		//dd($servicio);
		//Para enviar informacion a la vista
		$informacion=array();
		$informacion['operacion']=$operacion;
		$informacion['tiposervicio']=$tiposervicio;
		//$informacion['servicio']=$operacion;
		return view('tiposervicio.formulario')->with($informacion);
	}


	public function save(Request $r){
      $datos=$r->all();

      switch ($datos['operacion']) {
      	case 'Agregar':
      		 $tiposervicio=new TipoServicio();
             $tiposervicio->nombre_servicio=$datos['nombre_servicio'];
             $tiposervicio->precio=$datos['precio'];
             $tiposervicio->save();
      		break;
      		case 'Editar':
      		 $tiposervicio=TipoServicio::find($datos['idtiposervicio']);
             $tiposervicio->nombre_servicio=$datos['nombre_servicio'];
             $tiposervicio->precio=$datos['precio'];
             $tiposervicio->save();
      		break;
      	
      	    case 'Eliminar':
      		 $tiposervicio=TipoServicio::find($datos['idtiposervicio']);
             $tiposervicio->delete();
      		break;
      }
      //dd($datos);

     
      return $this->lista();
	}
}