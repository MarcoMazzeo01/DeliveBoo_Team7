@extends('layouts.app')

@section('content')

<div class="container">
    @dd($restaurants)
    <div class="row">
        <ul>
            @foreach ($restaurants as $restaurant)
            <li>{{$restaurant->name}}</li>
                
            @endforeach
        </ul>
    </div>
</div>
@endsection
