@extends('layouts.app')

@section('content')
<form class="notification is-info">
  <h1 style="font-size: 25px;">Self Evaluation Question</h1>
  <p style="font-size: 20px; margin-bottom: 7px;" >1. Do you read newspaper?</p>
  <input type="radio" name="newspaper" class="radio" value="7">I read newspaper Daily.<br>
  <input type="radio" name="newspaper" value="3">I read newspaper thrice in a week.<br>
  <input type="radio" name="newspaper" value="0"> I dont read newspaper.
  <p style="font-size: 20px; margin-bottom: 7px;">2. How many book do you read in a month?</p>
  <input type="radio" name="book" value="0"> I dont read books.<br>
  <input type="radio" name="book" value="1"> I read 1-5 books in a month.<br>
  <input type="radio" name="book" value="6"> I read more than 5 books in month.
  <p style="font-size: 20px; margin-bottom: 7px;">3. How many articles do you read in a month?</p>
  <input type="radio" name="articles" value="0"> I dont read books.<br>
  <input type="radio" name="articles" value="1"> I read 1-5 books in a month.<br>
  <input type="radio" name="articles" value="6"> I read more than 5 books in month.
  <div class="field">
      <div class="control">
          <button type="submit" class="button" style="background-color:#1F3036; border:none; color: #fff; margin-top: 10px;">Submit</button>
      </div>
  </div>
</form>
@endsection
