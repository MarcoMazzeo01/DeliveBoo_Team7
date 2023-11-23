@extends('layouts.app')

@section('icons')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')

<h2> I miei ristoranti </h2>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Indirizzo</th>
                    {{-- <th scope="col">Vat</th> --}}
                    <th scope="col">Tipologia</th>
                    {{-- <th scope="col">Descrizione</th> --}}
                    <th scope="col"> Dettagli </th>
                    <th scope="col"> Cestino </th>

                    {{-- ROTTA PER IL CESTINO --}}

                    {{-- <th scope="col"><a href="{{ route('admin.restaurant.trash.index')}}" class="btn btn-danger my-3"> Cestino </a></th> --}}



                </tr>
            </thead>
            <tbody>
                @if ($restaurant)
                <tr>
                    <th scope="row">{{$restaurant->id}}</th>
                                                     
                    <td>{{$restaurant->name}}</td>
                    <td>{{$restaurant->address}}</td>
                    {{-- <td>{{$restaurant->vat}}</td> --}}
                    <td>{!!$restaurant->getTypeBadge()!!}</td>
                    {{-- <td>{{$restaurant->getAbsDescription()}}</td> --}}
                    <td>
                        <a href="{{route("admin.restaurant.show", $restaurant)}}">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                     </td>
                     {{-- DELETE --}}
                     <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#delete-modal-{{$restaurant->id}}" class="mx-1">
                            <i class="fa-solid fa-trash text-danger"></i>  
                        </a>
                    {{-- Delete modal --}}
                        <div class="modal fade" id="delete-modal-{{$restaurant->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina ristorante</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Sei sicuro di voler eliminare il ristorante con tiolo "{{$restaurant->name}}"?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                  {{-- Delete Form --}}
                                  {{-- <form action="{{route('admin.restaurant.destroy', $restaurant)}}" method="POST" class="mx-1"> --}}
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Conferma</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>

                     <td>
                   
                 </tr>
        

        {{-- ELSE --}}
        @else
        <tr>
            <td coldspan="6">Non ci sono risultati</td>
        </tr> 
        @endif
        
    </tbody>
    </table>
@endsection



