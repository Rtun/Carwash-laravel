<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Materiaprima;
use App\Model\TipoServicio;
use App\Model\MateriaprimaxTiposervicio;

class MateriaprimaxTiposervicioController extends Controller{

	function formulario(Request $r){
        $datos=$r->all();
        $info=array();
        $materias=Materiaprima::all();
        $asignadas=MateriaprimaxTiposervicio::where('idtiposervicio',$datos['idtiposervicio'])->get();
        $tiposervicio=TipoServicio::find($datos['idtiposervicio']);
        
        for($i=0;$i<count($materias);$i++){
        	$bandera=false;
        	foreach($asignadas as $elemento){
                  if($elemento->idmateria_prima==$materias[$i]->idmateria_prima){
                  	$bandera=true;
                  }
        	}
        	$materias[$i]->asignada=$bandera;
        }

          //dd($materias);
        $info['materias']=$materias;
        $info['tiposervicio']=$tiposervicio;
        
        //dd($materias);
        return view('materiaprimaxtiposervicio.formulario')->with($info);
        
	}

	function save(Request $r){
		$datos=$r->all();
		//dd($datos);
		//borrarr todas las materias primas del tipo de servicio seleccionado
		MateriaprimaxTiposervicio::where('idtiposervicio',$datos['idtiposervicio'])->delete();
                  
               //validacion cuando no existe la materia prima
		if(isset($datos['idmateria_prima'])){

		//insertar las materias de la peticion
		foreach($datos['idmateria_prima'] as $materia){
                 $matxtip=new MateriaprimaxTiposervicio();
                 $matxtip->idmateria_prima=$materia;
                 $matxtip->idtiposervicio=$datos['idtiposervicio'];
                 $matxtip->save();
		}
		}
              return $this->formulario($r);

		
	}
}