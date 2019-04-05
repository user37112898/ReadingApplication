<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Question;
use App\Option;
use App\User;

class QuestionsController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }
    
  public function index($id)
  {

    $post = Post::findOrFail($id);
    return view('question.create', compact('post'));

  }

  public function indexOptions($id)
  {



    $question = Question::findOrFail($id);
    return view('option.create', compact('question'));
  }
    public function store(Post $post)
    {
      $attributes = request()->validate([
        'question' => 'required'
      ]);

      $post->addQuestion($attributes);

      return back();
    }

    public function storeOptions(Question $question)
    {
      $attributes = request()->validate([
        'option' => 'required'
      ]);

      $question->addOption($attributes);

      return back();
    }

    public function update(Option $option) {
      request()->has('isAnswer') ? $option->answer() : $option->notAnswer();
      return back();
    }
}
