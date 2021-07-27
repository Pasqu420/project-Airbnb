@extends('layouts.apartment_layout')
@section('content_apartment')

    {{-- DANNY --}}
    <div class="container" id="apartment-sample">
    {{-- _________JUMBOTRON INIZIA QUI__________ --}}

      <div class="jumbotron-apartment">

        <div id="jumbo-container">

          <div class="titolo">
            <h1>
              <a href="#">
                {{$apartment->title}}
              </a>
            </h1>

          </div>

          {{-- INIZIO DESCRIZIONE --}}
          <div class="description-apartment">

            <div>
              <span>
                <a href="#">
                  {{$apartment->address}}
                </a>
              </span>
            </div>

          </div>
          {{-- FINE DESCRIZIONE --}}

          {{-- _________FINE DESCRIZIONE - INIZIO IMMAGINI___________ --}}

          {{-- INIZIO immagini appartamento --}}
          <div class="apartment-img-container">

            {{-- INIZIO IMMAGINE GRANDE --}}
            <div>
              <a href="#">
                <img class="immagine-grande" src="{{asset('/storage/assets/apartment_img/'.$cover_image)}}" alt="immagine-qui" style="width: 100%;height: 100%;">
              </a>
            </div>
            {{-- FINE IMMAGINE GRANDE --}}

            {{-- INIZIO 4 IMMAGINI --}}
            <div>
              @foreach ($images as $key => $image)
                <div>
                  <a href="#">
                      @switch($key)
                          @case(0)
                            <img class="immagini-piccole" src="{{asset('/storage/assets/apartment_img/'.$image->image)}}" alt="immagine-qui" style="width: 100%;height: 100%;">
                              @break
                          @case(1)
                            <img class="immagini-piccole" src="{{asset('/storage/assets/apartment_img/'.$image->image)}}" alt="immagine-qui" style="width: 100%;height: 100%;">
                              @break
                          @case(2)
                            <img class="immagini-piccole" src="{{asset('/storage/assets/apartment_img/'.$image->image)}}" alt="immagine-qui" style="width: 100%;height: 100%;">
                              @break
                          @case(3)
                            <img class="immagini-piccole" src="{{asset('/storage/assets/apartment_img/'.$image->image)}}" alt="immagine-qui" style="width: 100%;height: 100%;">
                            @break
                      @endswitch
                  </a>
                </div>
              @endforeach
            </div>
            {{-- FINE 4 IMMAGINI --}}
          </div>
          {{-- FINE immagini appartamento --}}


          {{-- INIZIO SEZIONE DETTAGLI FLAT (SOTTO IMMAGINI) --}}
          <div class="dettagli-flat">

            {{-- INIZIO SEZIONE DI SINISTRA CON ICONE --}}
            <div class="sinistra-dettagli-flat">

              <h2>
                <a href="#">
                  TITOLO ANNUNCIO
                </a>
              </h2>

              <ul id="all-four-rows">

                {{-- (1) --}}
                <li class="riga uno">
                  <p>{{$apartment->description}}.</p>
                </li>

                {{-- (2) --}}
                <li class="riga due">

                  <span>
                    <img src="{{asset('storage/assets/icone_stanze.png')}}" alt="stanze-img">

                      Stanze :
                      {{$apartment->number_rooms}}

                  </span>

                  <span>
                    <img src="{{asset('storage/assets/icone_letto.png')}}" alt="letto-img" style="width: 50px; height: 50px;">

                      Letti :
                      {{$apartment->number_beds}}

                  </span>

                  <span>
                    <img src="{{asset('storage/assets/icone_bagno.png')}}" alt="bagno-img" style="width: 50px; height: 50px;">

                      Numero bagni :
                      {{$apartment->number_toiletes}}

                  </span>

                  <span>
                    <img src="{{asset('storage/assets/icone_area.png')}}" alt="area-img" style="width: 50px; height: 50px;">

                      Area :
                      {{$apartment->area}}mq

                  </span>

                </li>

                {{-- (3) --}}
                <li class="riga tre">

                  <span>

                      <h3>Servizi extra</h3>
                        <ul class="sub-list">
                          @foreach ($apartment->services as $service)
                          <li>
                            <img src="{{asset('storage/assets/icone_'. $service->service . '.png')}}" alt="servizio-extra" style="width: 40px; height: 40px;">
                            {{$service->service}}
                          </li>
                        @endforeach
                        </ul>

                  </span>
                </li>

                {{-- (4) --}}
                <li class="riga quattro">
                  <h3>Informazioni utili</h3>

                  <div class="test">

                    {{-- <a href="#">
                      <img src="{{asset('storage/assets/icone_sponsor.png')}}" alt="sponsor-img" style="width: 50px; height: 50px;">
                      @foreach ($apartment->sponsors as $apSp)
                        <p>
                          {{$apSp->sponsor_duration}} ore di sponsor
                        </p>
                      @endforeach
                    </a> --}}

                    <a href="#">
                      <i class="fas fa-pump-soap"></i>
                      <p>Questo host si impegna a seguire la procedura avanzata di pulizia in 5 fasi di BoolB&B.</p>
                    </a>

                  </div>
                </li>

                <li id="taccuino-invisibile">
                  <div>
                    <form class="lallero" action="{{ route('send', $apartment->id) }}" method="POST" novalidate>
                      @csrf
                      @method('POST')
                      <div class="form-infos"> {{-- class form-infos --}}

                        <span>
                          Scrivi all'host
                          <i class="fas fa-pencil-alt"></i> {{-- CLASS ICON (dopo -alt) --}}
                        </span>
                        <span>
                          Vedi se ci sono camere disponibili.
                        </span>
                      </div>
                      <div> {{-- CLASS wrapper-form-fields --}}
                        <label for="email">
                          Email
                        </label>
                        <input class="lallero-btn email" type="email" name="email" v-model="email"> {{-- id="email" --}}
                      </div>
                      <textarea rows="10" cols="30" name="text_message"></textarea>
                      <input class="lallero-btn sub" type="submit" value="Invia">
                    </form>
                  </div>
                </li>

              </ul>


            </div>
            {{-- FINE SEZIONE DI SINISTRA CON ICONE --}}


            {{-- ___INIZIO SEZIONE DI DESTRA___ --}}
            <div class="destra-dettagli-flat">
              <form action="{{ route('send', $apartment->id) }}" method="POST" novalidate>
                @csrf
                @method('POST')
                <div class="form-infos">
                  <span>
                    Scrivi all'host
                    <i class="fas fa-pencil-alt icon"></i>
                  </span>
                  <span>
                    Vedi se ci sono camere disponibili.
                  </span>
                </div>
                <div class="wrapper-form-fields">
                  <label for="email">
                    Email
                  </label>
                  <input type="email" id="email" name="email" v-model="email">
                </div>
                <textarea rows="20" cols="30" name="text_message"></textarea>
                <input type="submit" value="Invia">
              </form>
            </div>
            {{-- FINE SEZIONE DI DESTRA --}}

          </div> {{-- FINE DETTAGLI-FLAT (width: 100% height: 600px) --}}

      </div> {{-- ______________ FINE JUMBO CONTAINER __________________ --}}

    </div> {{-- ___JUMBOTRON APARTMENT FINISCE QUI (HEADER PRIMA DI QUESTO)__ --}}

  </div> {{-- _____________________ FINE APARTMENT SAMPLE ______________________ --}}
  @endsection
