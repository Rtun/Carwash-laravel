<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Model\Socio;
use App\Model\TipoSocio;
use App\Model\Servicio;

class SocioController extends Controller{

	public function socios(){
		//$socio=Socio::all();
   $socio=Socio::join('tiposocio','tiposocio.idtiposocio','=','socio.idtiposocio')
                 ->select(
                          "socio.idsocio"
                          ,"socio.nombre"
                          ,"socio.foto"
                          ,"tiposocio.idtiposocio"
                          ,"tiposocio.nombre as nom_socio"
                  )
                 ->get();
		$datos=array();
		$datos['lista']=$socio;
		return view('socio.lista')->with($datos);	
	
        }
        public function formulario(Request $r){
            $datos=$r->all(); 

        if($r->isMethod('post')){
            $operacion='Agregar';
            $socios=new Socio();
        }
        else{
            $operacion='Editar';
            $socios=Socio::find($datos['idsocio']);
        }
        $tipos=TipoSocio::all();

        //Para enviar informacion a la vista
        $informacion=array();
        $informacion['operacion']=$operacion;
        $informacion['socios']=$socios;
        $informacion['tipos']=$tipos;
        	return view('socio.formulario')->with($informacion);
        }

        public function save(Request $r){
      $datos=$r->all();
      switch ($datos['operacion']) {
          case 'Agregar':
          if($r->hasFile('foto')){
            $archivo=$r->file('foto');
            //time() es para crear un timestamp
            //getClientOriginalExtencion es para recuperar la extencion orinal del archivo
            $nombre='foto-'.time().'.'.$archivo->getClientOriginalExtension();
            //storeAs sustituye al uploaded_file
            $nombre_archivo=$archivo->storeAs('fotos',$nombre);
            //dd($nombre_archivo);
          }
          else{
            $nombre_archivo='';
          }
              $socios=new Socio();
              $socios->nombre=$datos['nombre'];
              $socios->foto=$nombre_archivo;
              $socios->idtiposocio=$datos['idtiposocio'];
              $socios->save();
              break;
               case 'Editar':
               if($r->hasFile('foto')){
            $archivo=$r->file('foto');
            $nombre='foto-'.time().'.'.$archivo->getClientOriginalExtension();
            $nombre_archivo=$archivo->storeAs('fotos',$nombre);
          }
          else{
            $nombre_archivo='';
          }
              $socios=Socio::find($datos['idsocio']);
              if($nombre_archivo!=''){  
              Storage::delete($socios->foto);
              }
              $socios->nombre=$datos['nombre'];
              if($nombre_archivo!='')
              $socios->foto=$nombre_archivo;
              $socios->save();
              break;
              case 'Eliminar':
              $socios=Socio::find($datos['idsocio']);
              $socios->delete();
              Storage::delete($socios->foto);
              break;
      }


      return $this->socios();
	}

    public function mostrar_foto($nombre_foto){
      $path = storage_path('app/fotos/'.$nombre_foto);

      if(!File::exists($path)){
        abort(404);
      }
      //recupera el contenido del archivo
      $file=File::get($path);
      //para recuperar el tipo de archivo
      $type=File::mimeType($path);
      //para devolver el archivo
      $response=Response::make($file, 200);
      $response->header("Content-Type", $type);
      return $response;
    }
    function perfil(){

      $usuario=Auth()->user();
      //recuperar el arreglo de datos del socio de acuerdo al id del usuario
      $socio=Socio::where('idusuario',$usuario->idusuario)->first();
      $tiposocio=TipoSocio::find($socio->idtiposocio);
      $informacion=array();
      $informacion['socio']=$socio;
      $informacion['usuario']=$usuario;
      $informacion['tiposocio']=$tiposocio;
      $informacion['servicios']=Servicio::where('idsocio',$socio->idsocio)->get();

      return view('auth.profile')->with($informacion);
    }


}