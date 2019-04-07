<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table Name
    protected $table = 'posts';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function questions(){
        return $this->hasMany('App\Question');
    }

    public function addQuestion($question)
    {
      return $this->questions()->create($question);
<<<<<<< HEAD
    }}
=======

    }
}
>>>>>>> d07150a04c3685ad2debaff6fee0e6b3d057d693
