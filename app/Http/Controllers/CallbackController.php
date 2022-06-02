<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogCallbackMidtrans;
use App\Models\Order;

class CallbackController extends Controller
{
    public function Midtrans(){
        $jsonResult = file_get_contents('php://input');
        // $result = json_decode($json_result, true);
        $response = [];
        //    $jsonResult = '{
        //   "transaction_time": "2022-05-22 18:16:20",
        //   "transaction_status": "capture",
        //   "transaction_id": "ef5f9b16-d1c3-4ec6-a8c0-00a3af5a1e4b",
        //   "status_message": "midtrans payment notification",
        //   "status_code": "200",
        //   "signature_key": "8c19d64e179514de10555c3ff7ef1ae66a23e37ed8cd0e6ac707c80e73e733bdcdea7ea1e499d3a3b0f640fa5063b5d542842a22bf39313f64c857fde462d14a",
        //   "payment_type": "credit_card",
        //   "order_id": "13",
        //   "merchant_id": "G806312653",
        //   "masked_card": "481111-1114",
        //   "gross_amount": "80000.00",
        //   "fraud_status": "accept",
        //   "eci": "05",
        //   "currency": "IDR",
        //   "channel_response_message": "Approved",
        //   "channel_response_code": "00",
        //   "card_type": "credit",
        //   "bank": "cimb",
        //   "approval_code": "1653218188750"
        // }';
        $result = json_decode($jsonResult, true);
        if(is_array($result) && count($result) > 0){
            $response = $this->proses($result);
            $log = new LogCallbackMidtrans();
            $log->callback = json_encode($result);
            $log->response = $response;
            $log->save();
            
        }
        return $response;
    }

    public function proses($result){
        $errcode = 0;
        $errmessage = '';
        $response = [];
        try { 
            $orderId = $result['order_id'];
            $transactionStatus = $result['transaction_status'];
            if($transactionStatus == 'capture'){
                $orderModel = Order::find($orderId);
                $orderModel->status = 1;
                $orderModel->save();
            }
            $response = ['orderId'=>$orderModel->id, 'status'=>$orderModel->status];
        } catch (Exception $th) {
            $errcode = 1;
            $errmessage = $th->getMessage();
        }
        $return = [
            'errcode' => $errcode,
            'errmessage' => $errmessage,
            'result' => $response,
        ];
        return json_encode($return);
    }
}
