@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="card w-50 mx-auto">
                <img src="{{ asset('/storage/' . $restaurantDetail->image) }}" class="w-50 mx-auto card-img-top py-3"
                    alt="...">

                <div class="card-body">
                    <h5 class="card-title">{{ $restaurantDetail->restaurant_name }}</h5>
                    <div class="card-text fw-bold">{{ $restaurantDetail->address }}</div>
                    <div class="card-text fw-bold {{ !$restaurantDetail->vat ? 'text-danger' : '' }}">
                        {{ $restaurantDetail->vat ?? 'VAT non inserito' }}</div>
                    <p class="card-text">{{ $restaurantDetail->description }}</p>
                    <a href="{{ route('admin.dish.index') }}" class="btn btn-primary">Vai al menù</a>

                </div>
            </div>
        </div>
    </div>
@endsection
