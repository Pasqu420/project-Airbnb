@extends('layouts.minimal-layout')

@section('content')

<div id="app" v-cloak>
    <section id="register-jumbotron" >

        <div class="jumbotron" style="width: 90%;margin:0 auto;">
            <div class="wrapper-text" style="text-align: right">
                <h2>
                    L'ospitalit&agrave; &egrave; la vera essenza della vita
                </h2>
            </div>
            <div id="carousel">
                <carousel-component>
                </carousel-component>
            </div>
        </div>

    </section>

    <section id="section-register">
        <div class="container">
            {{-- Use __('Type_some_text') when you want a localizated text --}}
            {{-- Rivedere come funziona l'attributo autocomplete --}}
            {{-- Aggiungere la gestione degli errori di Laravel --}}
            <h3>
                {{ __('Registrati') }}
            </h3>

            <form method="POST" action="{{ route('register') }}" novalidate v-on:submit="validateRegister">
                @csrf

                <div class="form-wrapper-fields">
                    <label for="firstname">
                        {{ __('Nome') }}
                    </label>
                    <input type="text" name="firstname" id="firstname" name="firstname" v-model="firstname" :class="(classes.includes('firstname')) ? 'error' : ''">
                </div>
                <div class="form-wrapper-fields">
                    <label for="lastname">
                        {{ __('Cognome') }}
                    </label>
                    <input type="text" name="lastname" id="lastname" name="lastname" v-model="lastname" :class="(classes.includes('lastname')) ? 'error' : ''">
                </div>
                <div class="form-wrapper-fields">
                    <label for="date_of_birth">
                        {{ __('Data di nascita') }}
                    </label>
                    <input type="date" name="date_of_birth" id="date_of_birth" name="date_of_birth" v-model="dateOfBirth" :class="(classes.includes('date_of_birth')) ? 'error' : ''">
                </div>
                <div class="form-wrapper-fields">
                    <label for="email">
                        {{ __('Indirizzo e-mail')}}
                    </label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" v-model="email" :class="(classes.includes('email')) ? 'error' : ''">
                </div>

                <div class="form-wrapper-fields">
                    <label for="password">
                        {{ __('Password') }}
                    </label>
                    <input type="password" name="password" v-model="password" :class="(classes.includes('password')) ? 'error' : ''">
                </div>

                <div class="form-wrapper-fields">
                    <label for="password-confirm">
                        {{ __('Conferma password') }}
                    </label>
                    <input id="password-confirm" type="password" name="password_confirmation" v-model="confirmPassword" :class="(classes.includes('confirm-password')) ? 'error' : ''">
                </div>

                <div class="form-wrapper-fields">
                    <button class="form-button" type="submit">
                        {{ __('Registrati') }}
                    </button>
                </div>

                <ul class="form-errors" v-if="formErrors.length">
                    <li v-for="error in formErrors">
                        @{{ error }}
                    </li>
                </ul>
            </form>
        </div>
    </section>
</div>
@endsection
