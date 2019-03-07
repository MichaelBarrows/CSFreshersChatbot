<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Question;

use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        $topics = Topic::all();
        return view('faqs.home', ['topics' => $topics]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic = Topic::findOrFail($id);
        // $questions = Question::where('topic_id', $id)->get();
        return view('faqs.topic', ['topic' => $topic]);
    }
}
