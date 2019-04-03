@extends('layouts.app')

@section('content')
	<h2>Users section</h2>
	@foreach ($users as $user)
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 col-sm-8">
				<h3>
					<a href="#">{{$user->name}}</a>
					@if ($user->isadmin==1)
					<span class="badge badge-secondary" style="font-size:12px;vertical-align:middle">Admin</span>
					@endif
				</h3>
				<small>{{$user->email}}</small>
				<small>created on {{$user->created_at}}</small>
				@if ($user->isadmin!=1)
				{!!Form::open(['action'=>['UsersController@destroy',$user->id],'method'=>'POST','class'=>'float-right'])!!}
					{{Form::hidden('_method','DELETE')}}
					{{Form::submit('Delete',['class'=>'btn btn-danger'])}}
				{!!Form::close()!!}		
				@endif
			</div>
		</div>
	</div>
	@endforeach
@endsection
