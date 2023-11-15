<?php
use App\Model\RolxPermiso;
use App\Model\Permiso;
use App\Model\Personal;
use App\Model\Socio;

function dummy(){
    dd('llegue al helper');
}

function hoy($formato='Y-m-d H:i:s'){
    date_default_timezone_set("America/Merida");
    return date($formato);
}

function validacion_rol($idrol,$permiso){
        //$idrol=Auth()->user()->idrol;
    	$permiso_db=Permiso::where('clave',$permiso)->first();
    	$rolxpermiso=RolxPermiso::where('idrol',$idrol)->where('idpermiso',$permiso_db->idpermiso)->first();

    	if($rolxpermiso){
    	return true;	
    	}
    	else{
    		return false;    		
    	}      
}
function nombre_usuario($user){
    $nombre='Username';
    switch($user->idrol){
        case 1:
            //Gerente, tabla personal
            $personal=Personal::where('idusuario',$user->idusuario)->first();
            $nombre=$personal->nombre;
            break;
        case 2:
            //Administrativo, tabla personal
            $personal=Personal::where('idusuario',$user->idusuario)->first();
            $nombre=$personal->nombre;
            break;
        case 3:
            //personal, tabla personal
            $personal=Personal::where('idusuario',$user->idusuario)->first();
            $nombre=$personal->nombre;
            break;
        case 4:
            //socio, tabla socio
            $socio=Socio::where('idusuario',$user->idusuario)->first();
            $nombre=$socio->nombre;
            break;

    }
    return $nombre;
}
