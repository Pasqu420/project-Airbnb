@extends('layouts.minimal-layout')
@section('content')
    <section id="section-add-images">

        <div class="container">

            <h1>
                {{$apartment->title}}
            </h1>
                
                <div class="container-form-add">
                    <form action="{{Route('store_image',$apartment->id)}}"
                    method="POST"
                    enctype="multipart/form-data"
                    >   
                    
                        @csrf
                        @method('POST')

                        <div class="add-image">
                            <div class="label-input">
                                <label class="label-image" for="image">Foto Esterno</label>
                                <br>
                                <input type="file" name="image" id="image" class="input-image">
                            </div>
                            <button type="submit">
                                Aggiungi Immagine
                            </button>
                        </div>
                    </form>
                </div>
        </div>
    </section>
@endsection