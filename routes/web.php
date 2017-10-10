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
    //hebben functie in Model Period aangemaakt, later nog zien hoe hier uitvoeren
    //$period_number = 1;
    $period_number = Period::Determine_period();

    //toon juiste vraag afh van periode nu --> in periode 2 object bv
    $period_object = Period::where('period_number', $period_number)->first();


    return view('welcome', compact('competition', 'period_object', 'winners'));
});




Route::get('/decide-winner', function () {




    $period = 1;

    //zo werkt al, mag dit natuurlijk wel maar 1 keer doen aan het einde van de periode..
    // als periode 2 nu is, op einddatum om 12u 's nachts --> bepalen winnaar, wanneer die functie uitvoeren? cron?

    //id winaar bepalen --> participants uit de periode die we willen
    $id_winner = Participant::where([

        ['period_id', $period],
        ['answered_correctly', '1']

    ])->inRandomOrder()->first()->id;




    //op deze manier geeft MassAssignment error
    /*$winner = Participant::findorFail( $id );
    $winner->update(['is_winner'=> 1]);*/


    Participant::where('id', $id_winner)->update(['is_winner' => 1]);




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
