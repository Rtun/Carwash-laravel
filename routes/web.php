<?php
header('Access-Control-Allow-Origin: *');
header('Acess-Control-Allow-Methods: POST, GET, OPTIONS, PUT,DELETE');
header('Access-Control-Allow-Headers: Content-Type,X-Auth-Token,Origin,Authorization');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 
Route::get('/helper',function(){
    dd(dummy());
});
//Route::group(['middleware'=>['web']],function({//}))
  Route::group(['middleware' =>'auth'], function(){

    //buscador
    Route::match(array('GET','POST'),'/buscador','BuscadorController@index')->middleware('candado2:BUSCADOR');
   //buscador

    //Servicio
   Route::get('servicios/listado','ServicioController@listado')->middleware('candado2:SERVICIO');
   //Route::post('servicios/formulario','ServicioController@formulario');
   Route::match(array('GET','POST'),'servicios/formulario','ServicioController@formulario')->middleware('candado2:SERVICIO');
   Route::post('servicios/save','ServicioController@save')->middleware('candado2:SERVICIO');
    
    //Sucursal
   Route::get('sucursales/sucursal','SucursalController@sucursal')->middleware('candado2:SUCURSAL');
   //Route::get('/formulario','SucursalController@formulario');
   Route::match(array('GET','POST'),'/formulario','SucursalController@formulario')->middleware('candado2:SUCURSAL');
   Route::post('/save','SucursalController@save')->middleware('candado2:SUCURSAL');
   //sucursal

   //Personal
   Route::get('/personal/empleados','PersonalController@empleados')->middleware('candado2:PERSONAL');
   Route::match(array('GET','POST'),'personal/formulario','PersonalController@formulario')->middleware('candado2:PERSONAL');
   Route::post('personal/save','PersonalController@save')->middleware('candado2:PERSONAL');

   //foto del personal
   Route::get('fotos/{nombre_foto}','PersonalController@mostrar_foto');
   //foto del personal

   //Socios
   Route::get('/socios/lista','SocioController@socios')->middleware('candado2:SOCIO');
   Route::match(array('GET','POST'),'/socios/formulario','SocioController@formulario')->middleware('candado2:SOCIO');
   Route::post('/socios/save','SocioController@save')->middleware('candado2:SOCIO');
   //Socios

   //foto del socio
   Route::get('fotos/{nombre_foto}','SocioController@mostrar_foto');
   //foto del socio

   //Tipo Socio
   Route::get('/tiposocios/lista','TiposocioController@listado')->middleware('candado2:TIPOSOCIO');
   Route::match(array('GET','POST'),'/tiposocios/formulario','TiposocioController@formulario')->middleware('candado2:TIPOSOCIO');
   Route::post('/tiposocios/save','TiposocioController@save')->middleware('candado2:TIPOSOCIO');
   //Tipo Socio

   //rentas
   Route::get('/rentas/lista','RentaController@renta')->middleware('candado2:RENTAS');
   Route::match(array('GET','POST'),'/rentas/formulario','RentaController@formulario')->middleware('candado2:RENTAS');
   Route::post('/rentas/save','RentaController@save')->middleware('candado2:RENTAS');
   //rentas

   //tiposervicio
   Route::get('/tiposervicio/lista','TiposervicioController@lista')->middleware('candado2:TIPOSERVICIO');
   Route::match(array('GET','POST'),'/tiposervicio/formulario','TiposervicioController@formulario')->middleware('candado2:TIPOSERVICIO');
   Route::post('/tiposervicio/save','TiposervicioController@save')->middleware('candado2:TIPOSERVICIO');
   //tiposervicio

   //MateriaprimaxTiposervicio
   Route::get('/tiposervicio/materia_prima','MateriaprimaxTiposervicioController@formulario')->middleware('candado2:MATERIAS');
   Route::post('/tiposervicio/materia_prima/save','MateriaprimaxTiposervicioController@save')->middleware('candado2:MATERIAS');
   //MateriaprimaxTiposervicio

   //rol
   Route::get('/roles/lista','RolController@lista')->middleware('candado2:ROLES');
   Route::match(array('GET','POST'),'/roles/formulario','RolController@formulario')->middleware('candado2:ROLES');
   Route::post('/roles/save','RolController@save')->middleware('candado2:ROLES');
   Route::get('/rol/permisos','RolxpermisoController@formulario')->middleware('candado2:ROLES');
   Route::post('/rol/permisos/save','RolxpermisoController@save')->middleware('candado2:ROLES');
   //rol

   //permisos
   Route::get('/permisos/lista','PermisoController@lista')->middleware('candado2:PERMISOS');
   Route::match(array('GET','POST'),'/permisos/formulario','PermisoController@formulario')->middleware('candado2:PERMISOS');
   Route::post('/permisos/save','PermisoController@save')->middleware('candado2:PERMISOS');
   //permisos
   
   //permisos
   Route::get('/materias/lista','MateriaPrimaController@lista')->middleware('candado2:MATERIAS');
   Route::match(array('GET','POST'),'/materias/formulario','MateriaPrimaController@formulario')->middleware('candado2:MATERIAS');
   Route::post('/materias/save','MateriaPrimaController@save')->middleware('candado2:MATERIAS');
   //permisos
   
   //estaciones
   Route::get('/estaciones/lista','EstacionController@lista')->middleware('candado2:ESTACIONES');
   Route::match(array('GET','POST'),'/estaciones/formulario','EstacionController@formulario')->middleware('candado2:ESTACIONES');
   Route::post('/estaciones/save','EstacionController@save')->middleware('candado2:ESTACIONES');
   //estaciones
   
   //horarios
   Route::get('/horarios/lista','HorarioController@lista')->middleware('candado2:HORARIOS');
   Route::match(array('GET','POST'),'/horarios/formulario','HorarioController@formulario')->middleware('candado2:HORARIOS');
   Route::post('/horarios/save','HorarioController@save')->middleware('candado2:HORARIOS');
   //horarios
   
   //bussines object
   Route::get('/prueba_bo','DemoController@prueba_bo')->middleware('candado2:RESERVARSERVICIO');
   Route::match(array('GET','POST'),'/servicios_bo/formulario','DemoController@formulario')->middleware('candado2:RESERVARSERVICIO');
   Route::post('/servicios_bo/save','DemoController@save')->middleware('candado2:RESERVARSERVICIO');
   //bussines object

   //registro
   Route::get('usuarios/lista','UsuarioController@lista')->middleware('candado2:USUARIOS');     
   Route::match(array('GET','POST'),'/usuarios/registro', 'Auth\RegisterController@formulario_registro')->middleware('candado2:USUARIOS');
   Route::post('/usuarios/save', 'Auth\RegisterController@register')->middleware('candado2:USUARIOS');
   //registro
   

  Route::get('/sinpermiso',function(){
    dd('No tiene el Permiso');
  }); 
  Route::get('/cerrar_session',function(){
      auth()->logout();
      return redirect('/');
  })->name('salir');

  //email
  Route::get('/prueba/email','DemoController@send_mail');
  //email

  //pagos
  Route::match(array('GET','POST'),'/pagos/ventanilla','PagoController@ventanilla');
  Route::post('/pago/proceso', 'PagoController@realizar_pago');
  //pagos
});

   
   //dbup faker
   Route::get('/dbup/personal','DbUpController@personal');
   Route::get('/dbup/servicio','DbUpController@servicio');
   Route::get('/dbup/fechas','DbUpController@servicio_fechas');
   Route::get('/dbup/servicio_bo','DbUpController@servicio_bo');
   //dbup faker


   

   

    //Route::match(array('GET','POST'),'/buscador','DemoController@prueba');


    Route::get('/template', function(){
        return view('app.master');
    });
    //Autoregistro
    Route::get('/registro',function(){
        return view('auth.autoregistro');
    });
    //Auto registro

  
    //rutas de prueba login
    Route::get('/socio/bienvenido','SocioController@perfil');


    Route::get('/gerente/bienvenido',function(){
        dd('Gerente bienvenido');
    });

    Route::get('/personal/bienvenido',function(){
        dd('Personal bienvenido');
    });
     //rutas de prueba login 


//login
Route::get('/manage','Auth\LoginController@showLoginForm')->name('login');
Route::get('/','Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login');
//login
 

 Route::get('/home2',function(){
     return view('auth.profile');
 });

   //Auth::routes(); 

    
   Route::get('/home','HomeController@index');
  //pruebas vue
   Route::match(array('GET','POST'),'/vue', 'DemoController@prueba_vue');
   Route::match(array('GET','POST'),'/axios', 'DemoController@prueba_axios');
   Route::match(array('GET','POST'),'/insertar_Servicio', 'DemoController@insertar_Servicio');
//pruebas vue


       


	
