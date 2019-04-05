<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\Option;

class Question extends Model
{

  protected $fillable = [
    'post_id', 'question'
  ];
  public function post() {
    return $this->belongsTo(Post::class);
  }

  public function options(){
      return $this->hasMany(Option::class);
  }

  public function addOption($option)
  {
    return $this->options()->create($option);
  }
}
