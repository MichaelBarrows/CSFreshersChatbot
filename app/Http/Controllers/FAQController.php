<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Question;

use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * index()
     *
     * This function returns the homepage for the faq's site with all of the
     * topics.
     */
    public function index() {
        $topics = Topic::all();
        return view('faqs.home', ['topics' => $topics]);
    }

    /**
     * show()
     *
     * This function is called when an individual topic has been selected.
     * The single topic model is selected and is returned with the view.
     * the answers and follow up questions are used in the view, as they can be
     * accessed through the topic model.
     */
    public function show($id)
    {
        $topic = Topic::findOrFail($id);
        return view('faqs.topic', ['topic' => $topic]);
    }
}
