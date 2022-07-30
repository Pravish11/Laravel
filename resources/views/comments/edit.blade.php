@extends('comments.layout')
@section('content')
<div class="card">
    <div class="card-header">Comments Page</div>
    <div class="card-body">
        
        <form action="{{ url('comment/' .$comments->id) }}" method="post">
          {!! csrf_field() !!}
          @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$comments->id}}" id="id" />

          
          <input type="email" name="member_mail" id="member_mail" class="form-control" value="{{ Auth::user()->email }}" readonly="readonly"></br>
          <label>Date</label></br>
          <input type="date" name="date_posted" id="date_posted" class="form-control" value="{{$comments->date_posted}}" readonly="readonly"></br>
          <label>Comment</label></br>
          <input type="text" name="comment" id="comment" class="form-control" value="{{$comments->comment}}"></br>
          <input type="submit" value="Update" class="btn btn-success"></br>
      </form>
     
    </div>
  </div>
@stop