<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
  protected $fillable = [
    'question_id', 'option', 'isAnswer'
  ];

    public function question() {
      return $this->belongsTo('App\Question');
    }

    public function answer($isAnswer = true)
    {
        $this->update(['isAnswer' => $isAnswer]);
    }

    public function notAnswer()
    {
        $this->answer(false);
    }
}
