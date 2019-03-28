@extends('layouts.app')

@section('content')
<div class="container">
        <div class="alert alert-success" role="alert" align="center">
				<h3>Display All Books</h3>
			</div>
			<div class="row">
				<!--Card Layout Started-->
                <!--Tile for Book 1 started-->
                @if (count($posts)>0)
                    @foreach ($posts as $post)
                    <div class="col-sm-6">
                        <div class="card text-center">
                            <div class="card-header">
                                Book
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$post->title}}</h5>
                                <p class="card-text">{{$post->description}}</p>
                                <a href="#" class="btn btn-primary">Read</a>
                                <a href="#" class="btn btn-primary">Give Exam</a>
                            </div>
                            <div class="card-footer text-muted">
                                {{$post->created_at}}
                            </div>
                        </div>
                    </div>
                    @endforeach    
                @else
                    <h3>
                        Oops! no posts available
                    </h3>
                @endif
                
				<!--to here.-->
			</div>
			<!--Card Layout Over-->
		</div>
</div>
@endsection
