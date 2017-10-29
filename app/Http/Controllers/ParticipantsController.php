<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Participant;
use App\Period;


class ParticipantsController extends Controller
{


    public function show()
    {

        $valid_participants = Participant::where('is_allowed_to_play', 1)->get();

        return view('dashboard/list-participants', compact('valid_participants'));

    }







    public function store(Request $request)
    {

        $participant = new Participant;

        //ingevulde velden
        $participant->firstname = $request->get('firstname'); //name uit form
        $participant->lastname = $request->get('lastname');
        $participant->address = $request->get('address');
        $participant->city = $request->get('city');
        $participant->zipcode = $request->get('zipcode');
        $participant->email = $request->get('email');

        //zelf bepalen
        $request->merge(['ipaddress' => request()->ip()]);
        $participant->ipaddress = $request->get('ipaddress');

        $participant->competition_id = 1;


        //bepalen via methodes nog

        //methodes
        $period_id = Period::Determine_period();
        $period_answer = Period::getPeriodAnswer($period_id);


        $answered_correctly;
        if ( strcasecmp( $request->get('answer'), $period_answer )  == 0 ) {
          $answered_correctly = true;
        }

        else {
          $answered_correctly = false;
        }


        $participant->period_id = $period_id;
        $participant->answered_correctly = $answered_correctly;



        $this->validate(request(), [

            'firstname'   =>    'required|string|min:2|max:40',
            'lastname'    =>    'required|string|min:2|max:40',
            'address'     =>    'required|string|min:4',
            'city'        =>    'required|string|min:2',
            'zipcode'     =>    'required|integer',
            'answer'      =>    'required|string|min:2',
            'email'       =>    'required|email',

          ]);


        /*$this->validate(request(), [

            'firstname'   =>    'required|string|min:2|max:40',
            'lastname'    =>    'required|string|min:2|max:40',
            'address'     =>    'required|string|min:4',
            'city'        =>    'required|string|min:2',
            'zipcode'     =>    'required|integer',
            'answer'      =>    'required|string|min:2',
            'email'       =>    'required|email',
            'ipaddress'   =>    'unique:participants,ipaddress',

          ], [

            'ipaddress.unique' => 'It seems you have already entered the competition this period.',

          ]);*/



        $participant->save();

        //4 Hier doet hij de validatie op de inputs van het form op '/' en als alles in orde is, slaagt hij de nieuwe participant op

        //5 hierna gaat hij naar de pagina die gegenereerd wordt door route confirm-participation

        return redirect(route('confirm-participation'));

    }









    public function delete($id)
    {

      Participant::where('id', $id)->update(['is_allowed_to_play' => 0]);

      return redirect()->route('show-participants');

    }


}
