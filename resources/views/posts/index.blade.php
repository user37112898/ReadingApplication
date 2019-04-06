@extends('layouts.app')

@section('content')
<div class="container">
        <div class="alert alert-success" role="alert" align="center">
                <h3 style="display:inline-block">Display All Books</h3> 
                {{-- Filters --}}
                <div class="float-right">
                {{-- TagFilter --}}
                <div class="dropdown" style="display:inline-block">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tag
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <form action="/postsalltags" method="POST">
                            {{ method_field('PATCH') }}
                            @csrf
                            <input onclick="index()" id="btn_next" class="dropdown-item" type="submit" value="All Tags">
                        </form>
                        <form action="/poststechnology" method="POST">
                            {{ method_field('PATCH') }}
                            @csrf
                            <input onclick="technology()" id="btn_next" class="dropdown-item" type="submit" value="Technology">
                        </form>
                        <form action="/postsbusiness" method="POST">
                            {{ method_field('PATCH') }}
                            @csrf
                            <input onclick="business()" id="btn_next" class="dropdown-item" type="submit" value="Business">
                        </form>
                        <form action="/postscompany" method="POST">
                            {{ method_field('PATCH') }}
                            @csrf
                            <input onclick="company()" id="btn_next" class="dropdown-item" type="submit" value="Company">
                        </form>
                        <form action="/postsinnovation" method="POST">
                            {{ method_field('PATCH') }}
                            @csrf
                            <input onclick="innovation()" id="btn_next" class="dropdown-item" type="submit" value="Innovation">
                        </form>
                    </div>
                </div>
                {{-- LangaugeFilter --}}
                <div class="dropdown" style="display:inline-block">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Langauge
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <form action="/postsallpost" method="POST">
                            {{ method_field('PATCH') }}
                            @csrf
                            <input onclick="index()" id="btn_next" class="dropdown-item" type="submit" value="All Langauges">
                        </form>
                        <form action="/postsenglish" method="POST">
                            {{ method_field('PATCH') }}
                            @csrf
                            <input onclick="english()" id="btn_next" class="dropdown-item" type="submit" value="English">
                        </form>
                        <form action="/postshindi" method="POST">
                            {{ method_field('PATCH') }}
                            @csrf
                            <input onclick="hindi()" id="btn_next" class="dropdown-item" type="submit" value="Hindi">
                        </form>
                        <form action="/postsgujarati" method="POST">
                            {{ method_field('PATCH') }}
                            @csrf
                            <input onclick="gujarati    ()" id="btn_next" class="dropdown-item" type="submit" value="Gujarati">
                        </form>
                    </div>
                </div>
            </div>
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
                                            {{Form::hidden('_method','PATCH')}}
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
