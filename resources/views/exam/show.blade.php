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
      p {
        text-indent: 4em;
      }
    </style>
</head>
<body>
  <div class="container">
    @if ($post->questions->count())
    <form action="/exam/{{$post->id}}" method="post" class="box"   >
        @csrf
        @foreach ($post->questions as $question)
            <h2>{{ $question->question }}</h2>
            @if ($question->options->count())
              @foreach ($question->options as $option)

                <input class="radio" name="{{ $question->id }}" value="{{ $option->id }}" type="radio" id="{{ $option->id }}" >
                <label for="{{ $question->id }}" >{{ $option->option }}</label><br >
              @endforeach
            @endif
        @endforeach
        <div class="field" style="margin-top: 5px;">
            <div class="control">
                <button type="submit" class="button is-link">Submit</button>
            </div>
        </div>
    </form>
    @endif
  </div>
</body>
