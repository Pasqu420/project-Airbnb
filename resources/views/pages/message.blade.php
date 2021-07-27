@extends('layouts.minimal-layout')
@section('content')

    <div id="success-message">
        <div class="cnt-success-msg">
            <h2>
                Messaggio inviato!
            </h2>
            <span>
                <strong>
                  {{--The ID is: {{$idTransaction}}--}}
                </strong>
            </span>
            <div class="icon-confirm">
                <div><i class="fas fa-check-circle"></i></div>
                <div class="box"></div>
            </div>
            <span class="text-confirm">
                Una mail verrà inviata al proprietario
            </span>
            <a href="{{route('myapartment',Auth::id())}}">
                <button>
                    <b>
                        Torna agli appartamenti 
                    </b>
                </button>
            </a>
        </div>
        
    </div>
@endsection
