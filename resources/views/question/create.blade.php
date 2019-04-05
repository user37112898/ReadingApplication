<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css">

    <title>Project | {{$post->title}}</title>
    <style >
      form {
        margin-top: 20px;
      }
      ul {
        margin-top: 20px;
      }
    </style>
</head>
<body>
  <div class="container">
      @if ($post->questions->count())
        <ul>
        @foreach ($post->questions as $question )
            <li>
            <a href="/question/{{$question->id}}" style="text-decoration: none; font-weight:500; font-size: 18px;">{{ $question->question }}</a>
            </li>
        @endforeach
        </ul>
      @endif
    <form action="/posts/{{ $post->id }}/question" method="post" class="box">
        @csrf
        <div class="field">
            <label for="question" class="label" >New Question</label>
            <div class="control">
                <input type="text" class="input" name="question" placeholder="New Question">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Add Question</button>
            </div>
        </div>
    </form>
  </div>
</body>
