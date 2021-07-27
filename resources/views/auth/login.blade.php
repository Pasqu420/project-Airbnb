@extends('layouts.register-layout')

@section('content')

<section id='login-section'>
    <div class="container">
        {{-- Use __('Type_some_text') when you want a localizated text --}}
        {{-- Rivedere come funziona l'attributo autocomplete --}}
        {{-- Aggiungere la gestione degli errori di Laravel --}}
        <h3>
            {{ __('Login') }}
        </h3>

        <form method="POST" action="{{ route('login') }}" novalidate v-on:submit="validateLogin">
            @csrf
            <div class="wrapper-form-fields">
                <label for="email">
                    {{ __('E-mail')}}
                </label>

                <input type="email" name="email" id="email" value="{{ old('email')}}" autocomplete="email" v-model="email" :class="(classes.includes('email')) ? 'error' : ''">
            </div>

            <div class="wrapper-form-fields">
                <label for="password">
                    {{ __('Password')}}
                </label>
                <input type="password" name="password" id="password" v-model="password" :class="(classes.includes('password')) ? 'error' : ''">
            </div>

            <div class="wrapper-form-botton">
                <button type="submit">
                    {{ __('Login') }}
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
    
@endsection

