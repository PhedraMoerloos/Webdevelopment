@extends('master')



@section('content')


    <h1>Admin Dashboard:</h1>


    <form method="post" action="/hello.int/public/dashboard">

        {{ method_field('PATCH') }}

        {{ csrf_field() }}

        <div class="form-group">
            <label for="compManagerEmail">Change email address for competition mananager {{ $competition->competition_manager_name }}:</label>
            <input type="email" class="form-control" id="compManagerEmail" name= "compManagerEmail" value="{{ $competition->competition_manager_email }}" required>
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-default">Edit</button>
        </div>


        @include('partials.errors')

  </form>



@endsection
