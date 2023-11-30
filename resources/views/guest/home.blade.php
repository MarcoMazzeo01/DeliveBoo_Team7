@extends('layouts.app')

@section('icons')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <section class="container mt-5 text-center">
        <h1>Deliveboo, piattaforma leader nelle consegne a domicilio</h1>
        <h2>Non sei ancora nostro partner? Registrati ora</h2>
        <a class="btn fw-bold custom_button" href="{{ route('register') }}">{{ __('Inizia') }}</a>
        <div class="d-flex justify-content-start">
            <img class="img-fluid animation-img"
                src="https://static.vecteezy.com/system/resources/previews/017/111/929/original/express-delivery-social-media-post-scooter-delivery-online-delivery-service-or-bike-and-home-delivery-ads-or-icon-free-vector.jpg"
                alt="">
        </div>

    </section>
@endsection
