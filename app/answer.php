<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answer';

    public function user(Type $var = null)
    {
        return $this->hasOne('App\User', 'id', 'uploader_id');
    }

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
