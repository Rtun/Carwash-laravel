<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Model\Personal;

class PersonalController extends Controller{

	public function empleados(){
		$personal=Personal::all();
		$datos=array();
		$datos['lista']=$personal;
		return view('personal.lista')->with($datos);	
		//dd($personal);
	
        }
        public function formulario(Request $r){
            $datos=$r->all(); 

        if($r->isMethod('post')){
        //Si va por post significa que va a agregar
            $operacion='Agregar';
            $personales=new Personal();
        }
        else{
        //Si va por get significa que va a modificar
            $operacion='Editar';
            $personales=Personal::find($datos['idpersonal']);
        }
        //Para enviar informacion a la vista
        $informacion=array();
        $informacion['operacion']=$operacion;
        $informacion['personales']=$personales;
        	return view('personal.formulario')->with($informacion);
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
              $personales=new Personal();
              $personales->nombre=$datos['nombre'];
              $personales->curp=$datos['curp'];
              $personales->foto=$nombre_archivo;
              $personales->idsucursal=$datos['idsucursal'];
              $personales->idusuario=$datos['idusuario'];
              $personales->save();
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
              $personales=Personal::find($datos['idpersonal']);
              if($nombre_archivo!=''){  
              Storage::delete($personales->foto);
              }
              $personales->nombre=$datos['nombre'];
              $personales->curp=$datos['curp'];
              if($nombre_archivo!='')
              $personales->foto=$nombre_archivo;
              $personales->save();
              break;
              case 'Eliminar':
              $personales=Personal::find($datos['idpersonal']);
              $personales->delete();
              Storage::delete($personales->foto);
              break;
      }


      return $this->empleados();
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


}