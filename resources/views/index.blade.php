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



    <form method="post" action="/hello.int/public/">

        {{ csrf_field() }}

        <div class="form-group">
          <label for="answer">{{ $period_object->question }}</label>
          <input type="text" class="form-control" id="answer" name= "answer" placeholder="Your answer">
        </div>


        <h3>Your info:</h3>


        <div class="form-group">
          <label for="firstname">Firstname: </label>
          <input type="text" class="form-control" id="firstname" name= "firstname" placeholder="Firstname">
        </div>

        <div class="form-group">
          <label for="lastname">Lastname: </label>
          <input type="text" class="form-control" id="lastname" name= "lastname" placeholder="Lastname">
        </div>

        <div class="form-group">
          <label for="address">Address: </label>
          <input type="text" class="form-control" id="address" name= "address" placeholder="Street + nr">
        </div>

        <div class="form-group">
          <label for="city">City: </label>
          <input type="text" class="form-control" id="city" name= "city" placeholder="City">
        </div>

        <div class="form-group">
          <label for="zipcode">Zipcode: </label>
          <input type="number" class="form-control" id="zipcode" name= "zipcode" placeholder="Zipcode">
        </div>

        <button type="submit" class="btn btn-default">Send in</button>

  </form>




@endsection