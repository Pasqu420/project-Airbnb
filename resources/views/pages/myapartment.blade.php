@extends("layouts.minimal-layout")
@section("content")

<section id="my-apartments">
    <div class="container">
        <div class="wrapper-user-add">
            <h1>
                <span class="username"> 
                    {{ $user->firstname }} {{ $user->lastname}}
                </span>
                <span class="separator">
                    -
                </span>
               <span class="h1-voce"> 
                   I tuoi appartamenti 
                </span>
            </h1>
            <a class="button-link" href="{{ route('add')}}">
                Aggiungi un appartamento   
                <i class="fas fa-plus"></i>
            </a>
        </div>

        <div>
            @foreach ($apartments as $apartment)
            <my-apartment :apartment="{{ $apartment }}">

                <template v-slot:view>
                 <a class="button-link left" href="{{ route('apartment', $apartment->id) }}">
                      <span>
                        Visualizza
                      </span> 
                     <i class="fas fa-eye"></i>
                  </a>
                </template> 
                
                <template v-slot:delete>
                    <a class="button-link delete" href="{{ route('delete', $apartment->id) }}">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </template>

                <template v-slot:edit>
                    <a class="button-link" href="{{ route('edit', $apartment->id) }}">
                       <span>
                           Modifica
                        </span> 
                        <i class="fas fa-edit"></i>
                    </a>
                </template>

                @if (count($apartment->images) < 5)
                    <template v-slot:add-image>
                        <a class="button-link" href="{{ route('add_image', $apartment->id) }}">
                            <span>
                                Carica immagini
                            </span> 
                            <i class="fas fa-camera-retro"></i>
                        </a>
                    </template>
                @endif

                <template v-slot:edit-image>
                    <a class="button-link" href="{{ route('edit_image', $apartment->id) }}">
                        <span>
                            Modifica immagini
                         </span> 
                         <i class="fas fa-images"></i>
                     </a>
                </template>

                <template v-slot:statistic>
                    <a class="button-link" href="{{ route('statistic', $apartment->id) }}">
                       <span>
                           Statistiche
                        </span> 
                        <i class="fas fa-chart-bar"></i>
                    </a>
                </template>

                <template v-slot:sponsor>
                    <a class="button-link right" href="{{ route('sponsor', $apartment->id) }}">
                        <span>
                            Sponsor  
                        </span> 
                        <i class="fas fa-euro-sign"></i>
                    </a>
                </template>
            </my-apartment>
            @endforeach
        </div>
    </div>
</section>
@endsection