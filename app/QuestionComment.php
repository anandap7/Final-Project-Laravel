<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionComment extends Model
{
    //
    protected $table = 'comment_question';

    public function user(Type $var = null)
    {
        return $this->hasOne('App\User', 'id', 'uploader_id');
    }
}
