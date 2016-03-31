<?php

namespace App\Http\Controllers;

use Input;
use App\Question;
use App\Trajet;
use App\Http\Requests;
use Illuminate\Http\Request;


class QuestionController extends Controller
{
    public function store(Request $request, $idTraj)
    {
    	
        $question = new Question;
        $libQuest = $request->question;
        $question->libQuest = $libQuest;
        $question->trajet()->associate(Trajet::find($idTraj));
        $question->save();

       return redirect()->route('detailRecherche',$idTraj);
    }
}
