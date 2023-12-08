@extends('layouts.app')

@section('icons')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
<h3> RIepilogo ordini </h3>
<table class="table">
        <thead>
            <tr>
                <th scope="row">ID </th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col"> Email
                    <i class="fa-solid fa-envelope"></i></th>
                <th scope="col"><i class="fa-solid fa-phone"></i></th>
                <th scope="col">Indirizzo <i class="fa-solid fa-location-dot"></i></th>
                <th scope="col"><i class="fa-solid fa-calendar-days"></i></th>
                <th scope="col">Dettagli</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <th scope="row"> {{ $order->id }} </th>
            <td>{{ $order->customer_name }}</td>
            <td>{{ $order->customer_surname }}</td>
            <td>{{ $order->customer_email }}</td>
            <td>{{ $order->customer_phone }}</td>
            <td>{{ $order->address }}</td>
            {{-- <td>{{ $order->getOrderDateAttribute() }}</td> --}}
            <td><a href="{{ route('admin.orders-summary.show', $order) }}">click</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
   
    
</table>


@endsection
