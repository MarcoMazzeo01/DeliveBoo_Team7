@extends('layouts.app')

@section('content')


<div class="container mt-5">
  <a class="btn btn-primary" href="{{route('admin.dish.index')}}">Torna al menù</a>
    <div class="card border-danger border-2" >
        <img src="{{$dishDetail->image ? $dishDetail->image : 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/310px-Placeholder_view_vector.svg.png'}}" class="card-img-top py-3" alt="...">
      
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