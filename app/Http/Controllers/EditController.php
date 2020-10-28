<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    //
    public function edit_thread(Request $request)
    {
        $id =$request->id;
        $questions = DB::table('questions')
                    ->join('users', 'users.id',  'questions.id_question')
                    ->select('questions.title_question', 'questions.detail_question', 'questions.id as id')
                    ->where('questions.id', '=', $id)
                    ->first();
        return view ('edit',['question'=>$questions]);
    }

    public function update_thread(Request $request)
    {
        $id =$request->id;
        $questionUpdate = DB::table('questions')
                    ->where('questions.id',  $id)
                    ->update(['title_question'=>$request->title_question,
                            'detail_question'=>$request->detail_question,
                            'updated_at'=>now()]);


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
                        ->select('users.name as name', 'answers.created_at', 'answers.updated_at', 'users.id as answer_user_id', 
                                'answers.id_question', 'answers.id as id', 'answers.id_answer', 'users.created_at as user_created_at', 'answers.the_answer')
                        ->where('answers.id_question', '=', $id)
                        ->get();
                    
        $count = DB::table('answers')
                    ->select('*')
                    ->where('answers.id_question', '=', $id)
                    ->count();
            
        return redirect('/thread/'.$id)
                ->with(['questions' => $questions])
                ->with(['answers' => $answers])
                ->with(['count' => $count])
                ->with('user_id', $user_id);
    }

    public function update_reply(Request $request)
    {
        $id =$request->id;
        $answerUpdate = DB::table('answers')
                    ->where('answers.id',  $id)
                    ->update(['answers.the_answer'=>$request->the_answer,
                            'updated_at'=>now()]);


        $id = $request->question_id;
        $user_id = Auth::user()->id;
                    
        $questions = DB::table('questions')
                        ->join('users', 'users.id', '=', 'questions.id_question')
                        ->select('users.name as name', 'questions.created_at', 'questions.updated_at', 'users.id as user_id', 
                                'questions.title_question', 'questions.detail_question', 'questions.id as id', 'users.created_at as user_created_at', 'questions.id_question')
                        ->where('questions.id', '=', $id)
                        ->first();
                    
        $answers = DB::table('answers')
                        ->join('users', 'users.id', '=', 'answers.id_answer')
                        ->select('users.name as name', 'answers.created_at', 'answers.updated_at', 'users.id as answer_user_id', 
                                'answers.id_question', 'answers.id as id', 'answers.id_answer', 'users.created_at as user_created_at', 'answers.the_answer')
                        ->where('answers.id_question', '=', $id)
                        ->get();
                    
        $count = DB::table('answers')
                    ->select('*')
                    ->where('answers.id_question', '=', $id)
                    ->count();
            
        return redirect('/thread/'.$id)
                ->with(['questions' => $questions])
                ->with(['answers' => $answers])
                ->with(['count' => $count])
                ->with('user_id', $user_id);
    }
}
