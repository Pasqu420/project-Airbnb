<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Auth;
use App\Apartment;
use App\Sponsor;
use App\User;
use Braintree;
use Carbon\Carbon;

class PayController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    // add sponsor
    public function sponsor_function($apartmentId,$sponsorId)
    {   
        $now = Carbon::now()->setTimeZone('Europe/Rome');
        $expire = Carbon::now()->setTimeZone("Europe/Rome");

        switch ($sponsorId) {
            case 1:
                $expire->modify('+24 hours');
                break;
            case 2:
                $expire->modify('+72 hours');
                break;
            case 3:
                $expire->modify('+144 hours');
                break;
        }

        $apartment = Apartment::findOrFail($apartmentId);
        $apartment->update([$apartmentId,$sponsorId]);
        $apartment->sponsors()
            ->attach($sponsorId,
                [
                    'start_date' => $now,
                    'expire_date' => $expire
                ]
            );
    }

    // form braintree
    public function form_pay(Request $request)
    {
        $validated = $request -> validate([
            'apartment_id' => 'required',
            'sponsor_id' => 'required'
        ]);
        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        // dd($validated);
        $token = $gateway->ClientToken()->generate();
        $apartment = Apartment::findOrFail($validated['apartment_id']);
        $sponsor = Sponsor::findOrFail($validated['sponsor_id']);
        $price = $sponsor->price / 100;
        // dd($apartment,$sponsor);
        return view('pages.pay',compact('apartment','sponsor','price','token'));
    }

    // checkout braintree
    public function pay(Request $request,$userId,$sponsorId,$apartmentId)
    {
        $user = User::find($userId);
        $sponsor = Sponsor::findOrFail($sponsorId);
        $sponsorPrice = $sponsor->price / 100;
        $amount = $sponsorPrice;

        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $nonce = $request->payment_method_nonce;
        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => $user->firstname,
                'lastName' => $user->lastname,
                'email' => $user->email,
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
            
        if ($result->success) {
            $transaction = $result->transaction;
            $this->sponsor_function($apartmentId,$sponsorId);
            $idTransaction = $transaction->id;
            return view('pages.success',compact('idTransaction'));
        } else {
            $errorString = "";
            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }
            return back()->withErrors('An error occurred with the message: '.$result->message);
        }
    }
}
