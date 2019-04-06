<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css">

    <title>Project | {{$question->question}}</title>
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
    @if ($question->options->count())
    <ul class="box">
        @foreach ($question->options as $option)
        <li style="list-style-type: none;">
            {{Form::open(array('url' => 'options/'.$option->id))}} {{ csrf_field() }} {{ method_field('PATCH') }}
            <label for="isAnswer" class="checbox" style="font-weight: 300;">
                        <input type="checkbox" name="isAnswer" id="isAnswer" onchange="this.form.submit()"
                        {{ $option->isAnswer ? 'checked ' : '' }}>
                        {{ $option->option }}
                    </label> {{Form::close()}}
        </li>
        @endforeach
    </ul>
    @endif


    <form action="/question/{{ $question->id }}/option" method="post" class="box">
        @csrf
        <div class="field">
            <label for="option" class="label" >New Option</label>
            <div class="control">
                <input type="text" class="input" name="option" placeholder="New Option">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Add Option</button>
            </div>
        </div>
    </form>

    <a href="/posts" class="button is-info">Back</a>
  </div>
</body>
