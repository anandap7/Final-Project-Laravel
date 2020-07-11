<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\QuestionComment;

class QuestionCommentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function store(Request $request) {
        $QuestionComment = new QuestionComment;
        $QuestionComment->uploader_id = Auth::id();
        $QuestionComment->content = $request->content;
        $QuestionComment->question_id = $request->question_id;
        $QuestionComment->save();

    	return redirect('/question/'.$QuestionComment->question_id);
    }
}
