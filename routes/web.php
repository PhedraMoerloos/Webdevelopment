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

use App\Competition;
use App\Period;
use App\Participant;



Route::get('/', 'HomeController@index')
->name('home');

Route::post('/', 'ParticipantsController@store')
->name('store-participants');


Route::get('/confirmation', 'HomeController@confirm')
->name('confirm-participation');





Route::get('/dashboard', 'AdminController@index')
->name('dashboard');

//gaat nog vervangen worden door CompetitionController@edit --> compManagerEmail, en PeriodsController@edit -> startDate, endDate
Route::patch('/dashboard', 'AdminController@edit')
->name('patch-dashboard');




Route::get('/dashboard/list-of-participants', 'ParticipantsController@show')
->name('show-participants');

Route::get('/dashboard/list-of-participants/disqualify-participant/{id}' , 'ParticipantsController@delete')
->name('delete-participant');









Route::get('/login', function () {
    return "This is where the admin logs in, if OK --> goes to dashboard";
    //methode wss gwn
});

Route::get('/logout', function () {
    return "Thank you for logging out, go to competition page / log in.";
    //methode wss gwn
});
