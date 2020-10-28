<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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

     
    //  showing all question sorted by latest created
    public function index()
    {   
        $user_id = Auth::user()->id;

        $questions = DB::table('questions')
                        ->join('users', 'users.id', '=', 'questions.id_question')
                        ->select('users.name', 'questions.id_question', 'questions.created_at as created_at', 'questions.updated_at', 'questions.title_question', 'questions.detail_question', 'users.created_at as user_created_at', 'questions.id as id')
                        ->latest('questions.updated_at')
                        ->latest('questions.created_at')
                        ->paginate(5)->OnEachSide(2);

        return view('home')
                ->with(['questions' => $questions])
                ->with('user_id', $user_id);
    }

    public function search(Request $request){

        $key = $request->key;
        $user_id = Auth::user()->id;


        $questions = DB::table('questions')
                        ->join('users', 'users.id', '=', 'questions.id_question')
                        ->select('users.name', 'questions.id_question', 'questions.created_at as created_at', 'questions.updated_at as updated_at', 'questions.title_question', 'questions.detail_question', 'users.created_at as user_created_at', 'questions.id as id')
                        ->where('title_question', 'like', '%' . $key . '%')
                        ->latest('questions.updated_at')
                        ->latest('questions.created_at')
                        ->paginate(5)->OnEachSide(2);

        return view('home')
                ->with(['questions' => $questions])
                ->with('user_id', $user_id);
    }
}