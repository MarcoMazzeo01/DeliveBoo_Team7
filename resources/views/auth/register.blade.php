@extends('layouts.app')

@section('icons')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('custom-styles')
    <style>
        #app {
            height: 100%;
            background-image: url("https://ristoranti.justeat.it/images/heros/signup-large_2x.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
@endsection

@section('content')
    <div class="row justify-content-center flex-nowrap pb-5">
        <div class="col-3 col-md-6 text-light overlay_register">
            <h2 class="text-center">Unisciti al servizio di consegne a domicilio leader in Europa.</h2>
            <h3 class="text-center">Aumenta i tuoi clienti, le vendite e le tue potenzialità di marketing.</h3>
        </div>
        <div class="col-8 col-md-8">
            <div class="card">
                <div class="card-header fw-bold" style='color: #f36d00'>{{ __('Inizia a vendere con Deliveboo') }} <i
                        class='fas fa-motorcycle' style='font-size:18px; color: #f36d00'></i></div>
                <div class="alert alert-warning m-3" role="alert">
                    * Campi obbligatori
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        Correggi i seguenti errori:

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <h4>Informazioni Personali:</h4>
                        </div>

                        <div class="my-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}
                                *</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus
                                    placeholder="Inserisci il tuo nome" pattern="[A-Za-z ']+"
                                    title="Inserisci un nome valido (solo lettere e spazi)">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Add validation for surname field -->
                        <div class="mb-4 row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }}
                                *</label>

                            <div class="col-md-6">
                                <input id="surname" type="text"
                                    class="form-control @error('surname') is-invalid @enderror" name="surname"
                                    value="{{ old('surname') }}" required autocomplete="surname" autofocus
                                    placeholder="Inserisci il tuo cognome" pattern="[A-Za-z ']+"
                                    title="Inserisci un cognome valido (solo lettere e spazi)">

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Add validation for email field -->
                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}
                                *</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Inserisci la tua e-mail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Add validation for password field -->
                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}
                                *</label>

                            <div class="col-md-6 d-flex align-items-center">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror me-2" name="password"
                                    required autocomplete="new-password"
                                    pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                                    title="La password deve contenere almeno 8 caratteri, una lettera maiuscola, un numero e un carattere speciale"
                                    placeholder="Inserisci password">
                                <span id="show-password" onclick="togglePassword('password', 'show-password')"><i
                                        class="fa-solid fa-eye"></i></span>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Add validation for password confirmation field -->
                        <div class="mb-4 row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }} *</label>

                            <div class="col-md-6 d-flex align-items-center">
                                <input id="password-confirm" type="password"
                                    class="form-control @error('password-confirm') is-invalid @enderror me-2"
                                    name="password_confirmation" required autocomplete="new-password"
                                    pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                                    title="La password deve contenere almeno 8 caratteri, una lettera maiuscola, un numero e un carattere speciale"
                                    placeholder="Conferma password">
                                <span id="show-password-confirmation"
                                    onclick="togglePassword('password-confirm', 'show-password-confirmation')"><i
                                        class="fa-solid fa-eye"></i></span>
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <h4>Dettagli dell'Attività:</h4>
                        </div>

                        <!-- Add validation for restaurant name field -->
                        <div class="my-4 row">
                            <label for="restaurant_name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nome attività') }} *</label>

                            <div class="col-md-6">
                                <input id="restaurant_name" type="text"
                                    class="form-control @error('restaurant_name') is-invalid @enderror"
                                    name="restaurant_name" value="{{ old('restaurant_name') }}" required
                                    autocomplete="restaurant_name" autofocus
                                    placeholder="Inserisci il nome del tuo ristorante">

                                @error('restaurant_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <!-- Add validation for address field -->
                        <div class="mb-4 row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}
                                *</label>

                            <div class="col-md-6">
                                <input id="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address') }}" required autocomplete="address"
                                    placeholder="Inserisci l'indirizzo" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Add validation for VAT field -->
                        <div class="mb-4 row">
                            <label for="vat" class="col-md-4 col-form-label text-md-right">{{ __('P.Iva') }}
                                *</label>

                            <div class="col-md-6">
                                <input id="vat" type="text"
                                    class="form-control @error('vat') is-invalid @enderror" name="vat"
                                    value="{{ old('vat') }}" required autocomplete="vat" autofocus
                                    pattern="^[0-9]{11}$" title="Inserisci una Partita IVA valida di 11 numeri"
                                    placeholder="Inserisci il numero di Partita Iva">

                                @error('vat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Add validation for description field -->
                        <div class="row my-3">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descrizione
                                *</label>
                            <div class="col-md-6">
                                <textarea name ="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                    rows="5" pattern=".*" title="Inserisci una descrizione valida"
                                    placeholder="Inserisci la descrizione del tuo ristorante" required></textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Add validation for types field -->
                        <div class="col-12 my-5">
                            <div class="d-flex row form-check @error('types') is-invalid @enderror">
                                <h5>Tipo di Cucina *</h5>
                                @foreach ($types as $type)
                                    <div class="col-4">
                                        <input type="checkbox" name="types[]" id="type-{{ $type->id }}"
                                            value="{{ $type->id }}" class="form-check-control my-2"
                                            @if (in_array($type->id, old('types', []))) checked @endif>
                                        <label for="type-{{ $type->id }}">{{ $type->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('types')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Add validation for image field -->
                        <div class="mb-4 row">
                            <label for="image" class="form-label col-md-4">Carica una immagine</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image" value="{{ old('image') }}"autocomplete="image"
                                    autofocus>
                                <small class="text-muted">Formati supportati: JPG, PNG, GIF</small>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary custom_button">
                                    {{ __('Registrati') }} <i class="fa-solid fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function togglePassword(inputId, buttonId) {
            let passwordInput = document.getElementById(inputId);
            let showPasswordButton = document.getElementById(buttonId);

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPasswordButton.innerHTML = '<i class="fa-solid fa-eye"></i>';
            } else {
                passwordInput.type = "password";
                showPasswordButton.innerHTML = '<i class="fa-solid fa-eye"></i>';
            }
        }
    </script>
@endsection
