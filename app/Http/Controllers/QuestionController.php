<?php

namespace App\Http\Controllers;

use Mail;
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
        $trajet = Trajet::find($question->idTraj);
       
        $data =array(
            "question" => $question->libQuest,
            "idTraj" => $question->idTraj,
            "mailCond" => $trajet->user->email,
            "nomCond" => $trajet->user->prenomMemb
        );

         Mail::send('recherche.question.email', $data, function ($message) use ($trajet, $question) {
            $message->to($trajet->user->email,$trajet->user->prenomMemb)->subject('Vous avez reçu une question !');
        });


       return redirect()->route('detailRecherche',$idTraj);
    }
}
