<?php
namespace App\Http\Controllers;
use Uluminate\Suport\Facades\DB;
use Iluminate\Http\Request;
use App\Model\Personal;
use App\Model\Servicio;
use App\Model\Sucursal;
use App\Model\TipoServicio;
use App\Model\Socio;
use App\Model\Horario;
use App\Model\Estacion;
use App\BussinesLogic\BoServicio;


use Faker\Factory as Faker;

class DbUpController extends Controller{
	public function personal(){
		$faker = Faker::create();
		$sucursales=Sucursal::all();
		for($i=1;$i<=50;$i++){
			$personal=new Personal();
			$personal->nombre=$faker->name.' '.$faker->lastname;
			$personal->curp=$faker->regexify('{[A-Z0-9]}{10}');
            $personal->foto='';
			$personal->idsucursal=$sucursales->random()->idsucursal;
			$personal->save();


		}
	}
	public function servicio(){
		$faker = Faker::create();
        $modelos=array('Ford','Dodge','Mercedez-Benz','BMW','Nissan','Chevrolet','Honda','Volkswagen');


		$personales=Personal::all();
		$tservicio=TipoServicio::all();
		//$sucursales=Sucursal::all();
		/*nombre
		placa
		modelo
		anio
		precio
		idpersonal
		idtiposervicio*/
		for($i=1;$i<=100;$i++){
			$tservicios=$tservicio->random();

			$services=new Servicio();
			$services->nombre=$faker->name.' '.$faker->lastname;
			$services->placa=$faker->regexify('K([A-Z]){2}-([0-9]){4}');
            $services->modelo=$faker->randomElement($modelos);
            $services->anio=$faker->numberBetween(2015,2021);
            $services->precio=$tservicios->precio;
			$services->idpersonal=$personales->random()->idpersonal;
			$services->idtiposervicio=$tservicios->idtiposervicio;
			//echo $services;
			$services->save();
	}
}

        public function servicio_fechas(){
        	$faker = Faker::create();
        	//faker para poblar el campo id socio con uno de los socios 
        	$socios=Socio::all();
        	$servicios=Servicio::all();
        	$personal=Personal::all();
        	foreach($servicios as $servicio){

        		//fecha entre hoy y 6 meses atras
        		$servicio->fecha_creacion=$faker->dateTimeBetween($startDate = '-6 month', $endDate = 'now');
        		$dias_referencia=$faker->numberBetween(1,5);
        		//fecha de atencion es una fecha N dias despues despues de la fecha de registro donde N es un numero aleatorio entre 1 y 5
        		$servicio->fecha_atencion=date('Y-m-d',strtotime($servicio->fecha_creacion->format('Y-m-d')."+".$dias_referencia."day"));
        		$servicio->save();
        	}
        }
		public function servicio_bo(){
			$boservicio=new BoServicio();
			$faker = Faker::create();
			$modelos=array('Ford','Tesla','Mercedez-Benz','Nissa','BMW','Chevrolet','Mazda','Honda');
			$tipos=TipoServicio::all();
			$personales=Personal::all();
			$origenes=array('WEB','LOCAL','APP');
			$socios=Socio::all();
			$estaciones=Estacion::all();
			$horarios=Horario::all();

			$contador=1;
			while($contador<=100){

				$x=new \StdClass();
				$x->idsocio=$socios->random()->idsocio;
				$x->idtiposervicio=$tipos->random()->idtiposervicio;
				$x->idpersonal=$personales->random()->idpersonal;
				$x->placa=$faker->regexify('Y([A-Z]){2}-([0-9]){4}');
				$x->modelo=$faker->randomElement($modelos);
				$x->anio=$faker->numberBetween(2018,2021);
				$x->origen=$faker->randomElement($origenes);
				$x->idestacion=$estaciones->random()->idestacion;
				$x->idhorario=$horarios->random()->idhorario;

				$x->fecha_registro=$faker->dateTimeBetween($startDate = '-4 month',$endDate = 'now');
				$dias_diferencia=$faker->numberBetween(1,5);
				$x->fecha_servicio= date('Y-m-d', strtotime($x->fecha_registro->format('Y-m-d') . "+".$dias_diferencia."day"));

				$y=$boservicio->registrar_servicio($x);
				if($y->status=='OK'){
					$contador++;
				}

			}
		}
}