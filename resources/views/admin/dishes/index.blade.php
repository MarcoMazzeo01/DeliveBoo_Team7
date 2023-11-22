@extends('layouts.app')

@section('content')


<div class="container mt-5">
    <div class="row row-cols-3 justify-content-center">
        <div class="col">
            @forelse ($dishes as $dish)
                
                <div class="card text-center">
                    <img src="{{$dish->image}}" class="card-img-top" alt="...">
                    <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="true" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Descrizione</a>
                        </li>
                    </ul>
                    </div>
                    <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Modifica</a>
                    </div>
                </div>
        </div>
        @empty
            <button>
                'attualmente il tuo menu è vuoto! crea almeno un piatto!'
            </button>
        @endforelse
                    

    </div>
</div>




@endsection