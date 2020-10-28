<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function delete_thread($id)
    {
        $questions = DB::table('questions')
                        ->where('questions.id',  $id)
                        ->delete();

        $answers = DB::table('answers')
                        ->where('answers.id_question', $id)
                        ->delete();

        return redirect('/home');
    }

    public function delete_reply($id, $answer_id)
    {
        $answers = DB::table('answers')
                        ->where('answers.id', $answer_id)
                        ->delete();

        return redirect('/thread/'. $id);
    }
}
