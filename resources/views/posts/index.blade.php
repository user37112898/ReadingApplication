@extends('layouts.app')

@section('header-text')
  <h1 style="text-align:center; margin-bottom: 20px; font-size: 28px;">Display All Books</h1>
@endsection

@section('content')
<div class="container">
        
                <h3 style="display:inline-block">Display All Books</h3>
                <div class="dropdown float-right" style="display:inline-block">
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
			<div class="row">
				<!--Card Layout Started-->
                <!--Tile for Book 1 started-->
                @if (count($posts)>0)
                  <div class="columns">
                    @foreach ($posts as $post)

                      <div class="column">
                        <div class="notification text-center" style="margin:10px 10px 10px 0; border-radius: 5px;
                        background-color: #022c43; opacity: .95; color: #fff;" >
                            <?php
                                $type = $post->type==1?'Book':'Article';
                            ?>
                            <div class="">
                                <h4 style="font-size: 25px;"><?php echo $type; ?></h4>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text">{{$post->description}}</p>
                            <p style="margin-bottom: 10px;">By {{$post->author}} </p>

                                @if (Auth::user()->isadmin==0)
                                <a href="/posts/{{$post->id}}" class="button is-success" style="margin-right: 5px;">Read</a>
                                    <a href="#" class="button is-info" style="margin-right: 5px;">Give Exam</a>
                                @else
                                    <div class="d-flex justify-content-center">
                                        <a href="/posts/{{$post->id}}" class="button is-success" style="margin-right: 5px;">Read</a>
                                        <a href="/posts/{{$post->id}}/edit" class="button is-info" style="margin-right: 5px;">Edit</a>

                                        {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST'])!!}
                                            {{Form::hidden('_method','PATCH')}}
                                            {{Form::submit('Delete',['class'=>'button is-danger'])}}
                                        {!!Form::close()!!}
                                    </div>
                                @endif

                            </div>
                            <div class="card-footer text-muted" >
                                {{$post->created_at}}
                                @if ($post->evaluation)
                                  <a href="/create/{{$post->id}}/questions" class="button is-success" style="float:right;" >Add Questions</a>
                                @endif
                            </div>
                        </div>
                      </div>

                    @endforeach
                    </div>
                @else
                    <h3>
                        Oops! no posts available
                    </h3>
                @endif

				<!--to here.-->

			<!--Card Layout Over-->


@endsection
