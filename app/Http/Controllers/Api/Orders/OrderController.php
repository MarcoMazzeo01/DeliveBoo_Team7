<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use App\Http\Requests\Orders\OrderDataFormRequest;
use App\Mail\OrderReceived;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{


    public function orderDataForm(OrderDataFormRequest $request)
    {

        $request->validated();
        $dataOrder = $request['order'];
        $dishes = $dataOrder['dishes'];
        $restaurantId = $dataOrder['restaurant_id'];

        $dishIds = [];

        foreach ($dishes as $dishId) {
            if ($restaurantId !== $dataOrder['restaurant_id'])
                return abort(404);
            $dishIds[] = $dishId['id'];
        }


        $dishesValidation = Dish::select('restaurant_id')->whereIn('id', $dishIds)->get();

        foreach ($dishesValidation as $dishValidation) {
            if ($dishValidation->restaurant_id !== $restaurantId)
                return abort(404);
        }

        $dataValid = [
            "form" => $request['form'],
            'order' => $request['order']
        ];

        return response()->json($dataValid);
    }



    public function saveDataForm(Request $request)
    {
        if (!isset($request['form']) || !is_array($request['form'])) {
            return response()->json(['error' => 'Form data is not set or is not an array'], 400);
        }

        if (!isset($request['order']) || !is_array($request['order'])) {
            return response()->json(['error' => 'Order data is not set or is not an array'], 400);
        }

        if (!isset($request['order']['dishes']) || !is_array($request['order']['dishes'])) {
            return response()->json(['error' => 'Dishes data is not set or is not an array'], 400);
        }

        $formData = $request['form'];
        $dataOrder = $request['order'];
        $dishes = $dataOrder['dishes'];

        $dishIds = [];
        $total = 0;

        foreach ($dishes as $dish) {
            if (!isset($dish['id']) || !isset($dish['qty'])) {
                return response()->json(['error' => 'Dish id or quantity is not set'], 400);
            }

            $dishIds[] = $dish['id'];
        }

        $dishesForPriceCalc = Dish::whereIn('id', $dishIds)->get();

        foreach ($dishes as $dish) {
            $dishForPriceCalc = $dishesForPriceCalc->where('id', $dish['id'])->first();

            if ($dishForPriceCalc) {
                $total += ($dish['qty'] * $dishForPriceCalc->price);
            }
        }


        $order = new Order;
        $order->customer_name = $formData['name'];
        $order->customer_surname = $formData['lastName'];
        $order->customer_phone = $formData['tel'];
        $order->address = $formData['address'];
        $order->notes = $formData['note'];
        $order->customer_email = $formData['email'];
        $order->total = $total;

        $order->save();

        $orderId = $order->id;

        foreach ($dishes as $dish) {
            $order->dishes()->attach($dish['id'], ['quantity' => $dish['qty']]);
        }

        $orderWithDishes = Order::with('dishes')->find($orderId);

        $user_email = User::where('id', $dataOrder['restaurant_id'])->value('email');
        // Mail::to($user_email)->send(new OrderReceived($order, 'owner'));
        // Mail::to($order->customer_email)->send(new OrderReceived($order, 'customer'));
        Mail::to($user_email)->send(new OrderReceived($orderWithDishes, 'owner'));
        Mail::to($order->customer_email)->send(new OrderReceived($orderWithDishes, 'customer'));
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

        $request->validated();

        $total = 0;

        $prova = $request['order'];

        foreach ($prova['dishes'] as $dish) {
            $dishEl = Dish::find($dish['id']);

            $total += ($dishEl->price * $dish['qty']);

        }

        $nonceFromTheClient = $request['payment_method_nonce'];


        $result = $gateway->transaction()->sale([
            'amount' => $total,
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