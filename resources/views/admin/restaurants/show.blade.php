@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        
<div class="card" >
    <img src="{{$restaurantDetail->image ? $restaurantDetail->image : 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/310px-Placeholder_view_vector.svg.png'}}" class="card-img-top py-3" alt="...">
   
    <div class="card-body">
      <h5 class="card-title">{{$restaurantDetail->name}}</h5>
      <div class="card-text fw-bold">{{$restaurantDetail->address}}</div>
      <div class="card-text fw-bold {{!$restaurantDetail->vat ? 'text-danger' : '' }}">{{$restaurantDetail->vat ?? 'VAT non inerito' }}</div>
      <p class="card-text">{{$restaurantDetail->description}}</p>
      <a href="{{route('admin.dish.index')}}" class="btn btn-primary">Vai al menù</a>
    </div>
  </div>
</div>
</div>
  @endsection

  <div class="div text-w"></div>
@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        
<div class="card" >
    <img src="{{$restaurantDetail->image ? $restaurantDetail->image : 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/310px-Placeholder_view_vector.svg.png'}}" class="card-img-top py-3" alt="...">
   
    <div class="card-body">
      <h5 class="card-title">{{$restaurantDetail->name}}</h5>
      <div class="card-text fw-bold">{{$restaurantDetail->address}}</div>
      <div class="card-text fw-bold {{!$restaurantDetail->vat ? 'text-danger' : '' }}">{{$restaurantDetail->vat ?? 'VAT non inerito' }}</div>
      <p class="card-text">{{$restaurantDetail->description}}</p>
      <a href="{{route('admin.dish.index')}}" class="btn btn-primary">Vai al menù</a>
    </div>
  </div>
</div>
</div>
  @endsection

