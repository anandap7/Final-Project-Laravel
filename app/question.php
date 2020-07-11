<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'uploader_id');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer', 'question_id');
    }
}
