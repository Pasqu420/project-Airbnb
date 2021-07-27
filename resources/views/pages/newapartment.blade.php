@extends("layouts.minimal-layout")
@section("content")

    <section id="newapartment-section">

        <h1>
            Aggiungi un nuovo appartamento
        </h1>

        <h4>
            Ci vorranno pochi minuti :)
        </h4>
        <form
        id="new_apartment_form"
        action="{{Route('add_function')}}"
        method="POST"
        enctype="multipart/form-data" v-on:submit="validateNewApartment" novalidate>

        @csrf
        @method('POST')

        <div id="apartment_infos">

            <div style="display: none">
                <label for="user_id">
                    User
                </label>
                <input type="number" name='user_id' id="user_id" value="{{Auth::id()}}">
            </div>

            <h2>
                Dati Struttura:
            </h2>

            <div class="form-nw-apartment">
                <div class="form-nw-apartment-elm-tot">
                    <div class="elm-form">
                        <label for="title">
                            Nome Struttura
                        </label>
                        <input type="text" name="title" id="title" v-model="title" v-bind:class="(classes.includes('title')) ? 'error' : ''">
                    </div>

                    <div class="elm-form textarea">
                        <label for="description">
                            Descrizione Struttura
                        </label>
                        <textarea name="description" id="description" v-model="description"  v-bind:class="(classes.includes('description')) ? 'error' : ''"></textarea>
                    </div>


                    <div class="elm-form">
                        <label for="number_rooms">
                            Numero Camere
                        </label>
                        <input type="number" min="1" name="number_rooms" id="number_rooms" v-model="rooms"  v-bind:class="(classes.includes('number_rooms')) ? 'error' : ''">
                    </div>

                    <div class="elm-form">
                        <label for="number_toiletes">
                            Numero Bagni
                        </label>
                        <input type="number" min="1"  name="number_toiletes" id="number_toiletes" v-model="toiletes"  v-bind:class="(classes.includes('number_toiletes')) ? 'error' : ''">
                    </div>

                    <div class="elm-form">
                        <label for="number_beds">
                            Numeri Letti
                        </label>
                        <input type="number" min="1" name="number_beds" id="number_beds" v-model="beds"  v-bind:class="(classes.includes('number_beds')) ? 'error' : ''">
                    </div>

                    <div class="elm-form">
                        <label for="area">
                            Area
                        </label>
                        <input type="number" min="1" name="area" id="area" v-model="area"  v-bind:class="(classes.includes('area')) ? 'error' : ''">
                    </div>

                    <div class="elm-form">
                        <label for="address">
                            Indirizzo
                        </label>
                        <input type="text" name="address" id="address" v-model="address" v-bind:class="(classes.includes('address')) ? 'error' : ''">
                    </div>

                    {{-- <div class="elm-form-img">
                        <label for="cover_image">
                            Immagini
                        </label>
                        <input id="cover_image" type="file" name="cover_image" class="eml-img">
                    </div> --}}
                </div>
                {{-- <input type="latitude"  name="latitude" type="number" value="1">
                <input type="longitude" style="display: none" name="longitude" type="number" value="1"> --}}
                <ul v-if="formErrors.length" class="form-errors">
                    <li v-for="error in formErrors">
                        @{{ error }}
                    </li>
                </ul>
            </div>

            <h2>
                Servizi:
            </h2>

            <div class="form-elem-service-tot">
                @foreach ($services as $service)
                    <div class="form-service-container">

                        <div class="form-elem-service-elm">
                            <input class="hidden_check" type="checkbox" name="service_id[]" id="service_id[{{ $service->id }}]" value="{{$service->id}}">
                            <label for="service_id[{{ $service->id }}]">{{$service->service}}</label>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <button type="submit">
                Invia
            </button>

        </div>
    </form>
    </section>


@endsection
