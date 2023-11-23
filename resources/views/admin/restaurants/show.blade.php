@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="row">

            <div class="card w-50 mx-auto">
                <img src="{{ $restaurantDetail->image ? $restaurantDetail->image : 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/310px-Placeholder_view_vector.svg.png' }}"
                    class="w-50 mx-auto card-img-top py-3" alt="...">

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
