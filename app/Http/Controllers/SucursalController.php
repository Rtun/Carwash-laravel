<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Sucursal;

class SucursalController extends Controller{

	public function sucursal(){
		$sucursales=Sucursal::all();
		$datos=array();
		$datos['listas']=$sucursales;
		return view('sucursal.listas')->with($datos);
	}


	public function formulario(Request $r){
		$datos=$r->all(); 

		if($r->isMethod('post')){
		//Si va por post significa que va a agregar
         //dd('vamos a agregar');
			$operacion='Agregar';
			$sucursal=new Sucursal();
		}
		else{
		//Si va por get significa que va a modificar
			//dd('vamos a editar');
			$operacion='Editar';
			$sucursal=Sucursal::find($datos['idsucursal']);
		}
		//dd($servicio);
		//Para enviar informacion a la vista
		$informacion=array();
		$informacion['operacion']=$operacion;
		$informacion['sucursal']=$sucursal;
		//$informacion['servicio']=$operacion;
		return view('sucursal.formulario')->with($informacion);
	}


	public function save(Request $r){
      $datos=$r->all();

      switch ($datos['operacion']) {
      	case 'Agregar':
      		 $sucursal=new Sucursal();
             $sucursal->nombre=$datos['nombre'];
             $sucursal->save();
      		break;
      		case 'Editar':
      		 $sucursal=Sucursal::find($datos['idsucursal']);
             $sucursal->nombre=$datos['nombre'];
             $sucursal->save();
      		break;
      	
      	    case 'Eliminar':
      		 $sucursal=Sucursal::find($datos['idsucursal']);
             $sucursal->delete();
      		break;
      }
      //dd($datos);

     
      return $this->sucursal();
	}
}