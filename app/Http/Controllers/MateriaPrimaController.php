<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Materiaprima;

class MateriaPrimaController extends Controller{

	public function lista(){
		$materias=Materiaprima::all();
		$datos=array();
		$datos['listas']=$materias;
		return view('materiaprima.lista')->with($datos);
	}


	public function formulario(Request $r){
		$datos=$r->all(); 

		if($r->isMethod('post')){
		//Si va por post significa que va a agregar
         //dd('vamos a agregar');
			$operacion='Agregar';
			$materia=new Materiaprima();
		}
		else{
		//Si va por get significa que va a modificar
			//dd('vamos a editar');
			$operacion='Editar';
			$materia=Materiaprima::find($datos['idmateria_prima']);
		}
		//dd($servicio);
		//Para enviar informacion a la vista
		$informacion=array();
		$informacion['operacion']=$operacion;
		$informacion['materia']=$materia;
		//$informacion['servicio']=$operacion;
		return view('materiaprima.formulario')->with($informacion);
	}


	public function save(Request $r){
      $datos=$r->all();

      switch ($datos['operacion']) {
      	case 'Agregar':
      		 $materia=new Materiaprima();
             $materia->nombre=$datos['nombre'];
             $materia->precio=$datos['precio'];
             $materia->save();
      		break;
      		case 'Editar':
      		 $materia=Materiaprima::find($datos['idmateria_prima']);
             $materia->nombre=$datos['nombre'];
             $materia->precio=$datos['precio'];
             $materia->save();
      		break;
      	
      	    case 'Eliminar':
      		 $materia=Materiaprima::find($datos['idmateria_prima']);
             $materia->delete();
      		break;
      }
      //dd($datos);

     
      return $this->lista();
	}
}