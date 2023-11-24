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
                                    <a href="{{route('admin.dish.edit', $dish)}}" class="me-2">
                                        <i class="fas fa-pencil-alt fa-lg"></i>
                                    </a>

                                   {{-- DELETE --}}
                                   <a href="#" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $dish->id }}"
                                    class="mx-1">
                                    <i class="fa-solid fa-trash text-danger"></i>
                                </a>
                                {{-- Delete modal --}}
                                <div class="modal fade" id="delete-modal-{{ $dish->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina ristorante</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Sei sicuro di voler eliminare la pietanza
                                                "{{ $dish->name }}"?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Annulla</button>
                                                {{-- Delete Form --}}
                                                {{-- <form action="{{route('admin.restaurant.destroy', $dish)}}" method="POST" class="mx-1"> --}}
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Conferma</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
