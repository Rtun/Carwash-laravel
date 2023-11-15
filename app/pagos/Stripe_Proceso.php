<?php

namespace App\pagos;
require_once 'Stripe/init.php';

use Stripe\Stripe;
use Stripe\Customer;
use Stripe\ApiOperations\Create;
use Stripe\Charge;
use Stripe\HttpClient\CurlClient;
use Stripe\ApiRequestor;

use App\BussinesLogic\BoLogCheckout;

class Stripe_Proceso{
    var $objeto_stripe;

    function __construct(){
          $curl = new CurlClient([CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2]);
          ApiRequestor::setHttpClient($curl);
          $this->objeto_stripe=new Stripe();
          $this->objeto_stripe->setVerifySslCerts(false);
          $this->objeto_stripe->setApiKey('sk_test_51KhOMdCls0jBo5C1HU2Eau5GWdX4pM13mWGHAWmp1VUruoMnDrgZnyipQoMTmrkRJWCFx2mzWIOtsanLAJvcfNrc00RwaaH0NH');
    }

    function crear_customer($objeto){
          $customer = new Customer();
          $datos_C = array();
          $datos_C['email']=$objeto->email;
          $datos_C['source']=$objeto->token;
          $customerDatails = $customer->create($datos_C);
          return $customerDatails;
    }

    function enviar_pago($objeto){
        $customerResult = $this->crear_customer($objeto);
        $cargo = new Charge();
        $cardDetailsAry = array(
            'customer'=>$customerResult->id,
            'amount'=>$objeto->amount,
            'currency'=>$objeto->currency_code,
            'description'=>$objeto->producto,
            'metadata'=>array(
                'order_id'=>$objeto->item_number
            )
        );
        $result = $cargo->create($cardDetailsAry);
        $obj_result = $result->jsonSerialize();
        $resultado=new \StdClass();
        if( ($obj_result['amount_refunded'] == 0) && (empty($obj_result['failure_code'])) && ($obj_result['paid'])
        && ($obj_result['captured']) && ($obj_result['status']=='succeeded') ){
            $resultado->status='OK';
            $resultado->transaccion=$obj_result;
        }
        else {
            $resultado->status='Error';
            $result->transaccion=null;
        }
        $bo_check = new BoLogCheckout();
        $objeto_log = new \StdClass();
        $objeto_log->idservicio=$objeto->item_number;
        $objeto_log->json=json_encode($obj_result);
        $bo_check->registrar($objeto_log);


        return $resultado;
    }
}