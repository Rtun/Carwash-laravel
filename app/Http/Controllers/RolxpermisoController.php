<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Rol;
use App\Model\RolxPermiso;
use App\Model\Permiso;

class RolxpermisoController extends Controller{

	function formulario(Request $r){
        $datos=$r->all();
        $info=array();
        $permisos=Permiso::all();
        $asignadas=RolxPermiso::where('idrol',$datos['idrol'])->get();
        $rol=Rol::find($datos['idrol']);
        
        for($i=0;$i<count($permisos);$i++){
          $bandera=false;
          foreach($asignadas as $elemento){
                  if($elemento->idpermiso==$permisos[$i]->idpermiso){
                    $bandera=true;
                  }
          }
          $permisos[$i]->asignada=$bandera;
        }

          //dd($materias);
        $info['permisos']=$permisos;
        $info['rol']=$rol;
        
        //dd($materias);
        return view('rol.rolxpermiso.formulario')->with($info);
        
  }

  function save(Request $r){
    $datos=$r->all();
    //dd($datos);
    //borrarr todas las materias primas del tipo de servicio seleccionado
    RolxPermiso::where('idrol',$datos['idrol'])->delete();
                  
               //validacion cuando no existe la materia prima
    if(isset($datos['idpermiso'])){

    //insertar las materias de la peticion
    foreach($datos['idpermiso'] as $permiso){
                 $matxtip=new RolxPermiso();
                 $matxtip->idpermiso=$permiso;
                 $matxtip->idrol=$datos['idrol'];
                 $matxtip->save();
    }
    }
              return $this->formulario($r);

    
  }

}
