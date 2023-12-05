<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use App\Http\Requests\Orders\OrderDataFormRequest;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Order;

class OrderController extends Controller
{


    public function orderDataForm(OrderDataFormRequest $request){
        
        $data = $request->validated();
        
        
        $dataOrder = $request['order'];
        $dishes = $dataOrder['dishes'];
        $restaurantId = $dataOrder['restaurant_id'];

        $dishIds = [];

        foreach($dishes as $dishId){
           $dishIds[] = $dishId['id'];
        }


        $dishesValidation = Dish::select('restaurant_id')->whereIn('id', $dishIds)->get();

        foreach($dishesValidation as $dishValidation){
            if($dishValidation->restaurant_id !== $restaurantId) return abort(404);
        }

        $dataValid = [
            "form" => $request['form'],
            'order' => $request['order']    
        ];
        
        
        

        
        return response()->json($dataValid);
    }



    public function saverDataForm(Request $request){
        
        $formData = $request['form'];
        $dataOrder = $request['order'];
        $dishes = $dataOrder['dishes'];


        $dishIds = [];
        $total = 0;
        
        foreach($dishes as $dish){
            $dishIds[] = $dish['id'];  
        };
    

        $dishesForPriceCalc = Dish::whereIn('id', $dishIds)->get();

        foreach($dishes as $dish){

            $dishForPriceCalc = $dishesForPriceCalc->where('id', $dish['id'])->first();

            if($dishForPriceCalc) $total += ($dish['quantity'] * $dishForPriceCalc->price);
        }

        
        $order = new Order;

        $order->customer_name = $formData['name'];
        $order->customer_surname = $formData['lastName'];
        $order->customer_phone = $formData['tel'];
        $order->address = $formData['address'];
        $order->notes = $formData['note'];
        $order->total = $total;
        

        $order->save();

        foreach($dishes as $dish){
             
            $order->dishes()->attach($dish['id'], ['quantity'=>$dish['quantity']]);
        }
        
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