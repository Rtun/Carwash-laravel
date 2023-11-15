<?php

namespace App\BussinesLogic;
// namespace App\Bopuntos;
use App\Model\TipoServicio;
use App\Model\Servicio;
use App\Model\Horario;
use App\Model\Personal;
use App\Model\Porcentaje;
use App\Model\Puntos;
use App\Model\Sucursal;
use App\Model\Socio;
use App\Model\Usuario;
use App\Model\Puntos_socio;
use App\Model\Puntos_sucursal;
use App\BussinesLogic\BoPuntos

;


class BoServicio{

    function pagar_servicio($objeto){
        $resultado = new \StdClass();
        $servicio=Servicio::find($objeto->idservicio);
        if($servicio->status==1){
            $servicio->status=2;
            $servicio->save();
            $resultado->status='OK';
        }
        else{
            $resultado->status='Error';
        }

        return $resultado;

    }

    function obten_servicio($objeto){
        $consulta=Servicio::join('socio','socio.idsocio','=','servicio.idsocio')
                          ->join('tipo_servicio','servicio.idtiposervicio','=','tipo_servicio.idtiposervicio')
                          ->join('estacion','estacion.idestacion','=','servicio.idestacion')
                          ->join('usuario','usuario.idusuario','socio.idusuario')
                          ->select(
                              \DB::Raw("idhorario as fila")
                              ,\DB::Raw("servicio.idestacion as columna")
                              ,\DB::Raw("socio.nombre as cliente")
                              ,\DB::Raw("tipo_servicio.nombre_servicio as tipos")
                              ,\DB::Raw("DATE_FORMAT(fecha_atencion_inicial,'%Y-%m-%d %H:%i') as fecha_atencion_inicial")
                              ,"estacion.nombre as nomestacion"
                              ,"servicio.placa"
                              ,"servicio.modelo"
                              ,"servicio.anio"
                              ,"servicio.precio"
                              ,"servicio.idservicio"
                              ,"usuario.email"

                          );
        if(isset($objeto->fecha)){
            $consulta->whereRaw("DATE_FORMAT(fecha_atencion_inicial,'%Y-%m-%d')='".$objeto->fecha."'");
        }

        if(isset($objeto->idservicio)){
            $consulta->where("servicio.idservicio",$objeto->idservicio);

        }

       return $consulta->get();
    }

    function valida_horario($objeto){
        $bandera=true;
        $servicios=Servicio::where('idestacion',$objeto->idestacion)
        ->whereRaw("fecha_atencion_inicial<'".$objeto->fa_final."'and fecha_atencion_final>'".$objeto->fa_inicial."'")
        ->get();
if(count($servicios)!=0){
    $bandera=false;
}
     return $bandera;
    }
    //informacion de entrada
    /*
    1.idsocio
    2.fecha_registro(opcional)
    3.idtiposervicio
    4.idpersonal
    5.modelo
    6.placa
    7.anio
    8.origen(opcional)
    9.idestacion
    10.idhorario
    11.fecha_servicio*/
    //informacion de entrada

    //para hacer la lista anterior se recomienda hacer un excel sobre todo lo que requiere validacion

    //este metodo sirve para registrar un servicio
    function registrar_servicio($objeto){
             $resultado=new \StdClass();
             //1.-Tratamiento de la informacion de entrada
             if(!isset($objeto->fecha_registro)){
                 $objeto->fecha_registro=date('Y-m-d H:i:s');
             }
             if(!isset($objeto->origen)){
                $objeto->origen='LOCAL';
            }
            //obtener el precio a travez del tipo de servicio
             if(!isset($objeto->precio)){
                $tipo=TipoServicio::find($objeto->idtiposervicio);
               $objeto->precio=$tipo->precio;
           }
             if(!isset($objeto->fa_inicial)){
               $horario=Horario::find($objeto->idhorario);
               $objeto->fa_inicial=$objeto->fecha_servicio.' '.$horario->hora_inicial;
               $objeto->fa_final=$objeto->fecha_servicio.' '.$horario->hora_final;
           }

           if(isset($objeto->curp_personal)){
               $personal=Personal::where('curp',$objeto->curp_personal)->first();
               $objeto->idpersonal=$personal->idpersonal;
           }
             //Tratamiento de la informacion de entrada

             //2.-Validacion
             //hago la consulta para ver si hay servicios que chocan con el que quiero programar
             $bandera=$this->valida_horario($objeto);
             //si la consulta  devuelve datos significa que hay servicios que choca y por lo tanto no se puede programar
             //validacion                     
             

             //si esta disponible la estacion para el horario seleccio9nado

             //3.-Crear la informacion de salida
             if($bandera){
                //aqui se regitra la informacion en caso de que la validacion se cumpla
                
                $resultado->mensaje='';

                $servicio=new Servicio();
                $servicio->placa=$objeto->placa;
                $servicio->modelo=$objeto->modelo;
                $servicio->anio=$objeto->anio;
                $servicio->precio=$objeto->precio;
                $servicio->idpersonal=$objeto->idpersonal;
                $servicio->idsocio=$objeto->idsocio;
                $servicio->idtiposervicio=$objeto->idtiposervicio;
                $servicio->fecha_creacion=$objeto->fecha_registro;
                $servicio->fecha_atencion_inicial=$objeto->fa_inicial;
                $servicio->fecha_atencion_final=$objeto->fa_final;
                $servicio->idestacion=$objeto->idestacion;
                $servicio->idhorario=$objeto->idhorario;
                $servicio->origen=$objeto->origen;
                $servicio->status=1;
                $bopuntos= new BoPuntos();
                $resultado->puntos_socio = $bopuntos->insertar_puntos($objeto);
                $resultado->puntos_sucursales = $bopuntos->insertar_puntosucursal($objeto);
                $servicio->save();
                $resultado->status='OK';
                $resultado->servicio=$servicio;
                $socio2=Socio::find($servicio->idsocio);
                $tiposer2=TipoServicio::find($servicio->idtiposervicio);
                $usuario2=Usuario::find($socio2->idusuario);
                $resultado->cliente=$socio2->nombre;
                $resultado->tiposer=$tiposer2->nombre_servicio;
                $resultado->email=$usuario2->email;
             }
             else{
                //aqui en caso de que no se cumpla
                $resultado->status='Error';
                $resultado->mensaje='La estacio no esta disponible para el horario seleccionado';
             }
             //3.-Crear la informacion de salida


            return $resultado;
    }
}
