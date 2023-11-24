@extends('layouts.app')

@section('icons')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
 
        <div class="d-flex justify-content-between">
            <h1 class="menu-title">MENÙ</h1>
            <a class="btn btn-dark mb-3" href="{{ route('admin.dish.create') }}">Crea un prodotto</a>
        </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($dishes as $dish)
                <div class="col">
                    <div class="card dish-card {{$dish->visible ? '' : 'border-danger'}}">
                        <img src="{{ asset('/storage/' . $dish->image) }}" class="card-img-top dish-image {{$dish->image ? '' : 'd-none'}}" alt="Dish Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $dish->name }}</h5>
                            <p class="card-text">{{ $dish->getAbsDescription() }}</p>
                            <p class="card-text"><small class="fw-bold">Price: {{ $dish->price }}€</small></p>
                            <p>{!! $dish->getCourseBadge() !!}</p>
                            @if(!$dish->visible) 
                                <p class="card-text"><small class="fw-bold text-danger">Non disponibile</small></p>
                            @endif
                        </div>
                        <div class="card-footer text-center dish-icons">
                            <a href="{{ route('admin.dish.show', $dish) }}" class="me-2">
                                <i class="fas fa-eye fa-lg"></i>
                            </a>
                            <a href="{{route('admin.dish.edit', $dish)}}" class="me-2">
                                <i class="fas fa-pencil-alt fa-lg text-success"></i>
                            </a>
                            <a href="#" class="me-2">
                                <i class="fas fa-trash-alt fa-lg text-danger"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@endsection
