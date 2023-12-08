@extends('layouts.app')

@section('icons')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
<h3> RIepilogo ordini </h3>
<table class="table">
   <!-- ... -->
   <tbody>
       @foreach($orders as $order)
       <tr>
           <th scope="row"> {{ $order->id }} </th>
           <td>{{ $order->customer_name }}</td>
           <td>{{ $order->customer_surname }}</td>
           <td>{{ $order->customer_email }}</td>
           <td>{{ $order->customer_phone }}</td>
           <td>{{ $order->address }}</td>
           <td>{{ $order->getOrderDateAttribute() }}</td>
           <td>
               <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas{{$order->id}}" aria-controls="offcanvas{{$order->id}}">Dishes</button>
               <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas{{$order->id}}" aria-labelledby="offcanvas{{$order->id}}Label">
                  <div class="offcanvas-header">
                      <h5 class="offcanvas-title" id="offcanvas{{$order->id}}Label">Order Details</h5>
                      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body">
                      <ul>
                          @foreach($ordersDishes as $orderDish)
                              @if($orderDish->id == $order->id)
                                 @foreach($orderDish->dishes as $dish)
                                     <li>{{$dish->name}} x {{$dish->pivot->quantity}}</li>
                                 @endforeach
                              @endif
                          @endforeach 
                      </ul>
                  </div>
               </div>
           </td>
       </tr>
       @endforeach
   </tbody>
</table>


@endsection
