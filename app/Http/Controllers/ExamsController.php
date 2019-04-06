<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Option;

class ExamsController extends Controller
{


    public function index($id)
    {

      $post = Post::findOrFail($id);
      return view('exam.show', compact('post'));
    }

    public function store(Post $post)
    {
      $attributes = array();
      $totalQuestions = $post->questions->count();
      $result = 0;
      foreach ($post->questions as $question) {
        $id = request($question->id);
        $option = Option::find($id);
        if($option->isAnswer) { $result += 1;}

        //$attributes[] = request($question->id);
      }


      dd($result.'/'.$totalQuestions);

    }
}
