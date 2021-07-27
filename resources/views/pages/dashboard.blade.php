@extends('layouts.minimal-layout')
@section('content')

<section id="user-dashboard">
    <div class="container">
        <h1>
            Dashboard di 
            <span class="username">
                {{ $user -> firstname }}
            </span>
        </h1>

        @if (count($apartments))
            <div class="wrapper-with-apartments">
               
                <ul class="wrapper-dashboard-labels">
                    <li class="dashboard-label" :class="(labelActive == 'profile-infos') ? 'active' : ''" v-on:click="labelActive = 'profile-infos'">
                        Riepilogo Profilo
                    </li>
                    <li class="dashboard-label" :class="(labelActive == 'my-apartments') ? 'active' : ''" v-on:click="labelActive = 'my-apartments'">
                        Gestisci appartamenti
                    </li>
                </ul>

                <div class="user-infos" :class="(labelActive == 'profile-infos') ? 'active' : ''">
                    <div class="wrapper-image-placeholder">
                        <img src="{{ asset('storage/assets/profile_placeholder.png') }}">
                    </div>
                    <ul>
                        <li>
                            <strong>Nome: </strong>
                            {{ $user->firstname }}
                        </li>
                        <li>
                            <strong>Cognome: </strong>
                            {{ $user->lastname }}
                        </li>
                        <li>
                            <strong>E-mail:</strong>
                            {{ $user->email }}
                        </li>
                    </ul>
                </div>
                <div class="apartments-link" :class="(labelActive == 'my-apartments') ? 'active' : ''">
                    <a href="{{ route('myapartment', $user->id)}}">
                        <h2>
                            Gestisci i tuoi appartamenti
                        </h2>
                        <span class="count-apartments">
                            ({{ count($apartments) }})
                        </span>
                    </a>
                </div>
            </div>
            
        @else
            
        <div class="wrapper-no-apartments">
            Non hai ancora registrato un appartamento?
            <a class="add-apartment-link" href="{{ route('add') }}">
                Aggiungi un appartamento
            </a>
        </div>
        @endif
    </div>
</section>
{{-- 
@if (count($apartments)!=0)

    <ul style="background-color: lightgray">
        @foreach ($apartments as $item)

        @endforeach
        <li><strong> Firstname: </strong>
            {{$item ->firstname}}
        </li>
        <li><strong> Lastname: </strong>
            {{$item ->lastname}}
        </li>
        <li><strong> Email:</strong>
            {{$item ->email}}
        </li>
        <li>
            <strong> Date of birth: </strong>
            {{$item ->date_of_birth}}
        </li>
        <li><strong>
            Numbero di case posseduto: </strong>
            <a href="{{route('myapartment',$item->id)}}" style="font-weight:bolder;background-color:green;color:white">

                {{count($apartments)}}
            </a>
        </li>
    </ul>
    <div>
    </div>
    @else
    <div style="height: 100px">
        <span style="background-color: white">
            non hai inserito ancora nessun appartmento
        </span>
    </div>
    @endif
    <a style="margin:1.5rem;padding:1rem;background-color:blue" href="{{route('add',$user->id)}}">add</a>
 --}}



    {{-- <ul>
        <li>
            {{$apartment -> title}}
        </li>
        <li>
            {{$apartment -> number_rooms}}
        </li>
        <li>
            {{$apartment -> number_toiletes}}
        </li>
        <li>
            {{$apartment -> number_beds}}
        </li>
        <li>
            {{$apartment -> area}}
        </li>
        <li>
            {{$apartment -> address}}
        </li>
        <li>
            {{$apartment -> latitude}}
        </li>
        <li>
            {{$apartment -> longitude}}
        </li>
        <img src="{{$apartment -> cover_image}}" alt="">

    </ul> --}}
@endsection
