@extends('layouts.search_layout')
@section('content')
    <div class="search-page">

        <div class="left-section">
            @if (count($apartments)>0)
                @foreach ($apartments_sponsor as $items)
                    <div v-if="currentapartment_sponsor.length<1  && results=true" class="row-with-img-text" onload="formarker('ciao')">
                        <div class="sinistra-img">
                            <a href="#" class="sponsor">
                                <div>
                                    Appartamento sponsorizzato controller
                                </div>
                                <img src="{{asset('/storage/assets/external/'.$items->id. '.jpg')}}" alt="immagine stanza">
                            </a>
                        </div>
                        <div class="destra-testo">
                            <a href="{{route('apartment', $items->id)}}">
                            {{-- <a @click="redirect(elem.id)"> --}}
                                <h2>{{$items->title}}</h2>
                            </a>
                            <a href="#" onclick="getLatLng('{{$items -> address}}')" @click="addresrange(@{{ elem.title }}))">
                                <strong>Address:</strong>
                                {{$items->address}}
                            </a>

                            <span><strong>Area : </strong><span style:"font-weight:bolder">{{$items->area}}  m^2</span></span>
                            <span><strong>Numberi di posti letto: </strong>{{$items->number_beds}}</span>
                            <span><strong>Numbero di stanze: </strong>{{$items->number_rooms}}</span>
                        </div>
                    </div>
                @endforeach
                @foreach ($apartments as $item)
                    <div v-if="currentapartment.length<1" class="row-with-img-text" onload="formarker('ciao')">
                        <div class="sinistra-img">
                            <a href="#" >
                                <img src="{{asset('/storage/assets/external/'.$items->id. '.jpg')}}" alt="immagine stanza">
                            </a>
                        </div>
                        <div class="destra-testo">
                            <a href="{{route('apartment', $item->id)}}">
                            {{-- <a @click="redirect(elem.id)"> --}}
                                <h2>{{$item->title}}</h2>
                            </a>
                            <a href="#" onclick="getLatLng('{{$item -> address}}')" @click="addresrange(@{{ elem.title }}))">
                                <strong>Address:</strong>
                                {{$item->address}}
                            </a>

                            <span><strong>Area : </strong><span style:"font-weight:bolder">{{$item->area}}  m^2</span></span>
                            <span><strong>Numberi di posti letto: </strong>{{$item->number_beds}}</span>
                            <span><strong>Numbero di stanze: </strong>{{$item->number_rooms}}</span>
                        </div>
                    </div>
                @endforeach
            @else
                <div>
                    <span>
                        Non abbiamo trovato nessun apartamento
                    </span>
                </div>
            @endif
            <div else v-for="elem in currentapartment_sponsor" class="row-with-img-text">
                <div class="sinistra-img">
                    <a href="#" class="sponsor">
                        <div class="tagsponsor">
                            Appartamento sponsorizzato
                        </div>
                        <div class="mobile-title">@{{elem.title}}</div>
                        <img :src=" ('/storage/assets/external/'+elem.id+ '.jpg')" alt="immagine stanza" style="width:100%; border-radius:10px; height: 220px;" >
                    </a>
                </div>
                <div  class="destra-testo">

                    <a href="{{route('apartment',1)}}" >
                        <h2>
                            @{{ elem.title }}
                        </h2>
                    </a>
                    {{-- <a href="#" @click="getLatLng(elem.address)">
                        @{{elem.address}}
                    </a> --}}
                    <a href="#" @click="addresrange(elem)">
                        @{{elem.address}}
                    </a>
                    {{-- <div style="background-color:lightblue" @click="addresrange(elem)">
                        funzione prova
                    </div> --}}


                    <span>Area : <span style:"font-weight:bolder">@{{elem.area}}  m<sup>2</sup></span></span>
                    <span>Numeri di posti letto: @{{elem.number_beds}}</span>
                    <span>Numero di stanze: @{{elem.number_rooms}}</span>

                </div>
            </div>

            <div v-else-if="currentapartment[0].errore!=true" v-for="elem in currentapartment" class="row-with-img-text">
                <div class="sinistra-img">
                    <a href="#" class="sponsor">

                        <div class="mobile-title">@{{elem.title}}</div>
                        <img :src=" ('/storage/assets/external/'+elem.id+ '.jpg')" alt="immagine stanza" style="width:100%; border-radius:10px; height: 220px;" >
                    </a>
                </div>
                <div  class="destra-testo">
                    <a href="{{route('apartment',1)}}" >
                        <h2>
                            @{{ elem.title }}
                        </h2>
                    </a>
                    {{-- <a href="#" @click="getLatLng(elem.address)">
                        @{{elem.address}}
                    </a> --}}
                    <a href="#" @click="addresrange(elem)">
                        <strong> Address :</strong>
                        @{{elem.address}}
                    </a>
                    {{-- <div style="background-color:lightblue" @click="addresrange(elem)">
                        funzione prova
                    </div> --}}


                    <span><strong> Area :</strong> <span style:"font-weight:bolder">@{{elem.area}}  m<sup>2</sup></span></span>
                    <span><strong> Numeri di posti letto:</strong> @{{elem.number_beds}}</span>
                    <span><strong> Numero di stanze:</strong> @{{elem.number_rooms}}</span>

                </div>

                <div v-if="elem.errore" class="errore" >
                    Nessun appartamento trovato
                </div>


            </div>



        </div>

        <div class="right-section">
          <div id='map' class='map'>
        </div>

    </div>

@endsection
