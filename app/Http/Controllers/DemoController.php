<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
//use App\Model\Servicio;
use App\BussinesLogic\BoServicio;
use App\Model\Personal;
use App\Model\TipoServicio;
use App\Model\Socio;
use App\Model\Estacion;
use App\Model\Horario;

use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmacionServicio;

class DemoController extends Controller{
public function prueba_bo(){
	$boservicio=new BoServicio(); 
	$x=new \StdClass();
	$x->idsocio=1;
	$x->idtiposervicio=2;
	$x->idpersonal=2;
	$x->placa='KRR-980';
	$x->modelo='Mercedez-Benz';
	$x->anio='2018';
	//$x->origen='WEB';
	$x->precio='1600';
	$x->idestacion=1;
	$x->idhorario=2;
	$x->fecha_servicio='2021-11-01';
	$y=$boservicio->registrar_servicio($x);
	dd($y);
}

public function formulario(Request $r){
	    $name=Personal::all();
		$tips_ser=TipoServicio::all();
		$sos=Socio::all();
		$est=Estacion::all();
		$hor=Horario::all();
		$informacion=array();
		$informacion['name']=$name;
		$informacion['sos']=$sos;
		$informacion['est']=$est;
		$informacion['hor']=$hor;
		$informacion['tips_ser']=$tips_ser;
	
	return view('bo_servicio.formulario')->with($informacion);
}
public function save(Request $r){
	$datos=$r->all();
	$boservicio=new BoServicio(); 
	$x=new \StdClass();
	$x->idsocio=$datos['idsocio'];
	$x->idtiposervicio=$datos['idtiposervicio'];
	$x->idpersonal=$datos['idpersonal'];
	$x->placa=$datos['placa'];
	$x->modelo=$datos['modelo'];
	$x->anio=$datos['anio'];
	$x->origen=$datos['origen'];
	$x->precio=$datos['precio'];
	$x->idestacion=$datos['idestacion'];
	$x->idhorario=$datos['idhorario'];
	$x->fecha_servicio=$datos['fecha_servicio'];
	$y=$boservicio->registrar_servicio($x);
	dd($y);
}
public function prueba_vue(Request $r){
      $datos=array();

	  $datos['horarios']=array();
	  $datos['horarios'][]=array("iden"=>1,"label"=>'09:00 am');
	  $datos['horarios'][]=array("iden"=>2,"label"=>'10:00 am');
	  $datos['horarios'][]=array("iden"=>3,"label"=>'11:00 am');
	  $datos['horarios'][]=array("iden"=>4,"label"=>'12:00 am');
	  $datos['horarios'][]=array("iden"=>5,"label"=>'13:00 am');

	  $datos['estaciones']=array();
	  $datos['estaciones'][]=array("iden"=>1,"label"=>'Norte');
	  $datos['estaciones'][]=array("iden"=>2,"label"=>'Sur');
	  $datos['estaciones'][]=array("iden"=>3,"label"=>'Este');
	  $datos['estaciones'][]=array("iden"=>4,"label"=>'Oeste');

	  
	  if($r->isMethod('post')){
		$datos['asignaciones']=array();
	$datos['asignaciones'][]=array("fila"=>1,"columna"=>1,"cliente"=>'Rodrigo Felez',"tipos"=>'Normal');
	$datos['asignaciones'][]=array("fila"=>2,"columna"=>3,"cliente"=>'Pamela Velez',"tipos"=>'VIP');
	  }
	  else{
		 $boservicio=new BoServicio();
		  $objeto=new \StdClass();
		  $objeto->fecha=date('Y-m-d');
		  $datos['asignaciones']=$boservicio->obten_servicio($objeto);
	  }
	  $datos['socios']=Socio::all(); 
	  $datos['tipos']=TipoServicio::all(); 


	  return view('testvue.index')->with($datos);
}
public function prueba_axios(Request $r){
	$context=$r->all();
	$boservicio=new BoServicio();
	$objeto=new \StdClass();
	$objeto->fecha=$context['fecha'];
 	/*$datos=array();
	$datos['asignaciones']=array();
	$datos['asignaciones'][]=array("fila"=>1,"columna"=>1,"cliente"=>'Rodrigo Felez',"tipos"=>'Normal');
	$datos['asignaciones'][]=array("fila"=>2,"columna"=>3,"cliente"=>'Pamela Velez',"tipos"=>'VIP');*/
	return response()->json($boservicio->obten_servicio($objeto));
}

public function insertar_Servicio(Request $r){
         $context=$r->all();

	$objeto=new \StdClass();
	$objeto->idsocio=$context['servicio']['socio'];
	$objeto->idtiposervicio=$context['servicio']['tiposer'];
	$objeto->curp_personal=$context['servicio']['personal'];
	$objeto->placa=$context['servicio']['placa'];
	$objeto->modelo=$context['servicio']['modelo'];
	$objeto->anio=$context['servicio']['anio'];
	//$objeto->origen='WEB';';
	$objeto->idestacion=$context['servicio']['columna'];
	$objeto->idhorario=$context['servicio']['fila'];
	$objeto->fecha_servicio=$context['servicio']['fecha'];
	$boservicio=new BoServicio();
	$resultado=$boservicio->registrar_servicio($objeto);

	// dd($resultado);
	if($resultado->status=='OK'){
		$context = new \Stdclass();
		$context->num_servicio=$resultado->servicio->idservicio; 
		$context->fecha_servicio=$resultado->servicio->fecha_atencion_inicial; 
		$context->cliente=$resultado->cliente; 
		$context->tiposervicio=$resultado->tiposer; 
		$context->total=$resultado->servicio->precio; 
		Mail::to($resultado->email)->send(new ConfirmacionServicio($context));
	}

		 return response()->json($resultado);
}

public function send_mail(){

	$context = new \Stdclass();
	$context->num_servicio='2782'; 
	$context->fecha_servicio='29 de marzo del 2022'; 
	$context->cliente='Nakano Nino'; 
	Mail::to('nakanokonekomaru@gmail.com')->send(new ConfirmacionServicio($context));
}
}
