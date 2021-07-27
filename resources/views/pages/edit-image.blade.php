@extends('layouts.minimal-layout')
@section('content')
    <section id="section-add-images">
    
        <div class="container">

            <h1>
                {{$apartment->title}}
            </h1>

            @foreach ($apartment -> images as $key => $image)

                <div class="container-form-add">
                    <form action="{{Route('update_image',[$image->id,$apartment->id])}}"
                    method="POST"
                    enctype="multipart/form-data"
                    >   
                    
                        @csrf
                        @method('POST')

                        <div class="add-image">
                            @switch($key)
                            @case(0)
                            <div class="label-input">
                                <label class="label-image" for="image[{{$image->id}}]">Foto Esterno</label>
                                <input class="input-image" type="file" name="image" id="image[{{$image->id}}]">
                            </div>
                                @break
                            @case(1)
                            <div class="label-input">
                                <label class="label-image" for="image[{{$image->id}}]">Foto Soggiorno</label>
                                <input class="input-image" type="file" name="image" id="image[{{$image->id}}]">
                            </div>
                                @break
                            @case(2)
                            <div class="label-input">
                                <label class="label-image" for="image[{{$image->id}}]">Foto Cucina</label>
                                <input class="input-image" type="file" name="image" id="image[{{$image->id}}]">
                            </div>
                                @break
                            @case(3)
                            <div class="label-input">
                                <label class="label-image" for="image[{{$image->id}}]">Foto Stanza</label>
                                <input class="input-image" type="file" name="image" id="image[{{$image->id}}]">
                            </div>
                                @break  
                            @case(4)
                            <div class="label-input">
                                <label class="label-image" for="image[{{$image->id}}]">Foto Bagno</label>
                                <input class="input-image" type="file" name="image" id="image[{{$image->id}}]">
                            </div>
                                @break                        
                            @endswitch
                            <button type="submit">Modifica Immagine</button>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </section>
@endsection