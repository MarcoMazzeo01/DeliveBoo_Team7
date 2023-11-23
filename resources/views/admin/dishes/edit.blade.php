@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-4">
                
                <img src="" alt="" id="image_preview" class="img-fluid">
            </div>
            <div class="col-8">
                <form action="{{route('admin.dish.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        
                    <div class="mb-3">
                        <label for="name" class="form-label" >Nome del piatto</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name', $dishDetail->name)}}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label" >Inserisci il prezzo</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{old('price', $dishDetail->price)}}">
                        @error('price')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Carica una immagine</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                    <div class="mb-3 form-check d-flex align-items-center gap-5">
                        <div class="visibile_chek">

                            <input type="checkbox" name="visible" value="1" class="form-check-input" id="visible" @if($dishDetail->visible) checked @endif>
                            <label class="form-check-label" for="visible">Disponibile</label>
                            
                        </div>

                        <select class="form-select @error('course_id') is-invalid @enderror" name="course_id">
                            <option value="" @if(empty(old('course_id'))) selected  @endif >Tipo di portata</option>
                            @foreach($courses as $course)
                            @dd($course);
                                <option value="{{$course->id}}" @if(old('course_id') == $course->id) selected @endif>{{$course->name}}</option>
                            @endforeach
                        </select>


                        @error('course_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label ">Aggiungi una descrizione</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="50" rows="5">{{old('description', $dishDetail->description)}}</textarea>
                    </div>
                    @error('description')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Submit</button>
                    
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
{{-- <script type="text/javascript">
    
    const imagePreview = document.getElementById('image_preview');
    const image = document.getElementById('image');
    console.log(imagePreview);
    image.addEventListener('change', function(){
        const [file] = this.files;
        imagePreview.src = URL.createObjectURL(file);
    })
    
</script> --}}
@endsection