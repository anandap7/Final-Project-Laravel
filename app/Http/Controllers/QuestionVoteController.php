<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\QuestionVote;
use App\Question;
use App\User;
use App\answer;

class QuestionVoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    Public function vote($question_id, $uploader_id){
		$page = 'question';
        $answers = answer::where('question_id', $question_id)->get();
    	$vote = new QuestionVote;
    	$vote->question_id = $question_id;
    	$vote->uploader_id = $uploader_id;
        $vote->value = 1;
        $vote->save();
        
        $plus = user::find($uploader_id);
        $plus->reputation += 10;
        $plus->save();

        return redirect('/question/'.$question_id);
    }

    Public function unvote($question_id, $uploader_id){
    	$page = 'question';

    	$vote = new QuestionVote;
    	$vote->question_id = $question_id;
    	$vote->uploader_id = $uploader_id;
        $vote->value = -1;
        $vote->save();
        
        $min = user::find($uploader_id);
        $min->reputation -=1;
        $min->save();

        return redirect('/question/'.$question_id);
    }
}
