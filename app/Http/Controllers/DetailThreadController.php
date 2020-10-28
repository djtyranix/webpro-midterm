<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DetailThreadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // passing all question correspond to current logged in user
    public function myquestion()
    {   
        $user_id = Auth::user()->id;
        $questions = DB::table('questions')
                        ->join('users', 'users.id', '=', 'questions.id_question')
                        ->select('users.name as name', 'questions.created_at', 'questions.updated_at',
                                'questions.title_question', 'questions.detail_question', 'questions.id as id', 'users.created_at as user_created_at')
                        ->where('id_question', '=', $user_id)
                        ->latest('questions.created_at')
                        ->paginate(5)->onEachSide(2);

        return view('myquestion', ['questions' => $questions]);
    }

    // passing all answer correspond to current logged in user
    public function myanswer()
    {   
        $user_id = Auth::user()->id;

        $answers = DB::table('answers')
                ->join('users', 'users.id', '=', 'answers.id_answer')
                ->join('questions', 'questions.id', '=', 'answers.id_question')
                ->select('answers.created_at', 'answers.updated_at', 'users.id as answer_user_id', 
                        'answers.id_question', 'questions.id as question_id', 'answers.id', 'answers.id_answer', 'users.created_at as user_created_at', 'answers.the_answer',
                        'questions.title_question')
                ->where('answers.id_answer', '=', $user_id)
                ->latest('answers.created_at')
                ->paginate(5)->onEachSide(2);

        // return (['answers' => $answers]);
        return view('myanswer', ['answers' => $answers]);
    }


    // passing the the detail of correspond question and all of its replies
    public function thread(Request $request)
    {
        $id = $request->id;
        $user_id = Auth::user()->id;

        $questions = DB::table('questions')
                        ->join('users', 'users.id', '=', 'questions.id_question')
                        ->select('users.name as name', 'questions.created_at', 'questions.updated_at', 'users.id as user_id', 
                                'questions.title_question', 'questions.detail_question', 'questions.id as id', 'users.created_at as user_created_at', 'questions.id_question')
                        ->where('questions.id', '=', $id)
                        ->first();

        $answers = DB::table('answers')
                        ->join('users', 'users.id', '=', 'answers.id_answer')
                        ->join('questions', 'questions.id', '=', 'answers.id_question')
                        ->select('users.name as name', 'answers.created_at', 'answers.updated_at', 'users.id as answer_user_id', 
                                'answers.id_question', 'questions.id as question_id', 'answers.id', 'answers.id_answer', 'users.created_at as user_created_at', 'answers.the_answer')
                        ->where('answers.id_question', '=', $id)
                        ->paginate(5)->onEachSide(2);

        $count = DB::table('answers')
                    ->select('*')
                    ->where('answers.id_question', '=', $id)
                    ->count();
        
        return view('detailthread')
                ->with(['questions' => $questions])
                ->with(['answers' => $answers])
                ->with(['count' => $count])
                ->with('user_id', $user_id);
    }
}