@extends('onlineclasses.layout')
@section('content')
<div class="card-body">
    <h5 class="card-title">{{$classes->class_name}}</h5>
    <p class="card-text">{{$classes->class_date}}</p>
    <p class="card-text">{{$classes->start_time}}</p>
    <p class="card-text">{{$classes->duration}}</p>
</div>
       
@endsection