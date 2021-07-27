@extends("layouts.register-layout")
@section("content")
    <section id='edit-section'>

        <h2>
            Modifica la tua Struttura:
        </h2>
        <form action="{{Route('edit_function',$apartment->id)}}"
            method="POST"
            enctype="multipart/form-data" v-on:submit='validateEditApartment' novalidate>
    
            @csrf
            @method('POST')
    
            <div class="form-complit">
                <div class="form-text">
            
                    <div class="form-text-elem">
                        <label for="title">Titolo</label>
                        <input type="text" min='4' name="title" id="title" v-model="title"  placeholder="{{$apartment->title}}" value="{{$apartment->title}}" v-bind:class="(classes.includes('title')) ? 'error' : ''">
                    </div>

                    <div class="form-text-elem">
                        <label for="description">
                            Descrizione Struttura
                        </label>
                        <textarea name="description" min='22' id="description" v-model="description" placeholder="{{$apartment->description}}" cols="30" rows="10" v-bind:class="(classes.includes('description')) ? 'error' : ''">{{$apartment->description}}</textarea>
                    </div>
            
                    <div class="form-text-elem">
                        <label for="number_rooms">Numero Camere</label>
                        <input type="number" min='1' name="number_rooms" id="number_rooms" placeholder="{{$apartment->number_rooms}}" v-model="rooms" value="{{$apartment->number_rooms}}" v-bind:class="(classes.includes('number_rooms')) ? 'error' : ''">
                    </div>
            
                    <div class="form-text-elem">
                        <label for="number_toiletes">Numero Bagni</label>
                        <input type="number" min='1' name="number_toiletes" id="number_toiletes" placeholder="{{$apartment->number_toiletes}}" v-model="toiletes" value="{{$apartment->number_toiletes}}" v-bind:class="(classes.includes('number_toiletes')) ? 'error' : ''" >
                    </div>
            
                    <div class="form-text-elem">
                        <label for="number_beds">Numero Letti</label>
                        <input type="number" min='1' placeholder="{{$apartment->number_beds}}" name="number_beds" id="number_beds" v-model="beds" value="{{$apartment->number_beds}}" v-bind:class="(classes.includes('number_beds')) ? 'error' : ''">
                    </div>
            
                    <div class="form-text-elem">
                        <label for="area">Area</label>
                        <input type="number" min='1' placeholder="{{$apartment->area}}" name="area" id="area" v-model="area" value="{{$apartment->area}}" v-bind:class="(classes.includes('area')) ? 'error' : ''">
                    </div>
            
                    <div class="form-text-elem">
                        <label for="address">Indirizzo</label>
                        <input type="text" placeholder="{{$apartment->address}}" name="address" id="address" v-model="address" value="{{$apartment->address}}" v-bind:class="(classes.includes('address')) ? 'error' : ''">
                    </div>

                    <ul class="form-errors" v-if="formErrors.length">
                        <li v-for="error in formErrors">
                            @{{ error }}
                        </li>
                    </ul>
                </div>
    
                <div class="form-service">
                    <h4>
                        Servizi
                    </h4>
            
                    <div >
                        @foreach ($services as $service)
                            <div class="form-select">
                                <input type="checkbox" class="hidden_check" name="service_id[]" id="service_id[{{$service->id}}]" value="{{$service->id}}"
                                    @foreach ($apartment->services as $checkedService)
                                        @if ($checkedService->id == $service->id)
                                            checked
                                        @endif
                                    @endforeach
                                >
                                <label for="service_id[{{$service->id}}]">{{$service->service}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
              
            </div>
            <div class="form-btn">
                <button class='button-form' type="submit">Invia</button>
            </div>
            
    
        </form>

    </section>
    
@endsection