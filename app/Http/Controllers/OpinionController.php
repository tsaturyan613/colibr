<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Subscribe;
use App\QuestionYes;
use App\Answer;
use Illuminate\Http\Request;
use Validator;

class OpinionController extends Controller
{
   public function index()
   {

       $questions = QuestionYes::get();

       $id_1 = $questions[0]['id'];
       $id_2 = $questions[1]['id'];
       $answer_1 = Answer::where('harc_id',$id_1)->get();
       $answer_2 = Answer::where('harc_id',$id_2)->get();
//       echo "<pre>";
//       print_r($answer_1);
//       die();
       return view('opinion.opinion',compact([
           'questions',
           'answer_1',
           'answer_2'
       ]));
   }
}
