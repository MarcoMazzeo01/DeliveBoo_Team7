@extends('layouts.app')

@section('icons')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1 class="menu-title" style="color: #3a970f">MENÙ</h1>

        <div>
            <a class="btn me-2 mb-3 custom_button" href="{{ route('admin.dish.create') }}">Crea un
                Piatto</a>
            <a class="btn mb-3 custom_button" href="{{ route('admin.restaurant') }}">Torna
                al
                ristorante</a>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">

        @foreach ($dishes as $dish)
            <div class="col">
                <div class="card dish-card {{ $dish->visible ? '' : 'border-danger' }}">


                    <img src="{{ $dish->image ? asset('/storage/' . $dish->image) : $placeholder }}"
                        class="card-img-top dish-image" alt="Dish Image">


                    <div class="card-body">
                        <h5 class="card-title">{{ $dish->name }}</h5>
                        <p class="card-text">{{ $dish->getAbsDescription() }}</p>
                        <p class="card-text"><small class="fw-bold">Price: {{ $dish->price }}€</small></p>
                        <p>{!! $dish->getCourseBadge() !!}</p>
                        @if (!$dish->visible)
                            <p class="card-text"><small class="fw-bold text-danger">Non disponibile</small></p>
                        @endif
                    </div>
                    <div class="card-footer text-center dish-icons">
                        <a href="{{ route('admin.dish.show', $dish) }}" class="me-2">
                            <i class="fas fa-eye fa-lg"></i>
                        </a>
                        <a href="{{ route('admin.dish.edit', $dish) }}" class="me-2">
                            <i class="fas fa-pencil-alt fa-lg text-success"></i>
                        </a>

                        {{-- DELETE --}}
                        <a href="#" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $dish->id }}"
                            class="mx-1">
                            <i class="fas fa-trash-alt fa-lg text-danger"></i>
                        </a>
                        {{-- Delete modal --}}
                        <div class="modal fade" id="delete-modal-{{ $dish->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina piatto</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Sei sicuro di voler eliminare
                                        "{{ $dish->name }}"?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Annulla</button>
                                        {{-- Delete Form --}}
                                        <form action="{{ route('admin.dish.destroy', $dish) }}" method="POST"
                                            class="mx-1">
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
            </div>
        @endforeach
    </div>
@endsection
