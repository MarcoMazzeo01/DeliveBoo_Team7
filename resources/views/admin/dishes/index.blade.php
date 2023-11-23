@extends('layouts.app')

@section('icons')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
<div class="d-flex justify-content-between">
    <h3> Menù <h3>
        <a class="btn btn-dark mb-3" href="{{ route('admin.dish.create') }}">Crea un prodotto</a>
</div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($dishes as $dish)
                <div class="col">
                    <div class="card {{$dish->visible ? '' : 'border-danger'}}">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('/storage/' . $dish->image) }}" class="img-fluid rounded-start" alt="Dish Image">
                                <div class="icons d-flex justify-content-center mt-3">
                                    <a href="{{ route('admin.dish.show', $dish) }}" class="me-2">
                                        <i class="fas fa-eye fa-lg"></i>
                                    </a>
                                    <a href="#" class="me-2">
                                        <i class="fas fa-pencil-alt fa-lg"></i>
                                    </a>
                                    <a href="#" class="me-2">
                                        <i class="fas fa-trash-alt fa-lg"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $dish->name }}</h5>
                                    <p class="card-text">{{ $dish->getAbsDescription() }}</p>
                                    <p class="card-text"><small class="fw-bold">Price: {{ $dish->price }}€</small></p>
                                    <p>{!! $dish->getCourseBadge() !!}</p>
                                    @if(!$dish->visible) 
                                        <p class="card-text"><small class="fw-bold text-danger">Non disponibile</small></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
