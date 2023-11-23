@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container my-5">
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

                    @if ($restaurant)
                        <tr>
                            <th scope="row">{{ $restaurant->id }}</th>

                            <td>{{ $restaurant->restaurant_name }}</td>
                            <td>{{ $restaurant->address }}</td>
                            <td>{{ $restaurant->vat }}</td>
                            <td>{!! $restaurant->getTypeBadge() !!}</td>
                            <td>{{ $restaurant->getAbsDescription() }}</td>
                            <td>
                                <a href="{{ route('admin.restaurant.show', $restaurant) }}">Vai al dettaglio</a>

                                </form>

                            </td>
                        </tr>
                    @else
                        <tr>
                            <td coldspan="6">Non ci sono risultati</td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>

    </div>
@endsection
