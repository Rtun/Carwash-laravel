<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\BussinesLogic\BoServicio;
use App\pagos\Stripe_Proceso;
use App\Model\Usuario;


class PagoController extends Controller{
      
     function ventanilla(Request $r){
         $vista=array();
         if($r->isMethod('post')){
              $context=$r->all();
              $bo_servicio=new BoServicio();
              $data=new \StdClass();
              $data->idservicio=$context['idservicio'];
              $vista['servicio']=$bo_servicio->obten_servicio($data)[0];
         }
         return view('pagos.ventanilla')->with($vista);
     }

     public function realizar_pago(Request $r){
             $context=$r->all();
             $boser=new BoServicio();
             $data=new \StdClass();
             $data->idservicio=$context['idservicio'];
             $servicio=$boser->obten_servicio($data)[0];

             $stripe=new Stripe_Proceso();
             $objeto_pago=new \StdClass();
             $objeto_pago->amount=$servicio->precio*100;
             $objeto_pago->currency_code='MXN';
             $objeto_pago->producto=$servicio->tipos;
             $objeto_pago->email=$servicio->email;
             $objeto_pago->token=$context['token_stripe'];
             $objeto_pago->item_number=$context['idservicio'];
             $stripeResponse = $stripe->enviar_pago($objeto_pago);
             if($stripeResponse->status='OK'){
                  $objeto_status = new \StdClass();
                  $objeto_status->idservicio=$context['idservicio'];
                  $res_status=$boser->pagar_servicio($objeto_status); 
             }
             //dd($stripeResponse);
             return response()->json($stripeResponse);
     }

}