<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class BuscadorController extends Controller{
      function index(Request $r){
        $context=$r->all();
        if($r->isMethod('post')){
               $registros=DB::table('servicio')
                   ->join('personal','servicio.idpersonal','=','personal.idpersonal')
                   ->join('tipo_servicio','tipo_servicio.idtiposervicio','=','servicio.idtiposervicio')
                   ->join('socio','socio.idsocio','=','servicio.idsocio')
                   ->join('tiposocio','tiposocio.idtiposocio','=','socio.idtiposocio')
                 
                   ->select(
                            'placa'
                            ,'modelo'
                            ,'anio'
                            ,'servicio.precio'
                    ,DB::Raw('tipo_servicio.nombre_servicio as tipo_servicio')
                    ,DB::Raw('personal.nombre as personal')
                    ,DB::Raw('socio.nombre as socio')
                    ,DB::Raw('tiposocio.nombre as nomtipo'))
                   ->whereRaw("placa like '%".$context['criterio']."%' or personal.nombre like '%".$context['criterio']."%' or socio.nombre like '%".$context['criterio']."%' or fecha_creacion like '%".$context['criterio']."%' ")
                   ->get();
      //dd($registros);
                   $datos=array();
                   $datos['registros']=$registros;
                   $datos['criterio']=$context['criterio'];
        }
        else{
            $datos=array();
            $datos['registros']=array();
            $datos['criterio']='';
        }
     
        return view('buscador.index')->with($datos);

   /*
   select servicio.nombre
       ,placa
       ,modelo
       ,anio
       ,servicio.precio
       ,tipo_servicio.nombre_servicio as tipo_servicio
       ,personal.nombre as personal
from servicio
join personal on servicio.idpersonal=personal.idpersonal
join tipo_servicio on tipo_servicio.idtiposervicio=servicio.idtiposervicio
where placa like '%IU%'*/
    } 
                                  
}