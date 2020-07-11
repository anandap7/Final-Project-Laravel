<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\answer;
use App\question;

class QuestionController extends Controller
{
    //
    public function index(){
    	$question = question::all();
    	return view('question.index', compact('question'));
    }

    Public function create(){
    	return view('question.form');
    }

    Public function store(Request $request){
    	$question = new question;
        $question->title = $request->title;
        $question->content = $request->content;
        $question->tags = $request->tags;
        $question->uploader_id = $request->uploader_id;
        $question->save();
        $question = question::all();
    	return view('question.index', compact('question'));
    }

    Public static function show($id){
        $question = question::where('id', $id)->get();
        $answer = answer::where('uploader_id', $id)->get();
        return view('question.detail', compact('question','answer'));
    }

   

}
