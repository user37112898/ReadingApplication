@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <h2>
        {{$user->name}}
    </h2>
    <small>
        {{$user->email}}
    </small>
    <div>
        @for ($i = 0; $i < count($cp); $i++)
            <div class="container">
            Title:{{$postsname[$i]->title}}<br>
            @if ($cp[$i]->status == 0)
                <span>Not started</span>
            @endif
            @if ($cp[$i]->status == 1)
                <span>Reading!!</span>
            @endif
            @if ($cp[$i]->status == 2)
                <span>Completed!!</span>
            @endif
            <br>
            Result:{{$cp[$i]->result}}
            </div>
        @endfor
    </div>
</div>
@endsection
