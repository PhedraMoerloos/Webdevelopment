<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Competition;

class AdminController extends Controller
{

    public function index()
    {

      $competition = Competition::first();

      return view('dashboard.dashboard', compact('competition'));

    }



    public function edit()
    {

        $this->validate(request(), [

            'compManagerEmail'   =>    'required|email'

        ]);

        Competition::Edit_CompManagerEmail( request('compManagerEmail') );


        return back();

    }


}
