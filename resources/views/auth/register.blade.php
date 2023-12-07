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
    <div class="justify-content-center row pb-5">
        <div class="col-12 col-md-8 text-light overlay_register">
            <h2 class="text-center">Unisciti al servizio di consegne a domicilio leader in Europa.</h2>
            <h3 class="text-center">Aumenta i tuoi clienti, le vendite e le tue potenzialità di marketing.</h3>
        </div>
        
        <div class="sign-up-card col-12 col-md-6">
            <div class="card custom-card">
                <div class="card-header fw-bold" style='color: #3a970f'>{{ __('Inizia a vendere con Deliveboo') }} <i
                        class='fas fa-motorcycle' style='font-size:18px; color: #3a970f'></i></div>
                <div class="alert alert-warning m-3 d-flex justify-content-between" role="alert">
                    * Campi obbligatori

                    {{-- Inizio debug --}}
                    <div id="banner" class="fs-4"></div>
                    <button class="btn btn-danger" id="auto">Prego</button>
                    {{-- Fine debug --}
                    {{-- Vanno eliminate dal div di "campi obbligatori" le classi flex --}}
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
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
                        onsubmit="return validateForm()" class="sign-up-form">
                        @csrf
                        <section class="personal-info col-12 col-md-6">
                            <div>
                                <h4>Informazioni Personali:</h4>
                            </div>

                            <div class="my-4 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}
                                    *</label>

                                <div class="col-xs-12  col-md-6">
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

                                <div class="col-xs-12 col-md-6">
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

                                <div class="col-xs-12 col-md-6">
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

                                <div class="col-xs-12 col-md-6 d-flex align-items-center">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror me-2" name="password"
                                        required autocomplete="new-password"
                                        pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                                        title="La password deve contenere almeno 8 caratteri, una lettera maiuscola, un numero e un carattere speciale"
                                        placeholder="Inserisci password">
                                    <span id="show-password" onclick="togglePassword('password', 'show-password')"><i
                                            class="fa-solid fa-eye"></i></span>

                                    @error('password')
                                        <span class="invalid-feedback ms-1" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Add validation for password confirmation field -->
                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-xs-12 col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }} *</label>

                                <div class="col-md-6 d-flex align-items-center">
                                    <input id="password-confirm" type="password"
                                        class="form-control @error('password-confirm') is-invalid @enderror me-2"
                                        name="password_confirmation" required autocomplete="new-password"
                                        pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                                        title="La password deve contenere almeno 8 caratteri, una lettera maiuscola, un numero e un carattere speciale"
                                        placeholder="Conferma password"
                                        style="
                                            min-width: 228px;">
                                    <span id="show-password-confirmation"
                                        onclick="togglePassword('password-confirm', 'show-password-confirmation')"><i
                                            class="fa-solid fa-eye"></i></span>
                                    <div id="password-match-error" class="invalid-feedback ms-2" role="alert"
                                        style="display: none;">
                                        <strong>Le password non corrispondono.</strong>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class=" company-info col-xs-12 col-md-6">
                            <div>
                                <h4>Dettagli dell'Attività:</h4>
                            </div>

                            <!-- Add validation for restaurant name field -->
                            <div class="my-4 row">
                                <label for="restaurant_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome attività') }} *</label>

                                <div class="col-xs-12 col-md-6">
                                    <input id="restaurant_name" type="text"
                                        class="form-control @error('restaurant_name') is-invalid @enderror"
                                        name="restaurant_name" value="{{ old('restaurant_name') }}" required
                                        autocomplete="restaurant_name" autofocus
                                        placeholder="Inserisci il nome del ristorante">

                                    @error('restaurant_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Add validation for address field -->
                            <div class="col-xs-12 mb-4 row">
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

                                <div class="col-xs-12 col-md-6">
                                    <input id="vat" type="text"
                                        class="form-control @error('vat') is-invalid @enderror" name="vat"
                                        value="{{ old('vat') }}" required autocomplete="vat" autofocus
                                        pattern="^[0-9]{11}$" title="Inserisci una Partita IVA valida di 11 numeri"
                                        placeholder="Inserisci il numero di Partita Iva" maxlength="11">

                                    @error('vat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Add validation for description field -->
                            <div class="row my-2">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Descrizione
                                    *</label>
                                <div class="col-xs-12 col-md-6">
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
                        </section>
                        <section>
                            <!-- Add validation for types field -->
                            <div class="types-field col-xs-12 col-md-7 mb-4">
                                <div
                                    class="d-flex
                                row form-check @error('types') is-invalid @enderror">
                                    <h5>Tipo di Cucina *</h5>
                                    @foreach ($types as $type)
                                        <div class="col-md-12 d-flex">
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
                            <div class="d-flex justify-content-start">
                                <div class="col-xs-12 col-md-4 me-4">
                                    <img src="" alt="" id="image_preview" class="img-fluid">
                                </div>
                                <!-- Add validation for image field -->
                                <div class="col-md-6">
                                    <label for="image" class="form-label">Carica una immagine</label>
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
                        </section>
                        <div class="my-4 row mb-0 col-md-8">
                            <div class="col-xs-12  col-md-6 offset-md-4">
                                <button id="submitButton" type="submit" class="btn btn-primary custom_button" disabled>
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
        const imagePreview = document.getElementById('image_preview');
        const image = document.getElementById('image');
        console.log(imagePreview);
        image.addEventListener('change', function() {
            const [file] = this.files;
            imagePreview.src = URL.createObjectURL(file);
        })

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

        function validateForm() {
            let password = document.getElementById('password').value;
            let confirmPassword = document.getElementById('password-confirm').value;
            let errorSpan = document.getElementById('password-match-error');

            if (password !== confirmPassword) {
                errorSpan.style.display = 'block';
                return false;
            } else {
                errorSpan.style.display = 'none';
                return true;
            }
        }

        function checkPasswordMatch() {
            let password = document.getElementById('password').value;
            let confirmPassword = document.getElementById('password-confirm').value;
            let errorSpan = document.getElementById('password-match-error');
            let submitButton = document.getElementById('submitButton');

            if (password !== confirmPassword) {
                errorSpan.style.display = 'block';
                submitButton.disabled = true;
            } else {
                errorSpan.style.display = 'none';
                submitButton.disabled = false;
            }
        }

        document.getElementById('password').addEventListener('input', checkPasswordMatch);
        document.getElementById('password-confirm').addEventListener('input', checkPasswordMatch);

        //  //********  ********\\
        // ||        DEBUG       ||
        // ************************
        const auto = document.getElementById('auto')
        const banner = document.getElementById('banner')
        let index = 0;
        let indexCheckBox = 1

        if (!banner) alert('rimuovi anche lo script del debug!')

        auto.addEventListener('click', function() {

            banner.innerHTML = 'LE IMMAGINI VANNO CARICATE'

            index++

            const inputName = document.getElementById('name')
            inputName.value = 'TestName'

            const inputSurname = document.getElementById('surname')
            inputSurname.value = 'TestSurname'

            const inputEmail = document.getElementById('email')
            inputEmail.value = 'test' + index + '@admin.it'

            const inputPassword = document.getElementById('password')
            inputPassword.value = 'Password1?'

            const inputPasswordConfirm = document.getElementById('password-confirm')
            inputPasswordConfirm.value = 'Password1?'

            const inputRestaurantName = document.getElementById('restaurant_name')
            const restaurants = ['La vela', 'La Carriola', 'Nonna Aurora', 'del Borgo', 'Antichi Sapori Siciliani',
                'Carbo', 'Dream Bio', 'sul Brenta', 'Vegan Restaurant', 'La Brace', 'La Tripolina',
                'Castello della Castelluccia', 'Amacrì'
            ]
            const randomEl = Math.floor(Math.random() * (restaurants.length - 1) + 1)
            inputRestaurantName.value = restaurants[randomEl]

            const inputAddress = document.getElementById('address')
            inputAddress.value = 'Via sukunvri road n°' + Math.floor(Math.random() * (100 - 1) + 1)

            const inputVat = document.getElementById('vat')
            inputVat.value = '15463531001'

            const inputDescription = document.getElementById('description')
            inputDescription.innerHTML =
                'descrizione molto lunga per testare l\'abstract che tronca una stringa con lunghezza fino ad un tot e aggiunge i 3 puntini, sperando che questa descrizione sia abbastanza lunga, alessandro potresti anche ringraziarmi per questo tasto debug '


            const inputCheckbox = document.getElementById('type-' + indexCheckBox)

            if (indexCheckBox <= 1) {
                inputCheckbox.checked = true
            } else {
                const inputCheckboxPrev = document.getElementById('type-' + (indexCheckBox - 1))
                inputCheckbox.checked = true
                inputCheckboxPrev.checked = false
            }
            if (indexCheckBox >= 5) alert(
                'dopo questa creazione aggiorna che le input sfaciolano e rimane su Greco')
            indexCheckBox++
            //  //********  ********\\
            // ||     FINE - DEBUG   ||
            // ************************

        })
    </script>
@endsection
