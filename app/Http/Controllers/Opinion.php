<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Subscribe;
use App\QuestionYes;
use Illuminate\Http\Request;
use Validator;
class Opinion extends Controller
{

    public function index()
    {
        $quest = QuestionYes::get();
        echo "<pre>";
        print_r($quest);
        die();
        return view('opinion.opinion');
    }


}
