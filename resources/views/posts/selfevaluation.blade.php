@extends('layouts.app')

@section('content')
<h3>Self Evaluation Question</h3>
<p>Do you read newspaper?</p>
<input type="radio" name="newspaper" value="7">I read newspaper Daily.<br>
<input type="radio" name="newspaper" value="3">I read newspaper thrice in a week.<br>
<input type="radio" name="newspaper" value="0"> I dont read newspaper. 
<p>How many book do you read in a month?</p>
<input type="radio" name="book" value="0"> I dont read books.<br>
<input type="radio" name="book" value="1"> I read 1-5 books in a month.<br>
<input type="radio" name="book" value="6"> I read more than 5 books in month.
<p>How many articles do you read in a month?</p>
<input type="radio" name="articles" value="0"> I dont read books.<br>
<input type="radio" name="articles" value="1"> I read 1-5 books in a month.<br>
<input type="radio" name="articles" value="6"> I read more than 5 books in month. 
@endsection