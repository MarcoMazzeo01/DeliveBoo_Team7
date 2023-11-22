@extends('layouts.app')

@section('content')

<div class="container">
    <div class="container my-5">
        <a class="btn btn-outline-success" href="{{route('admin.restaurant.create')}}">Crea Ristorante</a>
        <table class="table">
            <thead>
                <tr>
                   
                    
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Indirizzo</th>
                    <th scope="col">Vat</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Descrizione</th>
                    
                </tr>
            </thead>
            <tbody>
                
                @forelse ($restaurants as $restaurant)
                <tr>
                    <th scope="row">{{$restaurant->id}}</th>
                                                     
                    <td>{{$restaurant->name}}</td>
                    <td>{{$restaurant->address}}</td>
                    <td>{{$restaurant->vat}}</td>
                    <td>{{$restaurant->types}}</td>
                    <td>
                <a class="btn btn-outline-success" href="{{route('admin.restaurant.edit', $restaurant)}}">Modifica ristorante</a>
                <a href="{{route("admin.restaurant.show", $restaurant)}}">Guarda il nostro menù</a>
    
                </form>
    
            </td>
        </tr>
        
        @empty
        <tr>
            <td coldspan="6">Non ci sono risultati</td>
        </tr>
            
        @endforelse
        
    </tbody>
    </table>
    </div>
    
</div>
@endsection
