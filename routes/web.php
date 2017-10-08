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

    $competitions = DB::table('competitions')->get();

    return view('welcome', compact('competitions'));
});


Route::get('/decide-winner', function () {


    //stap 1 --> CheckPeriod() --> now() vergelijken met datums periodes, alle periodes DB doorlopen en zien of now() >= startdate en now() <= enddate is --> $period = bv 2 (period.period_nummer)
    //normaal $period = 2 door die methode bepaald
    $period = DB::table('periods')->where([

        ['startdate', '<=', '2017-10-24 11:57:27'],
        ['enddate', '>=', '2017-10-24 11:57:27']

    ])->get();




    /*$period = 1;

    //zo werkt al, mag dit natuurlijk wel maar 1 keer doen aan het einde van de periode..
    $random_participants_answered_correctly = DB::table('participants')->where([

        ['period_id', $period],
        ['answered_correctly', '1']

    ])->inRandomOrder()->get();


    //$id_winner = $random_participants_answered_correctly->first()->id;

    //nu nog doorvoeren naar db
    /*$winner = Participant::findorFail( $id );
    $winner->update(['is_winner'=> 1]);*/

    //zo werkt al, mag dit natuurlijk wel maar 1 keer doen aan het einde van de periode..
    /*DB::table('participants')
            ->where('id', $id_winner)
            ->update(['is_winner' => 1]);*/




    return $period;



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
