<?php

namespace App\Http\Controllers;
use App\Apartment;
Use App\Sponsor;
Use App\Statistic;
Use App\User;
Use App\Service;
use App\Message;
use App\Image;
use Auth;
use DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class MainController extends Controller {

    public function homepage() {
        //Filtro appartamenti sponsorizzati
        $now = Carbon::now()->setTimeZone("Europe/Rome");
        $apartments = DB::table('apartments')
                    ->join('apartment_sponsor', 'apartments.id' , '=', 'apartment_sponsor.apartment_id')
                    ->join('users', 'apartments.user_id' , '=', 'users.id')
                    ->select('apartment_sponsor.*', 'apartments.*')
                    ->where('expire_date', '>', $now)
                    ->where('apartments.deleted_at', null)
                    ->get();


        return view('pages.homepage', compact('apartments'));
    }
    // dettagli appartamento
    public function showApartment(Request $request, $id){
        $now = Carbon::now()->setTimeZone("Europe/Rome");
        $ip=\Request::ip();
        $validate=([
            'ip'=>$ip,
        ]);

        $apartment = Apartment::findOrFail($id);
        $statistic = Statistic::make($validate);
        $statistic -> apartment() -> associate($id);
        $statistic->save();
        $sponsors=Sponsor::all();

        $images = [];
        $cover_image = null;
            foreach ($apartment -> images as $key => $image) {
                if ($key == 0) {
                    $cover_image = $image->image;
                }else{
                    $images []= $image;
                }
            }
        return view('pages.apartment',compact('apartment','statistic','sponsors','images','cover_image'));
    }

    // registrazione
    public function search(Request $request){
        $now = Carbon::now()->setTimeZone("Europe/Rome");
        // dd($request->where);
        $first_search=$request->where;
        if($request->where!=null){
            $apartments= Apartment::where('address', 'LIKE','%'. $request->where.'%') -> get();
        }
        else{
            $apartments= Apartment::first()->limit(50)->get();
        }
        $apartments_sponsor = DB::table('apartments')
                    ->join('apartment_sponsor', 'apartments.id' , '=', 'apartment_sponsor.apartment_id')
                    ->join('users', 'apartments.user_id' , '=', 'users.id')
                    ->select('apartment_sponsor.*', 'apartments.*')
                    ->where('address', 'LIKE','%'. $request->where.'%')
                    ->where('expire_date', '>', $now)
                    ->where('apartments.deleted_at', null)
                    ->get();
        // dd($apartments,$first_search);
        return view('pages.search',compact('apartments','first_search','apartments_sponsor'));
    }
    public function send(Request $request,$id){
        $validate=$request->validate([
            'email'=>'required|string',
            'text_message'=>'required|string',
        ]);
        // dd($ip);
        $apartment = Apartment::findOrFail($id);
        $message=Message::make($validate);
        $message -> apartment() -> associate($id);
        $message->save();
        return view('pages.message',compact('apartment','message'));
    }}
