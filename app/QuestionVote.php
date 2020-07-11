<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionVote extends Model
{
    //
    protected $table = 'vote_question';

    public function question()
    {
    	return $this->belongsTo('App\question') ;
    }

}
