@extends('master')



@section('content')

    <div>
      <img class="logo" src="/img/petco-foundation-logo.png" alt="logo petco foundation">
    </div>




        <h1>{{ $competition->title }}</h1>

        <div class="row">
          <div class="col-sm-8">col-sm-8</div>
          <div class="col-sm-4">col-sm-4</div>
        </div>
        <img src="{{ $competition->photo_url }}" width= "400">
        <h3>{{ $competition->description }}</h3>


        @if(count($winners) >= 1)


          <h4>Winners of previous periods:</h4>
          @foreach ($winners as $winner)

            <ul>
              <li>{{ $winner->firstname}} {{ $winner->lastname }}</li>
            </ul>

          @endforeach


          @endif




    <div class="container">

        <form method="post" action="{{ route('store-participants') }}">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="answer">{{ $period_object->question }}</label>
                <input type="text" class="form-control" id="answer" name= "answer" placeholder="Your answer" required>
            </div>


            <h3>Your info:</h3>


            <div class="form-group">
                <label for="firstname">Firstname: </label>
                <input type="text" class="form-control" id="firstname" name= "firstname" placeholder="Firstname" required>
            </div>

            <div class="form-group">
                <label for="lastname">Lastname: </label>
                <input type="text" class="form-control" id="lastname" name= "lastname" placeholder="Lastname" required>
            </div>

            <div class="form-group">
                <label for="address">Address: </label>
                <input type="text" class="form-control" id="address" name= "address" placeholder="Street + nr" required>
            </div>

            <div class="form-group">
                <label for="city">City: </label>
                <input type="text" class="form-control" id="city" name= "city" placeholder="City" required>
            </div>

            <div class="form-group">
                <label for="zipcode">Zipcode: </label>
                <input type="number" class="form-control" id="zipcode" name= "zipcode" placeholder="Zipcode" required>
            </div>

            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" class="form-control" id="email" name= "email" placeholder="Email" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-default">Send in</button>
            </div>


            @include('partials.errors')

        </form>

    </div><!--end container-->




@endsection
