@extends('layouts.app')

@section('content')


<div class="container mt-5">
    <div class="card" >
        <img src="{{$dishDetail->image ? $dishDetail->image : 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/310px-Placeholder_view_vector.svg.png'}}" class="card-img-top py-3" alt="...">
      
        <div class="card-body">
          <h5 class="card-title">{{$dishDetail->name}}</h5>
          <div class="card-text fw-bold">{{$dishDetail->address}}</div>
          <p class="card-text">{{$dishDetail->description}}</p>
          <div class="card-text fw-bold"> {{$dishDetail->price}}</div>
          
          
        </div>
      </div>
</div>




@endsection