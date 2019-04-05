<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamsController extends Controller
{
    public function index($id)
    {
      $post = Post::findOrFail($id);
      return view('exam.show', compact('post'));
    }
}
