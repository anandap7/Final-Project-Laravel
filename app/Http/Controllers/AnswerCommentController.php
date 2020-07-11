<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\AnswerComment;

class AnswerCommentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function store(Request $request) {
        $AnswerComment = new AnswerComment;
        $AnswerComment->uploader_id = Auth::id();
        $AnswerComment->content = $request->content;
        $AnswerComment->answer_id = $request->answer_id;
        $AnswerComment->save();

    	return redirect('/question/' . $request->question_id);
    }

    
}
