<!DOCTYPE html>
<html lang="en">
<style> 
    body {
        background: rgb(230, 196, 195);
        font-family: 'Courier New', Courier, monospace;
    }
</style>
<body>
    
<h2>Dettagli ordine </h5>
    <div class="order-details">
        <div class="order-body">
            <h4 class="order-title"><b>Articoli:</b> </h4>
            <h5><b>ID ordine: {{$order->id}}</h5>
        <div class="dishes">
            {{-- @foreach ($order->dishes as $dish)
            <p> {{$dish->pivot->quantity}} {{$dish->name}}</p>
            @endforeach --}}
        </div>
        <p><b>Totale ordine:</b> {{$order->total}}€</p>
    </div>
</div>
<div class="customer-info">
    <h3> Le tue informazioni:  </h3>
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