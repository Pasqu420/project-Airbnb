@extends("layouts.main_layout")
@section("content")
  <div class="contain-main">


    <div class="outer-jumbotron">

      <h3 class="title-outer-jmb">
        Cerca tra i preferiti:
      </h3>

      <div class="slider-main" id="slider" v-cloak>

        <span>
          <i @click="backwards" class="fas fa-chevron-left"></i>
        </span>

        <ul class="apartment-samples" id="slider2">

          @foreach ($apartments as $apartment)
            <li>
              <div class="flags">
                <a href="{{ route('apartment', $apartment->id) }}">
                  <img id="{{ 'image_'.$apartment->id }}" src="{{ asset('/storage/assets/external/' . $apartment->id .'.jpg')}}" onerror="this.src='https://news.cinecitta.com/photo.aspx?s=1&w=850&path=%2Fpublic%2Fnews%2F0069%2F69239%2Fpadre_maronno.jpg'">
                </a>
                <div class="title">
                  <a href="{{ route('apartment', $apartment->id) }}">
                    <span class="test">
                      {{ $apartment->title }} 
                    </span>
                  </a>
                </div>
              </div>
            </li>

          @endforeach

        </ul>

        <span>
          <i @click="forward" class="fas fa-chevron-right"></i>
        </span>

      </div> {{-- end of slider-main --}}



      <div class="section-host" >

        <div class="host">

          <h1 class="h1-host">
            Diventa un Host
          </h1>

          <p class="p-host">
            Condividi il tuo Spazio per guadagnare in più e Cogliere Nuove Opportunità.
          </p>

          <a href="{{ route('register')}}" class="btn-host_hmpages">
            Scopri di più
          </a>


        </div>
      </div>

    </div>

  </div>
@endsection
