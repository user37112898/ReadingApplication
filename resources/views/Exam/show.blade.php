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
    <div class="box">
        @foreach ($post->questions as $question)
          <p>{{  }}</p>
        @endforeach
    </div>
    @endif
  </div>
</body>
