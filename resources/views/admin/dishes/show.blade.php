@extends('layouts.app')

@section('content')
        <div class="row mb-4">
            <div class="col">
                <h1 class="menu-title">Dettagli piatto</h1>
            </div>
            <div class="col text-end">
                <a class="btn btn-dark" href="{{ route('admin.dish.index') }}">Torna al menù</a>
            </div>
        </div>

        <div class="card bg-light {{$dishDetail->visible ? '' : 'border-danger'}} custom-card">
            <div class="row g-0">
                
                <img src="{{ $dishDetail->image ? asset('/storage/' . $dishDetail->image) : $placeholder}}" class="img-fluid rounded-start" alt="Dish Image">
                
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title">{{ $dishDetail->name }}</h3>
                        <p class="card-text">{{ $dishDetail->description }}</p>
                        <p class="card-text"><small class="fw-bold">Prezzo: {{ $dishDetail->price }}€</small></p>
                        <p>{!! $dishDetail->getCourseBadge() !!}</p>
                        @if(!$dishDetail->visible) 
                            <p class="card-text"><small class="fw-bold text-danger">Non disponibile</small></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

@endsection
