@extends('master')



@section('content')

    <div>
      <img class="logo" src="/img/petco-foundation-logo.png" alt="logo petco foundation">
    </div>



    <div class="container-ad">


        <h1 class="title-page">{{ $competition->title }}</h1>


        <div class="row">
          <div class="col-md-8 info">

            <h3>{{ $competition->description }}</h3>
            <p>Every 2 weeks a new winner is selected to adopt a beautiful goldfish.</p>



            @if(count($winners) >= 1)

                <p class="winners-title">Winners of previous periods:</p>
                @foreach ($winners as $winner)
                  <ul class="winners">
                    <li>Period {{ $winner->period_id }}: {{ $winner->firstname}} {{ $winner->lastname }}</li>
                  </ul>
                @endforeach

            @endif


          </div>

          <div class="col-md-4">
            <img class="img-fluid float-right img-size" src="{{ $competition->photo_url }}">
          </div>
        </div>



    </div>


    <div class="center">

        <form method="post" action="{{ route('store-participants') }}">

            {{ csrf_field() }}

            <h1 class="title title-form">Want to give it a go?</h1>

            <div class="form-group">
                <label for="answer">{{ $period_object->question }}</label>
                <input type="text" class="form-control" id="answer" name= "answer" placeholder="Your answer" required>
            </div>


            <h3 class="your-info">Your info:</h3>


            <div class="form">

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
                    <button type="submit" class="btn btn-default submit">Send in</button>
                </div>


                @include('partials.errors')

            </div>

        </form>

    </div><!--end container-->




@endsection
