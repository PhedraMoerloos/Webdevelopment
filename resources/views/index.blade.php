@extends('master')



@section('content')


    <div class="title m-b-md">{{ $competition->title }}</div>
    <img src="{{ $competition->photo_url }}" width= "400">
    <h4>{{ $competition->description }}</h4>
    <p>{{ $competition->competition_manager_name }}</p>
    <p>{{ $competition->competition_manager_email}}</p>



    @if(count($winners) >= 1)


      <h4>Winners of previous periods:</h4>
      @foreach ($winners as $winner)

        <ul>
          <li>{{ $winner->firstname}} {{ $winner->lastname }}</li>
        </ul>

      @endforeach


    @endif




    <p>{{ $period_object->question }}</p>




@endsection
