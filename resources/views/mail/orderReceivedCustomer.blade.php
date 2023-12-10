<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: rgb(230, 196, 195);
            font-family: 'Courier New', Courier, monospace;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        .order-details,
        .customer-info {
            margin-top: 20px;
        }

        .order-body {
            border-top: 1px solid #ccc;
            padding-top: 10px;
            margin-top: 10px;
        }

        .dishes p {
            margin: 5px 0;
        }

        .green-txt {
            color: green;
        }
    </style>
</head>

<body>

    <div class="container">

        <h2>Dettagli ordine </h2>

        <div class="order-details">

            <div class="order-body">
                <h4 class="order-title"><b>Articoli:</b> </h4>
                <h5><b>ID ordine: {{ $order->id }}</b></h5>
                <div class="dishes">
                    @foreach ($dishes as $dish)
                        <p>{{ $dish->pivot->quantity }} {{ $dish->name }}</p>
                    @endforeach
                </div>
                <p><b>Totale ordine:</b> {{ $order->total }}€</p>
            </div>

        </div>

        <div class="customer-info">

            <h3>Le tue informazioni:</h3>

            @if (empty($order->notes))
                <p><b class="green-txt">Note: </b>...</p>
            @else
                <p><b class="green-txt">Note</b>: {{ $order->notes }} </p>
            @endif
            <p><b>Indirizzo:</b> {{ $order->address }}</p>
            <p><b>N° cell:</b> {{ $order->customer_phone }}</p>
            <p><b>E-mail:</b> {{ $order->customer_email }}</p>
            <p><b>Data:</b> {{ $order->getOrderDate() }} <br><span><b>Ora:</b>{{ $order->getOrderTime() }}</span></p>

        </div>

    </div>

</body>

</html>
