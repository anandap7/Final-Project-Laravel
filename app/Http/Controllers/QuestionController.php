<?php

namespace App\Http\Controllers;

use App\Question;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'question';
        $questions = Question::all();
    	return view('question.index', compact('questions', 'page',));
    }

    public function mine()
    {
        $page = 'user';
        $questions = Question::where('uploader_id', Auth::id())->get();
    	return view('question.my', compact('questions', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = 'question';
        return view('question.form', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $question = new Question;
        $question->title = $request->title;
        $question->content = $request->content;
        $question->tags = $request->tags;
        $question->uploader_id = Auth::id();
        $question->save();

    	return redirect('/question');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question 
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $page = 'question';
        $answers = $question->answers;
        $total = count($question->vote) - count($question->unvote) ;
        $QuestionComment = $question->comment;
        foreach ($answers as $answer) {
            $date = new DateTime($answer->created_at);
            $now = new DateTime();
            $diff = $date->diff($now);

            if($diff->format('%d') > 7) $answer->diff = date_format(date_create($answer->created_at), 'd M Y');
            else if($diff->format('%d') != 0) $answer->diff = $diff->format('%d days ago');
            else if($diff->format('%h') != 0) $answer->diff = $diff->format('%h hours ago');
            else if($diff->format('%i') != 0) $answer->diff = $diff->format('%i minutes ago');
            else if($diff->format('%s') != 0) $answer->diff = $diff->format('%s seconds ago');
        }
        return view('question.detail', compact('question', 'answers', 'page','total','QuestionComment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $page = 'question';
        return view('question.form', compact('question', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $question->title = $request->title;
        $question->content = $request->content;
        $question->tags = $request->tags;
        $question->save();

    	return redirect('/question/my');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();

    	return redirect('/question/my');
    }


}
