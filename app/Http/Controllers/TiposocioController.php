<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\TipoSocio;

class TiposocioController extends Controller{

	public function listado(){
		$tiposocios=TipoSocio::all();
		$datos=array();
		$datos['lista']=$tiposocios;
		return view('tiposocio.lista')->with($datos);
	}
	public function formulario(Request $r){
		//Para recibir datos del usuario
		$datos=$r->all(); 

		if($r->isMethod('post')){
		//Si va por post significa que va a agregar
         //dd('vamos a agregar');
			$operacion='Agregar';
			$tiposocio=new TipoSocio();
		}
		else{
		//Si va por get significa que va a modificar
			//dd('vamos a editar');
			$operacion='Editar';
			$tiposocio=TipoSocio::find($datos['idtiposocio']);
		}
		//dd($tiposocio);
		//Para enviar informacion a la vista
		$informacion=array();
		$informacion['operacion']=$operacion;
		$informacion['tiposocio']=$tiposocio;
		//$informacion['servicio']=$operacion;
		

	    //dd($datos);		
		return view('tiposocio.formulario')->with($informacion);
	}

	
	public function save(Request $r){
		//para una peticion
		$datos=$r->all();
        //dd($datos);
        switch($datos['operacion']){
        	case 'Agregar';
        $tiposocio=new TipoSocio();
        $tiposocio->nombre=$datos['nombre'];
        //dd($tiposocio);
        	break;

        	case 'Editar';
        	//dd($datos);
        	$tiposocio=TipoSocio::find($datos['idtiposocio']);
        	$tiposocio->nombre=$datos['nombre'];
            $tiposocio->save();
        	break;

        	case 'Eliminar';
        	$tiposocio=TipoSocio::find($datos['idtiposocio']);
            $tiposocio->delete();	
        }
        //Comentar la redireccion al listado hasta q todo quede bien
        return $this->listado();
	}

    


 
 
}