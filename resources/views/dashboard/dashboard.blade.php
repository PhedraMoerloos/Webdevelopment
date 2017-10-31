@extends('layouts.app')



@section('content')


    <h1>Admin Dashboard:</h1>


    <form method="post" action="{{ route('dashboard') }}">

        {{ method_field('PATCH') }}

        {{ csrf_field() }}

        <div class="form-group">
            <label for="compManagerEmail">Email address for competition mananager {{ $competition->competition_manager_name }}:</label>
            <input type="email" class="form-control" id="compManagerEmail" name= "compManagerEmail" value="{{ $competition->competition_manager_email }}" required>
        </div>



        <h3>Change period dates:</h3>

        @foreach ($periods as $period)

        <div class="form-group">
            <label for="startDateP{{ $period->period_number }}">Startdate Period {{ $period->period_number }}:</label>
            <input type="date" class="form-control" id="startDateP{{ $period->period_number }}" name= "startDateP{{ $period->period_number }}" value="{{ $period->startdate }}" required>
        </div>

        <div class="form-group">
            <label for="endDateP{{ $period->period_number }}">Enddate Period {{ $period->period_number }}:</label>
            <input type="date" class="form-control" id="endDateP{{ $period->period_number }}" name= "endDateP{{ $period->period_number }}" value="{{ $period->enddate }}" required>
        </div>

        @endforeach


        <div class="form-group">
            <button type="submit" class="btn btn-default">Edit</button>
        </div>


        @include('partials.errors')

  </form>



@endsection
