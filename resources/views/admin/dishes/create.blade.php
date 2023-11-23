@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-4">
            <img src="" alt="">
        </div>
        <div class="col-8">
            <form action="{{route('admin.dish.store')}}" method="POST">
                @csrf
                    
                <div class="mb-3">
                    <label for="name" class="form-label" >Nome del piatto</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label" >Inserisci il prezzo</label>
                    <input type="text" class="form-control" id="price" name="price" required>
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

                    <select class="form-select" name="course_id" required >
                        <option value="" selected>Tipo di portata</option>
                        @foreach($courses as $course)
                            <option value="{{$course->id}}">{{$course->name}}</option>
                        @endforeach
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

        
        