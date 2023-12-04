<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Models\Dish;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();
        $data = [
            'succes' => true,
            'token' => $token
        ];
        return response()->json($data, 200);
    }

    public function makePayment(Request $request, Gateway $gateway)
    {

        
        $price = Dish::where('id', $request['id'])->value('price');
        
        $nonceFromTheClient = $request['payment_method_nonce'];

        $result = $gateway->transaction()->sale([
            'amount' => $price,
            'paymentMethodNonce' =>  'fake-valid-no-billing-address-nonce',
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