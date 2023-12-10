@extends('layouts.app')

@section('icons')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="container">
        <h3>Riepilogo ordini</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cognome</th>
                        <th scope="col" class="mobile-full-breakpoint">Telefono <i class="fas fa-phone"></i></th>
                        <th scope="col" class="mobile-full-breakpoint">Indirizzo <i class="fas fa-map-marker-alt"></i>
                        </th>
                        <th scope="col">Data <i class="fas fa-calendar-alt"></i></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td> <b>{{ $order->id }}</b></td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->customer_surname }}</td>
                            <td class="mobile-full-breakpoint">{{ $order->customer_phone }}</td>
                            <td class="mobile-full-breakpoint">{{ $order->address }}</td>
                            <td>{{ $order->getOrderDate() }}</td>

                            {{-- Order-details offCanvas --}}
                            <td>
                                <button class="btn-details" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvas{{ $order->id }}"
                                    aria-controls="offcanvas{{ $order->id }}"> <i
                                        class="fa-solid fa-circle-info"></i></button>
                                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas{{ $order->id }}"
                                    aria-labelledby="offcanvas{{ $order->id }}Label">
                                    <div class="offcanvas-header">
                                        <button type="button" class=" xclose btn-close" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <h5>ID ordine: {{ $order->id }}</h5>

                                        <div class="order-details card">
                                            <div class="card-body">
                                                <h5 class="card-title"><b>Articoli:</b> </h5>
                                                @foreach ($ordersDishes as $orderDish)
                                                    @if ($orderDish->id == $order->id)
                                                        @foreach ($orderDish->dishes as $dish)
                                                            <p>x{{ $dish->pivot->quantity }} {{ $dish->name }}</p>
                                                        @endforeach
                                                        <hr>
                                                        <p><b>Totale ordine:</b> {{ $order->total }}€</p>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        @if (empty($order->notes))
                                            <p><b class=green-txt>Note: </b>...</p>
                                        @else
                                            <p><b class=green-txt>Note</b>: {{ $order->notes }} </p>
                                        @endif
                                        <p><i class=" green-txt fa-solid fa-map-pin"></i> {{ $order->address }}</p>
                                        <p><i class=" green-txt fas fa-phone"></i> {{ $order->customer_phone }}</p>
                                        <p><i class=" green-txt fas fa-envelope"></i> {{ $order->customer_email }}</p>
                                        <p><i class=" green-txt fa-regular fa-calendar"></i> {{ $order->getOrderDate() }}
                                            <br><span><i class=" green-txt fa-regular fa-clock"></i>
                                                {{ $order->getOrderTime() }}</span>
                                        </p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- Pagination --}}
            {{ $orders->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
