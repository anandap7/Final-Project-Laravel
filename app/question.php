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

    public function vote()
    {
    	return $this->hasMany('App\QuestionVote', 'question_id')->where('value','1');
    }

    public function unvote()
    {
    	return $this->hasMany('App\QuestionVote', 'question_id')->where('value','-1');
    }

    public function comment()
    {
        return $this->hasMany('App\QuestionComment', 'question_id');
    }
}
