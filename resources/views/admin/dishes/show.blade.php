@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
  <h3>Dettagli piatto </h3>
    <a class="btn btn-dark mb-3" href="{{ route('admin.dish.index') }}">Torna al menù</a>
</div>
    <div class="card {{$dishDetail->visible ? 'bg-light' : 'border-danger'}}">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('/storage/' . $dishDetail->image) }}">  
                  
            </div>
            <div class="col-md-8">
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
