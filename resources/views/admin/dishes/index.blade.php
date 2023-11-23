@extends('layouts.app')

@section('icons')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')


<div class="container mt-5">
    <button class="mx-auto">crea un prodotto</button>
    <div class="row row-cols-3 justify-content-center">
        <div class="col">
            @forelse ($dishes as $dish)
            
                <div class="card p-1 {{$dish->visible ? '' : 'border-danger'}} " style="max-width: 540px;">
                    <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{$dish->image}}" class="img-fluid rounded-start" alt="...">
                    
                    <div class="icons d-flex flex-column align-items-center gap-1 mt-1  ">
                        <a class="" href="{{route("admin.dish.show", $dish)}}">
                            <i class="fa-solid fa-eye fa-lg"></i>
                        </a>
                        <a class="" href="#">
                            <i class="fa-solid fa-pencil fa-lg"></i>
                        </a>
                        <a class="" href="#">
                            <i class="fa-solid fa-trash fa-lg"></i>
                        </a>
                    </div>


                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <h5 class="card-title">{{$dish->name}}</h5>
                        <p class="card-text">{{$dish->getAbsDescription()}}</p>
                        <p class="card-text"><small class="fw-bold">Price: {{$dish->price}}€</small></p>
                        @if(!$dish->visible) 
                            <p class="card-text"><small class="fw-bold text-danger">Non disponibile</small></p>
                        @endif
                        
                        </div>
                    </div>
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