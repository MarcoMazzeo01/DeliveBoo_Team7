@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-4">
            <img src="" alt="">
        </div>
        <div class="col-8">
            <form action="admin.dish.store" method="POST">
                @csrf
                    
                <div class="mb-3">
                    <label for="name" class="form-label">Nome del piatto</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Inserisci il prezzo</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Carica una immagine</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <div class="mb-3 form-check d-flex align-items-center gap-5">
                    <div class="visibile_chek">

                        <input type="checkbox" class="form-check-input" id="visible">
                        <label class="form-check-label" for="visible" name="visible">Disponibile</label>
                    </div>

                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Aggiungi una descrizione</label>
                    <textarea name="description" id="description" class="form-control" cols="50" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

        
        