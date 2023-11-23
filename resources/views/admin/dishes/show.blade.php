@extends('layouts.app')

@section('content')
  <div class="container d-flex justify-content-between">
    <h3>Dettaglio piatto </h3>
    <a class="btn btn-dark mb-3" href="{{ route('admin.dish.index') }}">Torna al menù</a>
  </div>
    <div class="card {{$dishDetail->visible ? 'bg-light' : 'border-danger'}}">
        <div class="row g-0">
            <div class="col-6">
                <img src="{{ $dishDetail->image ? $dishDetail->image : 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/310px-Placeholder_view_vector.svg.png' }}" class="card-img-top py-3" alt="Dish Image">
            </div>
            <div class="col-6">
                <div class="card-body">
                    <h5 class="card-title">{{ $dishDetail->name }}</h5>
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
