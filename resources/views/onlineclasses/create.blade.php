@extends('onlineclasses.layout')
@section('content')
<form action="{{ url('onlineclasses') }}" method="post">
    {!! csrf_field() !!}
    <label>Class Name</label></br>
    <input type="text" name="class_name" id="class_name" class="form-control"></br>
    <label>Date</label></br>
    <input type="date" name="class_date" id="class_date" class="form-control"></br>
    <label>Start Time</label></br>
    <input type="time" name="start_time" id="start_time" class="form-control"></br>
    <label>Duration</label></br>
    <input type="text" name="duration" id="duration" class="form-control"></br>
    <input type="email" name="coach_mail" id="coach_mail" value="{{ Auth::user()->email }}" readonly="readonly" class="form-control"></br>

    <input type="submit" value="Save" class="btn btn-success"></br>
</form>
@endsection