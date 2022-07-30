@extends('comments.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Comments Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Rating : {{ $comments->rating }}</h5>
        <p class="card-text">Date : {{ $comments->date_posted }}</p>
        <p class="card-text">Comment : {{ $comments->comment }}</p>
  </div>
       
    </hr>
  
  </div>
</div>