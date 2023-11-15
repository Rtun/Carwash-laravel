<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Renta;
use App\Model\Socio;

class RentaController extends Controller{

	public function renta(Request $r){
		$context=$r->all();
		//$rentas=Renta::all();
		//en lugar de dar todas las rentas debe dar las rentas del socio de la peticion
		$rentas=Renta::where('idsocio',$context['idsocio'])->get();
		$socio=Socio::find($context['idsocio']);
		$datos=array();
		$datos['listas']=$rentas;
		$datos['socio']=$socio;
		return view('renta.lista')->with($datos);
	}


	public function formulario(Request $r){
		$datos=$r->all(); 

		if($r->isMethod('post')){
		$context=$r->all();
		//Si va por post significa que va a agregar
			$operacion='Agregar';
			$renta=new Renta();
			$renta->idsocio=$datos['idsocio'];

		}
		else{
		//Si va por get significa que va a modificar
			//dd('vamos a editar');
			$operacion='Editar';
			$renta=Renta::find($datos['idrenta']);
			
		}
		$socio=Socio::find($renta['idsocio']);
		
		//Para enviar informacion a la vista
		$informacion=array();
		$informacion['operacion']=$operacion;
		$informacion['renta']=$renta;
		$informacion['socio']=$socio;
		//$informacion['servicio']=$operacion;
		return view('renta.formulario')->with($informacion);
	}


	public function save(Request $r){
      $datos=$r->all();

      switch ($datos['operacion']) {
      	case 'Agregar':
      	      $renta=new Renta();
             $renta->precio=$datos['precio'];
             $renta->idsocio=$datos['idsocio'];
             $renta->fecha_inicio=$datos['fecha_inicio'];
             $renta->fecha_fin=$datos['fecha_fin'];
             
             $renta->save();
      		break;
      		case 'Editar':
      	      $renta=Renta::find($datos['idrenta']);
             $renta->precio=$datos['precio'];
             $renta->idsocio=$datos['idsocio'];
             $renta->fecha_inicio=$datos['fecha_inicio'];
             $renta->fecha_fin=$datos['fecha_fin'];
             $renta->save();
      		break;
      	
      	    case 'Eliminar':
      	      $renta=Renta::find($datos['idrenta']);
             $renta->delete();
      		break;
      }
      //dd($datos);

     
      return $this->Renta($r);
	}
}