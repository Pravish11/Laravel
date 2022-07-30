@extends('comments.layout')
@section('content')
<div class="card">
    <div class="card-header">Comments Page</div>
    <div class="card-body">
        
        <form action="{{ url('comment') }}" method="post">
          {!! csrf_field() !!}
          <div class="reviews" style="margin-left: 48%;">
            <input type="radio" name="rating" value="5" id="rate-5"><label for="rate-5">☆</label>
            <input type="radio" name="rating" value="4" id="rate-4"><label for="rate-4">☆</label>
            <input type="radio" name="rating" value="3" id="rate-3"><label for="rate-3">☆</label>
            <input type="radio" name="rating" value="2" id="rate-2"><label for="rate-2">☆</label>
            <input type="radio" name="rating" value="1" id="rate-1" required><label for="rate-1">☆</label>
          </div>
          
          <input type="email" name="member_mail" id="member_mail" class="form-control" value="{{ Auth::user()->email }}" readonly="readonly"></br>
          <label>Date</label></br>
          <input type="date" name="date_posted" id="date_posted" class="form-control" value=<?php echo date("Y-m-d");?> readonly="readonly"></br>
          <label>Comment</label></br>
          <input type="text" name="comment" id="comment" class="form-control"></br>
          <input type="submit" value="Save" class="btn btn-success"></br>
      </form>
     
    </div>
  </div>
   
  @stop