@extends('layouts.pay-layout')
@section('content')

    <section id='pay-section'>

        <h3>
            Investi sulla tua Attività
        </h3>
        <p>
            Inserire i propri dati per l'acquisto del pacchetto sponsorizzazione:
        </p>

        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-style">
            <form action="{{ url('/checkout', [Auth::user(),$sponsor->id,$apartment->id]) }}" method="POST" id="payment-form">
                @csrf
                
                <div class="date-form">
                    <div class="date-elm-form">
                        <label for="name_on_card">
                            Name on Card
                        </label>
                        <input type="text" id="name_on_card" name="name_on_card">
                    </div>
        
                    <div class="date-elm-form">
                        <label for="email">
                            Email Address
                        </label>
                        <input type="email" id="email">
                    </div>
        
                    <div >
                        <div>
                            <div class="date-elm-form">
                                <label for="address">
                                    Address
                                </label>
                                <input type="text" id="address" name="address">
                            </div>
                        </div>
        
                        <div >
                            <div class="date-elm-form">
                                <label for="city">
                                    City
                                </label>
                                <input type="text" id="city" name="city">
                            </div>
                        </div>
        
                        <div >
                            <div class="date-elm-form">
                                <label for="province">
                                    Province
                                </label>
                                <input type="text" id="province" name="province">
                            </div>
                        </div>
        
                    </div>
        
                    <div>
                        <div >
                            <div class="date-elm-form">
                                <label for="postalcode">
                                    Postal Code
                                </label>
                                <input type="text" id="postalcode" name="postalcode">
                            </div>
                        </div>
        
                        <div>
                            <div  class="date-elm-form">
                                <label for="country">
                                    Country
                                </label>
                                <input type="text" id="country" name="country">
                            </div>
                        </div>
        
                        <div>
                            <div  class="date-elm-form">
                                <label for="phone">
                                    Phone
                                </label>
                                <input type="text" id="phone" name="phone">
                            </div>
                        </div>
                    </div>
                </div>
     
    
                <div id='info-card'>
                    <div >
                        <label for="cc_number">
                            Credit Card Number
                        </label>
                        <div id="card-number" class="card-style">
                        </div>
                    </div>
    
                    <div >
                        <label for="expiry">
                            Expiry
                        </label>
                        <div id="expiration-date" class="card-style">
                        </div>
                    </div>
    
                    <div >
                        <label for="cvv">
                            CVV
                        </label>
                        <div id="cvv" class="card-style">
                        </div>
                    </div>
    
                </div>
    
                <input id="nonce" name="payment_method_nonce" type="hidden" />
                <button id="strunz" type="submit" class="btn btn-success">
                    Acquista Sponsor
                </button>
            </form>
        </div>
        
    </section>

    <script src="https://js.braintreegateway.com/web/3.38.1/js/client.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.38.1/js/hosted-fields.min.js"></script>

    
    <script>

        var form = document.querySelector('#payment-form');
        var submit = document.querySelector('input[type="submit"]');

        window.onbeforeunload = function (event) {
            return '...';
        };
        document.getElementById('payment-form').onsubmit = function (event){
            window.onbeforeunload = null;
            return true;
        };

        braintree.client.create({
            authorization: '{{ $token }}'
            }, function (clientErr, clientInstance) {
            if (clientErr) {
            console.error(clientErr);
            return;
            }
            braintree.hostedFields.create({
                client: clientInstance,
                styles: {
                    'input': {
                    'font-size': '14px'
                    },
                    'input.invalid': {
                    'color': 'red'
                    },
                    'input.valid': {
                    'color': 'green'
                    }
                },
                fields: {
                    number: {
                    selector: '#card-number',
                    placeholder: '4111 1111 1111 1111'
                    },
                    cvv: {
                    selector: '#cvv',
                    placeholder: '123'
                    },
                    expirationDate: {
                    selector: '#expiration-date',
                    placeholder: 'MM/YY'
                    }
                }
            }, function (hostedFieldsErr, hostedFieldsInstance) {
                    if (hostedFieldsErr) {
                        console.error(hostedFieldsErr);
                        return;
                    }   
                    form.addEventListener('submit', function (event) {
                        event.preventDefault();
                        hostedFieldsInstance.tokenize(function (tokenizeErr, payload) {
                            if (tokenizeErr) {
                                console.error(tokenizeErr);
                                return;
                            }
                            document.querySelector('#nonce').value = payload.nonce;
                            form.submit();
                        });
                    }, false);
            });
        });
    </script>
@endsection