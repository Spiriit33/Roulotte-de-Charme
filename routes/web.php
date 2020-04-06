<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@redirect')->name('redirect');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/roulotte','RoulotteController@index')->name('roulotte');
Route::get('/contact','ContactController@index')->name('contact');
Route::post('contact','ContactController@store')->name('contact');
Route::get('tarifs-reservations','TarifController@index')->name('tarifs_reservations');
Route::post('tarifs-reservations','TarifController@store')->name('tarifs_reservations');
Route::get('situer-la-roulotte','RoulotteController@situer')->name('situer_roulotte');
Route::get('reservations','TarifController@getReservations');
Route::get('/activités','ActiviteController@index')->name('activités');
Route::post('reservations/create','ReservationController@store')->name('reservation');
Route::get('mail','EmailController@index')->name('view_mail');



Route::get('/administration', 'AdminController@index')->name('administration');
Route::post('/administration', 'AdminController@postLogin')->name('administration');
Route::get('/administration/configuration','AdminController@getConfig')->name('configuration');
Route::post('/administration/configuration','ConfigurationController@store')->name('configuration');
Route::get('administration/activités','ActiviteController@manage')->name('manage_activités');
Route::post('administration/activités','ActiviteController@store')->name('manage_activités');
Route::get('administration/activites/{id}/edit','ActiviteController@edit')->name('edit_activite');
Route::post('administration/activites/{id}/edit','ActiviteController@update')->name('edit_activite');
Route::get('administration/actualités','NewsController@manage')->name('manage_news');
Route::get('administration/roulotte','RoulotteController@manage')->name('manage_roulotte');
Route::post('administration/roulotte','RoulotteController@store')->name('manage_roulotte');
Route::get('administration/roulotte/{id}/edit','RoulotteController@edit')->name('edit_roulotte');
Route::get('administration/roulotte/{id}/delete','RoulotteController@delete')->name('delete_roulotte');
Route::get('administration/sites-touristiques','SiteTouristiqueController@manage')->name('manage_site');
Route::post('administration/sites-touristiques','SiteTouristiqueController@store')->name('manage_site');
Route::get('administration/sites-touristiques/{id}/edit','SiteTouristiqueController@edit')->name('edit_sites');
Route::get('administration/sites-touristiques/{id}/delete','SiteTouristiqueController@delete')->name('delete_sites');
Route::post('administration/sites-touristiques/{id}/edit','SiteTouristiqueController@update')->name('edit_sites');
Route::get('administration/contact','ContactController@manage')->name('manage_contacts');
Route::get('administration/contact/{id}','ContactController@show')->name('show_contacts');
Route::post('administration/contact/{id}','ContactController@update')->name('show_contacts');
Route::get('administration/contact/{id}/delete','ContactController@delete')->name('delete_contact');
Route::get('administration/reservations','ReservationController@index')->name('manage_reservations');
Route::post('administration/reservations','ReservationController@store')->name('manage_reservations');
Route::get('administration/reservations/{id}','ReservationController@show')->name('show_reservation');
Route::get('administration/reservations/{id}/delete','ReservationController@destroy')->name('delete_reservation');

