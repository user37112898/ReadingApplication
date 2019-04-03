@extends('layouts.app')

@section('content')
	<h2>Users section</h2>
	@foreach ($users as $user)
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 col-sm-8">
				<h3>
					<a href="#">{{$user->name}}</a>
				</h3>
				<small>
					created on {{$user->created_at}}
				</small>
				{!!Form::open(['action'=>['UsersController@destroy',$user->id],'method'=>'POST','class'=>'float-right'])!!}
					{{Form::hidden('_method','DELETE')}}
					{{Form::submit('Delete',['class'=>'btn btn-danger'])}}
				{!!Form::close()!!}
			</div>
		</div>
	</div>
	@endforeach
@endsection
