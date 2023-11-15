<?php

namespace App\BussinesLogic;
// namespace Model\helpers;
use App\Model\TipoServicio;
use App\Model\Servicio;
use App\Model\Horario;
use App\Model\Personal;
use App\Model\Porcentaje;
use App\Model\Puntos;
use App\Model\Sucursal;
use App\Model\Socio;
use App\Model\Renta;
use App\Model\Puntos_socio;
use App\Model\Puntos_sucursal;
use App\BussinesLogic\BoServicio;


class BoPuntos{
    function insertar_puntos($objeto){
                $resultado= new \StdClass();
                $renta= Renta::where('idsocio',$objeto->idsocio)->first();
                if($renta){
                        $dia = hoy();
                        if(($dia>=$renta->fecha_inicio)&&($dia<=$renta->fecha_fin)){
                                $socio= Socio::where('idsocio',$objeto->idsocio)->first();
                                //$tiposervicio= TipoServicio::where('idtiposervicio',$objeto->idtiposervicio);
                                //$resultado->socio=$socio;
                                switch($socio->idtiposocio){
                                        case 1:
                                                switch($objeto->idtiposervicio){
                                                        case 1:
                                                                $puntos=.05;
                                                                break;
                                                        case 2:
                                                                $puntos=0;
                                                                break;
                                                        case 3:
                                                                $puntos=.1;
                                                                break;
                                                        case 4:
                                                                $puntos=.2;
                                                                break;
                                                }
                                                break;
                                        case 2:
                                                switch($objeto->idtiposervicio){
                                                        case 1:
                                                                $puntos=.1;
                                                                break;
                                                        case 2:
                                                                $puntos=0;
                                                                break;
                                                        case 3:
                                                                $puntos=.2;
                                                                break;
                                                        case 4:
                                                                $puntos=.3;
                                                                break;
                                                }
                                                break;
                                        case 3:
                                                switch($objeto->idtiposervicio){
                                                        case 1:
                                                                $puntos=.3;
                                                                break;
                                                        case 2:
                                                                $puntos=0;
                                                                break;
                                                        case 3:
                                                                $puntos=.4;
                                                                break;
                                                        case 4:
                                                                $puntos=.5;
                                                                break;
                                                }
                                                break;
                                }    
                                 
                                $total_puntos=$objeto->precio * $puntos;
                                $punto_socio=Puntos_socio::where('idsocio',$objeto->idsocio)->first();
                                if($punto_socio){
                                        $punto_socio->totals += $total_puntos;
                                }
                                else{
                                        $punto_socio= new Puntos_socio();
                                        $punto_socio->idsocio=$objeto->idsocio;
                                        $punto_socio->totals=$total_puntos;       
                                }
                                $punto_socio->save();
                                $resultado->mensaje='Puntos Guardaados';
                                
                                

                        }
                        else{
                                //$resultado->status='No esta bien';
                                $resultado->mensaje='Este usuario aun no ah pagado su mensaualidad';
                        }
        }

        return $resultado;
        // $servicio = $objeto->idsocio;
        
       
       
       
   
          
    
                // $temp = Personal::find($objeto->idpersonal);
                // $temp2 = Sucursal::where('idsucursal',$temp->idsucursal)->first();
                // $porcentaje = Porcentaje::where('fkSucursal',$temp2->idsucursal)->first()->porcentaje;
                // $precio = $servicio->precio * $porcentaje;
                // $puntos = new Puntos();
                // $puntos->fksucursal=$temp2->idsucursal;
                // $puntos->fksocio=$servicio->idsocio;
                // $puntos->puntos=$precio;
                // $puntos->save();
     }

     function insertar_puntosucursal($objeto){
        $resultado= new \StdClass();
             

          if($objeto->idtiposervicio == 4){

                //$socio= Socio::find($objeto->idsocio);

                $personal = Personal::where('idpersonal',$objeto->idpersonal)->first();

                $sucursal = Sucursal::where('idsucursal',$personal->idsucursal)->first();

                $porcentaje = Porcentaje::where('fkSucursal',$sucursal->idsucursal)->first()->porcentaje;
                 
                $puntos=Puntos_sucursal::where('fksucursal',$sucursal->idsucursal)->first();
                
                

                $puntos_total = $objeto->precio * $porcentaje;

                if($puntos){
                        $puntos->puntos=$puntos->puntos + $puntos_total;   
                }
                else{
                        $puntos = new Puntos_sucursal();
                        $puntos->fksucursal=$sucursal->idsucursal;
                        $puntos->puntos=$puntos_total;
                }

                $resultado->sucursal = $puntos;
                
                // dd($puntos);
                $puntos->save();
        }
        return $resultado;
     }
}