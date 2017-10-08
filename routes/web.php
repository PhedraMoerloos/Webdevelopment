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
