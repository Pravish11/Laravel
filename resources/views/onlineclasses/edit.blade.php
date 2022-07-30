@extends('onlineclasses.layout')
@section('content')
<form action="{{ url('onlineclasses/'.$classes->id) }}" method="post">
    {!! csrf_field() !!}
    @method("PATCH")
    <input type="hidden" name="id" id="id" value="{{$classes->id}}" id="id" />
    <label>Class Name</label></br>
    <input type="text" name="class_name" id="class_name" value="{{$classes->class_name}}" class="form-control"></br>
    <label>Date</label></br>
    <input type="date" name="class_date" id="class_date" value="{{$classes->class_date}}" class="form-control"></br>
    <label>Start Time</label></br>
    <input type="time" name="start_time" id="start_time" value="{{$classes->start_time}}" class="form-control"></br>
    <label>Duration</label></br>
    <input type="text" name="duration" id="duration" value="{{$classes->duration}}" class="form-control"></br>
    <input type="email" name="coach_mail" id="coach_mail" value="{{ Auth::user()->email }}" readonly="readonly" class="form-control"></br>

    <input type="submit" value="Update" class="btn btn-success"></br>
</form>
@endsection