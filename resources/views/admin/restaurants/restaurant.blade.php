@extends('layouts.app')

@section('icons')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <h2> Dettagli ristorante </h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                
                <img src="{{$restaurantDetail->image ? asset('/storage/' . $restaurantDetail->image) : $placeholder }}" class="card-img-top" alt="Restaurant Image">
                
                
                <div class="card-body">
                    <h5 class="card-title">{{ $restaurantDetail->restaurant_name }}</h5>
                    <p class="card-text"><b>Indirizzo: </b>{{ $restaurantDetail->address }}</p>
                    <p class="card-text"><b>Tipologia: </b>{!! $restaurantDetail->getTypeBadge() !!}</p>
                    <p class="card-text {{ !$restaurantDetail->vat ? 'text-danger' : '' }}"> <b>P. Iva:</b>
                        {{ $restaurantDetail->vat ?? 'VAT non inserito' }}
                    </p>
                    <p class="card-text"> <b>Descrizione: </b>{{ $restaurantDetail->description }}</p>
                    <a href="{{ route('admin.dish.index') }}" class="btn btn-dark">Menù <i class="fa-solid fa-utensils"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
