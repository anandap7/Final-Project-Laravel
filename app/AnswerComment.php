<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerComment extends Model
{
    //
    protected $table = 'comment_answer';

    public function user(Type $var = null)
    {
        return $this->hasOne('App\User', 'id', 'uploader_id');
    }
}
