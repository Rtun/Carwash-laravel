<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Horario;

class HorarioController extends Controller{

	public function lista(){
		$horarios=Horario::all();
		$datos=array();
		$datos['listas']=$horarios;
		return view('horario.lista')->with($datos);
	}


	public function formulario(Request $r){
		$datos=$r->all(); 

		if($r->isMethod('post')){
		//Si va por post significa que va a agregar
         //dd('vamos a agregar');
			$operacion='Agregar';
			$horario=new Horario();
		}
		else{
		//Si va por get significa que va a modificar
			//dd('vamos a editar');
			$operacion='Editar';
			$horario=Horario::find($datos['idhorario']);
		}
		//dd($servicio);
		//Para enviar informacion a la vista
		$informacion=array();
		$informacion['operacion']=$operacion;
		$informacion['horario']=$horario;
		//$informacion['servicio']=$operacion;
		return view('horario.formulario')->with($informacion);
	}


	public function save(Request $r){
      $datos=$r->all();

      switch ($datos['operacion']) {
      	case 'Agregar':
      		 $horario=new Horario();
             $horario->hora_inicial=$datos['hora_inicial'];
             $horario->hora_final=$datos['hora_final'];
             $horario->save();
      		break;
      		case 'Editar':
      		 $horario=Horario::find($datos['idhorario']);
             $horario->hora_inicial=$datos['hora_inicial'];
             $horario->hora_final=$datos['hora_final'];
             $horario->save();
      		break;
      	
      	    case 'Eliminar':
      		 $horario=Horario::find($datos['idhorario']);
             $horario->delete();
      		break;
      }
      //dd($datos);

     
      return $this->lista();
	}
}