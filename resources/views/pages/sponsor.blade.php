@extends('layouts.minimal-layout')
@section('content')
<div id="sponsor-apartament">


    <form action="{{Route('form_pay')}}" method="get">
        @csrf
        @method('get')
        
        <div>
            <div>
                <h2>
                    {{$apartment->title}} 
                </h2> 
                <p>Scopri le tipologie di <strong>sponsorizzazione 2021</strong> e scegli quella più adatta alle tue esigenze!  </p>
                <div style="display: none">
                    <label for="apartment_id"></label>
                    <input type="number" name="apartment_id" id="apartment_id" value="{{$apartment->id}}">
                </div>
            </div>
            <h2 class="title-sponsor">
                Sponsors:
            </h2>
            <div class="label-sponsor-contain">
                @foreach ($sponsors as $sponsor)
                    <div class="label-sponsor">
                        <label for="" class="title-label"> 
                            @switch($sponsor->id)
                                @case(1)
                                    SMART 
                                    @break
                                @case(2)
                                    PREMIUM
                                    @break
                                @case(3)
                                    BUSINESS 
                                    @break
                            @endswitch 
                        </label>
                        <span class="price-sponsor">
                           <span class="euro-price">
                               &euro;
                            </span>  
                            <strong>
                                <?php echo $sponsor->price / 100 ?> 
                            </strong>                           
                        </span>
                        <label for="sponsor_id">{{$sponsor->sponsor_duration}} Ore </label>
                        <div>
                            <input type="radio" name="sponsor_id" id="sponsor_id" value="{{$sponsor->id}}" class="btn-sponsor">
                            <span>Seleziona</span>
                        </div>                    

                    </div>
                @endforeach
            </div>
            <div class="bnt-spons-send">
                <button type="submit">Invia</button>
            </div>
            
        </div>
    </form>
</div>
@endsection