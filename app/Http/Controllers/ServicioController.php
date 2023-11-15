<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Servicio;
use App\Model\Personal;
use App\Model\TipoServicio;
use App\Model\Socio;

class ServicioController extends Controller{

	public function listado(){
		//$servicios=Servicio::all();
		$servicios=Servicio::join('tipo_servicio','tipo_servicio.idtiposervicio','=','servicio.idtiposervicio')
		                    ->join('personal','personal.idpersonal','=','servicio.idpersonal')
		                    ->join('socio','socio.idsocio','=','servicio.idsocio')
                 ->select(
                          "servicio.idservicio"
                          ,"servicio.placa"
                          ,"servicio.modelo"
                          ,"servicio.anio"
                          ,"servicio.precio"
                          ,"servicio.idsocio"
                          ,"servicio.idpersonal"
                          ,"servicio.idtiposervicio"
                          ,"tipo_servicio.idtiposervicio" 
                          ,"tipo_servicio.nombre_servicio as nomservicio"
                          ,"personal.nombre as nompersonal"
                          ,"socio.nombre as nomsocio"
                          ,\DB::Raw("DATE_FORMAT(fecha_creacion,'%Y-%m-%d') as fecha_creacion")
                          ,\DB::Raw("DATE_FORMAT(fecha_atencion_final,'%Y-%m-%d') as fecha_atencion_final")
                  )
                 ->get();
		$datos=array();
		$datos['lista']=$servicios;
		$datos['usuario']='elias';
		return view('servicio.listado')->with($datos);
	}
	public function formulario(Request $r){
		//Para recibir datos del usuario
		$datos=$r->all();
		//dd($datos); 

		if($r->isMethod('post')){
		//Si va por post significa que va a agregar
         //dd('vamos a agregar');
			$operacion='Agregar';
			$servicio=new Servicio();
		}
		else{
		//Si va por get significa que va a modificar
			//dd('vamos a editar');
			$operacion='Editar';
			$servicio=Servicio::find($datos['idservicio']);
		}
		//dd($servicio);
		//Para enviar informacion a la vista
		$name=Personal::all();
		$tips_ser=TipoServicio::all();
		$sos=Socio::all();

		$informacion=array();
		$informacion['operacion']=$operacion;
		$informacion['servicio']=$servicio;
		$informacion['name']=$name;
		$informacion['sos']=$sos;
		$informacion['tips_ser']=$tips_ser;
		//$informacion['servicio']=$operacion;
		

	    //dd($datos);		
		return view('servicio.formulario')->with($informacion);
	}

	
	public function save(Request $r){
		//para una peticion
		$datos=$r->all();
		date_default_timezone_set("America/Merida");
        //dd(date('Y-m-d H:i:s'));
        switch($datos['operacion']){
        	case 'Agregar';
        $servicio=new Servicio();
        $servicio->placa=$datos['placa'];
        $servicio->modelo=$datos['modelo'];
        $servicio->anio=$datos['anio'];
        $servicio->precio=$datos['precio'];
        $servicio->idpersonal=$datos['idpersonal'];
        $servicio->idtiposervicio=$datos['idtiposervicio'];
        $servicio->idsocio=$datos['idsocio'];
        $servicio->fecha_creacion=date('Y-m-d H:i:s');
        $servicio->fecha_atencion_final=$datos['fecha_atencion'];
        $servicio->save();

        	break;

        	case 'Editar';
        	//dd($datos);
        	$servicio=Servicio::find($datos['idservicio']);
            $servicio->placa=$datos['placa'];
            $servicio->modelo=$datos['modelo'];
            $servicio->anio=$datos['anio'];
            $servicio->precio=$datos['precio'];
            $servicio->idpersonal=$datos['idpersonal'];
            $servicio->idtiposervicio=$datos['idtiposervicio'];
            $servicio->idsocio=$datos['idsocio'];
            $servicio->save();
        	break;

        	case 'Eliminar';
        	$servicio=Servicio::find($datos['idservicio']);
            $servicio->delete();	
        }
        //Comentar la redireccion al listado hasta q todo quede bien
        return $this->listado();
	}

    


 
 
}