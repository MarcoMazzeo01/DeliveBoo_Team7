<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use App\Http\Requests\Orders\OrderDataFormRequest;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Models\Dish;

class OrderController extends Controller
{


    public function orderDataForm(OrderDataFormRequest $request){
        
       
        
        $data = $request->validated();
        
        
        
        return response()->json($data);
    }



    public function saverDataForm(Request $request){

        $data = $request;

        return response()->json($data);
        
    }



    
    public function generate(Request $request, Gateway $gateway)
    {



        $token = $gateway->clientToken()->generate();
        $data = [
            'succes' => true,
            'token' => $token
        ];
        return response()->json($data, 200);
    }

    public function makePayment(OrderRequest $request, Gateway $gateway)
    {

        $_request = $request->validated();
        
        $price = Dish::where('id', $_request['id'])->value('price');
        
        $nonceFromTheClient = $_request['payment_method_nonce'];


            $result = $gateway->transaction()->sale([
                'amount' => $price,
                'paymentMethodNonce' => $nonceFromTheClient,
                'options' => [
                    'submitForSettlement' => true
                ]
            ]);


        if ($result->success) {
            $data = [
                'succes' => true,
                'message' => "Transazione eseguita"
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'succes' => false,
                'message' => "Transazione fallita"
            ];
            return response()->json($data, 401);
        }
    }
    
}