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



Route::get('/', function () {

    //info wedstrijd
    $competition = Competition::first();

    //toon winnaars (als er al zijn)
    $winners = Participant::where('is_winner', 1)->get();


    //bepaal periode (nummer) op dit moment
    $period_number = Period::Determine_period();

    //toon juiste vraag afh van periode nu --> in periode 2 object bv
    $period_object = Period::where('period_number', $period_number)->first();


    return view('welcome', compact('competition', 'period_object', 'winners'));
});




Route::get('/decide-winner', function () {


    //zo werkt al, mag dit natuurlijk wel maar 1 keer doen aan het einde van de periode..
    // als periode 2 nu is, op einddatum om 12u 's nachts --> bepalen winnaar, wanneer die functie uitvoeren? cron?

    $period_number = Period::Determine_period();

    $id_winner = Participant::Determine_winner($period_number);

    Participant::Create_winner($id_winner);



    return $id_winner;

});









Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return "This is where the admin logs in, if OK --> goes to dashboard";
    //methode wss gwn
});

Route::get('/logout', function () {
    return "Thank you for logging out, go to competition page / log in.";
    //methode wss gwn
});
