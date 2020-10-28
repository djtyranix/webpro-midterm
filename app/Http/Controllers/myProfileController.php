<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class myProfileController extends Controller
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

     //Showing my profile
     public function myProfile(Request $request)
     {
        $user_id = Auth::user()->id;
        $id = $request->id;

        $myQuestion = DB::table('questions')
                    ->join('users', 'users.id', '=', 'questions.id_question')
                    ->select('users.name', 'questions.id_question', 'questions.created_at as created_at', 'questions.updated_at',
                    'questions.title_question', 'questions.detail_question', 'users.created_at as user_created_at', 'questions.id as id')
                    ->where('questions.id_question', '=', $user_id)
                    ->latest('questions.created_at')
                    ->take(5)
                    ->get();

        $myAnswer = DB::table('answers')
                ->join('users', 'users.id', '=', 'answers.id_answer')
                ->join('questions', 'questions.id', '=', 'answers.id_question')
                ->select('answers.created_at', 'answers.updated_at', 'users.id as answer_user_id', 
                        'answers.id_question', 'questions.id as question_id', 'answers.id', 'answers.id_answer', 'users.created_at as user_created_at', 'answers.the_answer',
                        'questions.title_question')
                ->where('answers.id_answer', '=', $user_id)
                ->latest('answers.updated_at')
                ->take(5)
                ->get();

        $myDetails = DB::table('users')
                ->where('id', '=', $user_id)
                ->first();

        $questionCount = DB::table('questions')
                        ->join('users', 'users.id', '=', 'questions.id_question')
                        ->where('questions.id_question', '=', $user_id)
                        ->count();
        
        $replyCount = DB::table('answers')
                        ->join('users', 'users.id', '=', 'answers.id_answer')
                        ->where('answers.id_answer', '=', $user_id)
                        ->count();

        return view('myprofile')
                ->with(['myQuestion'=>$myQuestion])
                ->with(['myAnswer'=>$myAnswer])
                ->with(['myDetails'=>$myDetails])
                ->with(['questionCount'=>$questionCount])
                ->with(['answerCount'=>$replyCount]);
     }

     public static function countReplies($id)
     {
        $count = DB::table('answers')
                ->select('*')
                ->where('answers.id_question', '=', $id)
                ->count();

        return $count;        
     }
}
