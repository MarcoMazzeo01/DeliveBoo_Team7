
@extends('layouts.app')

@section('icons')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
{{-- {{dd($order)}} --}}



<div class="order-details col-4">
    <p class="order">ID: {{$order->id}}</p>
    <p class="order">Nome: {{$order->customer_name}}</p>
    <p class="order">Cognome: {{$order->customer_surname}}</p>
    <p class="order">Data: <p> Ora: </p>
 </div>
 
 @endsection