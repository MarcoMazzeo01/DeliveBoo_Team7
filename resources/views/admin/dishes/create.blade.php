@extends('layouts.app')

@section('icons')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a class="btn custom_button" href="{{ route('admin.dish.index') }}">Torna al menù</a>
    </div>
    <div class="row">

        <div class="col-xs-10 col-md-4">

            <img src="{{ $placeholder }}" alt="" id="image_preview" class="img-fluid">
        </div>
        <div class="col-xs-10 col-md-8">
            <div class="alert alert-warning" role="alert">
                * Campi obbligatori
            </div>
            <form action="{{ route('admin.dish.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nome del piatto *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', '') }}" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Inserisci il prezzo *</label>
                    <input type="number" step="0.01" min="0"
                        class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                        value="{{ old('price', '') }}" required>
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Carica una immagine</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <div class="mb-3 form-check d-flex align-items-center gap-5">
                    <div class="visibile_chek">

                        <input type="checkbox" name="visible" value="1" class="form-check-input" id="visible">
                        <label class="form-check-label" for="visible">Disponibile</label>

                    </div>


                    <select class="form-select @error('course_id') is-invalid @enderror" name="course_id" required>
                        <option value="" @if (empty(old('course_id'))) selected @endif>Tipo di portata *</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" @if (old('course_id') == $course->id) selected @endif>
                                {{ $course->name }}</option>
                        @endforeach
                    </select>


                    @error('course_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label ">Aggiungi una descrizione *</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                        cols="50" rows="5" required>{{ old('description', '') }}</textarea>
                </div>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <button type="submit" class="btn custom_button">Crea</button>
            </form>
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
    </script>
@endsection
