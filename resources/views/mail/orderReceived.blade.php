<!DOCTYPE html>
<html lang="en">
<style> 
    body {
        background: lightblue;
        text-align: center;
        font-family: 'Courier New', Courier, monospace;
    }
</style>
<body>
    
    <p> Hai ricevuto un'nuovo ordine </p>

    <div class="order-details">
        <h5>ID ordine: {{$order->id}}</h5>

        <div class="order-details card">
            <div class="card-body">
            <h5 class="card-title"><b>Articoli:</b> </h5>
            @foreach($ordersDishes as $orderDish)
            @if($orderDish->id == $order->id)
                @foreach($orderDish->dishes as $dish)
                    <p>{{$dish->pivot->quantity}} {{$dish->name}}</p>
                @endforeach
                    <hr>
                    <p><b>Totale ordine:</b> {{$order->total}}€</p>
            @endif
            @endforeach
            </div>
        </div>
            @if(empty($order->notes))
                <p><b class=green-txt>Note: </b>...</p>
            @else
                <p><b class=green-txt>Note</b>: {{$order->notes}} </p>
            @endif
            <p><i class=" green-txt fa-solid fa-map-pin"></i>  {{$order->address}}</p>
            <p><i class=" green-txt fas fa-phone"></i> {{$order->customer_phone}}</p>
            <p><i class=" green-txt fas fa-envelope"></i> {{$order->customer_email}}</p>
            <p><i class=" green-txt fa-regular fa-calendar"></i> {{$order->getOrderDate()}} <br><span><i class=" green-txt fa-regular fa-clock"></i>  {{$order->getOrderTime()}}</span> </p>
    </div>

</body>
</html>