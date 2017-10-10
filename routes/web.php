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

Route::get('/', function () {

    //info wedstrijd
    $competition = DB::table('competitions')->find(1); //normaal find bepaalde $id maar hier weten we dat er maar 1 wedstrijd is dus dat we gwn die moeten hebben


    //toon winnaars (als er al zijn)
    $winners = DB::table('participants')->where('is_winner', 1)->get();


    //bepaal periode
    $period_number = DB::table('periods')->where([

        ['startdate', '<=', NOW()],
        ['enddate', '>=', NOW()]

    ])->first()->period_number;


    //toon juiste vraag afh van periode nu
    $period_now = DB::table('periods')->where('period_number', $period_number)->find(1); //er gaat er maar 1 inzitten, moeten die gwn hebben
    


    return view('welcome', compact('competition', 'period_now', 'winners'));
});




Route::get('/decide-winner', function () {


    //periode bepalen --> met datum nu vergelijken
    /*$period = DB::table('periods')->where([

        ['startdate', '<=', NOW()],
        ['enddate', '>=', NOW()]

    ])->first()->period_number;*/


    $period = 2;

    //zo werkt al, mag dit natuurlijk wel maar 1 keer doen aan het einde van de periode..
    // als periode 2 nu is, op einddatum om 12u 's nachts --> bepalen winnaar, wanneer die functie uitvoeren? cron?

    //id winaar bepalen --> participants uit de periode die we willen
    $id_winner = DB::table('participants')->where([

        ['period_id', $period],
        ['answered_correctly', '1']

    ])->inRandomOrder()->first()->id;




    //nu nog doorvoeren naar db
    /*$winner = Participant::findorFail( $id );
    $winner->update(['is_winner'=> 1]);*/


    DB::table('participants')
            ->where('id', $id_winner)
            ->update(['is_winner' => 1]);




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
