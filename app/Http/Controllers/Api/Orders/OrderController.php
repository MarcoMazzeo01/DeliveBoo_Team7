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

        $data = $request['form'];
        $dataOrder =$request['orderCar'];
        $restaurantId = $dataOrder['restaurant_id'];



        // foreach($data['ord'])
        
        // $dishIds =[2,3,4,5];

        // $dishes = Dish::select('id')->whereIn('id', $dishIds)->pluck('id')->toArray();
        
        // $totalOrder = Dish::whereIn('id', $dishIds)->sum('price')   ;


        // $order = new Order;

        // $order->customer_name = $request['name'];
        // $order->customer_surname = $request['lastName'];
        // $order->customer_phone = $request['tel'];
        // $order->address = $request['address'];
        // $order->notes = $request['note'];
        // $order->total = $totalOrder;
        

        // $order->save();
        
        // $order->dishes()->attach($dishes);

        return response()->json($restaurantId);
        
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