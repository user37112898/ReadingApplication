@extends('layouts.app')

@section('content')
<div class="container">
        <div class="alert alert-success" role="alert" align="center">
				<h3>Display All Books</h3>
            </div>
            <div align="center">
                    <button type="button" class="btn btn-outline-success ml-3">large</button>
                    <button type="button" class="btn btn-outline-primary ml-3">Medium</button>
                    <button type="button" class="btn btn-outline-danger ml-3">Small</button>
            </div>
			<div class="row">
				<!--Card Layout Started-->
                <!--Tile for Book 1 started-->
                @if (count($posts)>0)
                    @foreach ($posts as $post)
                    <div class="col-sm-6">
                        <div class="card text-center">
                            <?php
                                $type = $post->type==1?'Book':'Article';
                            ?>
                            <div class="card-header">
                                <?php echo $type; ?>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text">{{$post->description}}</p>
                            <p>By {{$post->author}} </p>
                                
                                @if (Auth::user()->isadmin==0)
                                <a href="/posts/{{$post->id}}"><button type="button" class="btn btn-outline-success ml-3">Read</button></a>
                                    <a href="#" class="btn btn-outline-primary ml-3">Give Exam</a>   
                                @else
                                    <div class="d-flex justify-content-center">
                                        <a href="/posts/{{$post->id}}"><button type="button" class="btn btn-outline-success ml-3">Read</button></a>
                                        
                                        <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-primary ml-3">Edit</a>
                                        {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST'])!!}
                                            {{Form::hidden('_method','DELETE')}}
                                            {{Form::submit('Delete',['class'=>'btn btn-outline-danger ml-3'])}}
                                        {!!Form::close()!!}
                                    </div>   
                                @endif
                            
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
