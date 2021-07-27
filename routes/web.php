<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

    // ROTTE LIBERE

// HOMEPAGE appartamenti in vetrina
Route::get('homepage', 'MainController@homepage') -> name('homepage');

//Ricerca avanzata
Route::get('/search', 'MainController@search') -> name('search');

// // Rotte per add apartment
Route::get('/add', 'HomeController@add') -> name('add');
Route::post('/add_function', 'HomeController@add_function')->name('add_function');

// // Rotte per edit apartment
Route::get('/edit/{id}', 'HomeController@edit') -> name('edit');
Route::post('/edit_function/{id}', 'HomeController@edit_function')->name('edit_function');
// edit Image
Route::get('/edit_image/{id}','HomeController@edit_image')->name('edit_image');
Route::post('/update_image/{id}/{idApartment}','HomeController@update_image')->name('update_image');
// add Image
Route::get('/add_image/{id}','HomeController@add_image')->name('add_image');
Route::post('store_image/{idApartment}/','HomeController@store_image')->name('store_image');
// Rotta Soft-Delete
Route::get('/delete/{id}','HomeController@deleteApartment')->name('delete');

// Dettagli appartamento
Route::get('/apartment/{id}','MainController@showApartment')->name('apartment');


//Messaggio inviato
Route::post('/send/{id}','MainController@send')-> name('send');

Route::get('/statistic/{id}', 'HomeController@statistic') -> name('statistic');
Route::get('/dashboard/{id}', 'HomeController@dashboard') -> name('dashboard');
Route::get('/myapartment/{id}', 'HomeController@myapartment') -> name('myapartment');

// //Sponsor function
Route::get('/sponsor/{id}', 'HomeController@sponsor') -> name('sponsor');
Route::get('/sponsor_function/{id}', 'PayController@sponsor_function')->name('sponsor_function');

// rotta post braintree
Route::get('/form_pay','PayController@form_pay')->name('form_pay');
Route::post('/checkout/{userId}/{sponsorId}/{apartmentId}', 'PayController@pay')->name('pay');
// redirect payment success
Route::get('/success_message','PayController@success')->name('success');

//ROtte di debug(senza login)
Route::get('/pages/maps', 'MainController@maps');


Route::view('/success', 'pages/success');