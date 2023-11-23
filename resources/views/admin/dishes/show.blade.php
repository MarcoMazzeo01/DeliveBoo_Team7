@extends('layouts.app')

@section('content')


<div class="container mt-5">
  <a class="btn btn-primary" href="{{route('admin.dish.index')}}">Torna al menù</a>
    <div class="card {{$dishDetail->visible ? '' : 'border-danger'}} border-2" >
        <img src="{{asset('/storage/' . $dishDetail->image)}}" class="card-img-top py-3" alt="...">
        
        <div class="card-body">
          <h5 class="card-title">{{$dishDetail->name}}</h5>
          <p class="card-text">{{$dishDetail->description}}</p>
          <p class="card-text"><small class="fw-bold">Price: {{$dishDetail->price}}€</small></p>
          <p>{!!$dishDetail->getCourseBadge()!!}</p>
          @if(!$dishDetail->visible) 
              <p class="card-text"><small class="fw-bold text-danger">Non disponibile</small></p>
          @endif
      </div>
</div>




@endsection