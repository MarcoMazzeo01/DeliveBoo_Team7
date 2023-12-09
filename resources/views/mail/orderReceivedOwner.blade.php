<!DOCTYPE html>
<html lang="en">
<style> 
    body {
        background: rgb(209, 233, 241);
        font-family: 'Courier New', Courier, monospace;
    }
</style>
<body>

<h3>Hai ricevuto un nuovo ordine!</h3>


<div class="order-details">
    
<h5>ID ordine: {{$order->id}}</h5>

<div class="order-details">
    <div class="order-body">
        <h5 class="order-title"><b>Articoli:</b> </h5>
        <div class="dishes">
            {{-- @foreach ($order->dishes as $dish)
            <p> {{$dish->pivot->quantity}} {{$dish->name}}</p>
            @endforeach --}}

            </p>
        </div>
        <p><b>Totale ordine:</b> {{$order->total}}€</p>
    </div>
</div>
<div class="customer-info">
    <h3> informazioni del cliente </h3>
    @if(empty($order->notes))
        <p><b class=green-txt>Note: </b>...</p>
    @else
        <p><b class=green-txt>Note</b>: {{$order->notes}} </p>
    @endif
    <p> <b>Indirizzo:</b> {{$order->address}}</p>
    <p> <b>N° cell:</b> {{$order->customer_phone}}</p>
    <p> <b>E-mail:</b> {{$order->customer_email}}</p>
    <p> <b>Data:</b> {{$order->getOrderDate()}} <br><span>  <b>Ora:</b>{{$order->getOrderTime()}}</span> </p>
</div>


</body>
</html>