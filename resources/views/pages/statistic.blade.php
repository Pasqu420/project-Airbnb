@extends('layouts.statistic-layout')
@section('content')
<section id="stats" v-cloak>
    <div class="container">
        <h1>
            <span class="username"> 
                {{ $user->firstname }} {{ $user->lastname}}
            </span>
            - Le tue statistiche
        </h1>

        <ul class="stats-menu">
            <li v-bind:class="(graphType == 'views') ? 'active' : ''">
                <a class="button-link" v-on:click="generateData('views')">Visualizzazioni</a>
            </li>
            <li v-bind:class="(graphType == 'messages') ? 'active' : ''">
                <a class="button-link" v-on:click="generateData('messages')">Messaggi</a>
            </li>
        </ul>
    
        <div class="wrapper-statistics">
            <aside>
                <ul class="years-list">
                    <li v-for="year in years">
                        <a v-on:click="generateStats(year)">
                            @{{ year }}
                        </a>
                    </li>
                </ul>
            </aside>
            <div class="wrapper-graph">
                <div class="no-stats-text" v-if="noStats">Non ci sono statistiche da visualizzare!</div>
                <canvas v-else id="statsChart" aria-label="Statistiche">
                    <p>Il tuo dispositivo non supporta il canvas</p>
                </canvas>
            </div>
        </div>
    </div>
</section> 
    

    
@endsection
