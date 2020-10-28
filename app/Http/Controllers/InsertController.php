<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Question;
use App\Answer;

class InsertController extends Controller
{

    // return insert question page
    public function insert_view()
    {
        return view('insertquestion');
    }

    
    // function to add question and its id of correspond user and redirecting to homepage
    public function ask(Request $request)
    {
        $user_id = Auth::user()->id;
        Question::create([
            'title_question' => $request->title_question,
            'detail_question' => $request->detail_question,
            'id_question' => $user_id
        ]);

        $last_id = DB::table('questions')
                ->select('questions.id')
                ->latest()
                ->first();

        return redirect('thread/'. $last_id->id);
    }
    

    // function to submit reply
    public function reply(Request $request)
    {   
        // return $request->id_question;
        $user_id = Auth::user()->id;

        Answer::create([
            'the_answer' => $request->the_answer,
            'id_question' => $request->id_question,
            'id_answer' => $user_id
        ]);

        return redirect('thread/'. $request->id_question);
    }
}