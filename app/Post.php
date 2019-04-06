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
=======
<<<<<<< HEAD
}}
=======
>>>>>>> 4c8f43da0a12d49f9a30a8b70bb51904fbb3dcfd
    }
}
>>>>>>> 2cc5e846723fed6d9b42e6bf89002deb535ee454
