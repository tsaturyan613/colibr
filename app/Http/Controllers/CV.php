<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Validator;
use App\CV_student;
use App\Education;
use App\Language;
use App\Experience;
use App\Skill;
use App\Connection;
use Mail;

class CV extends Controller
{
    public function register(Request $r){
  
        $messages = [
           'pass.required' => __('cv_lang.pass_required'),
           'pass.same' => __('cv_lang.pass_same'),
           'pass.min' => __('cv_lang.pass_min'),
           'email.required'    => __('cv_lang.email_required'),
           'email.email'    => __('cv_lang.email_email'),
           'email.unique'    => __('cv_lang.email_unique'),
           'agree' =>    __('cv_lang.agree'),
           'pass_conf.required' =>__('cv_lang.pass_conf_required'),
           ];

        $validator = Validator::make($r->all(),[
           'email' => 'required|email|unique:cv_students,email',
           'pass' => 'required|min:6|same:pass_conf',
           'pass_conf' => 'required',
           'agree' => 'accepted',
        ],$messages);

        if ($validator->fails()){
           $errors = $validator->errors();
           return ['message'=>$errors,'success'=>false];
        }

        $model=new CV_student;
        $model->email=$r->email;
        $model->password=$r->pass;
        $id=$model->save();
        return ['message'=>__('cv_lang.success'),'success'=>true];
    }
    public function login(Request $r){
     // return $r->all();
        $messages = [
           'pass.required' => __('cv_lang.pass_required'),
           'email.required'    => __('cv_lang.email_required'),
           'email.email'    => __('cv_lang.email_email'),
           ];
        $validator = Validator::make($r->all(),[
           'email' => 'required|email',
           'pass' => 'required',
        ],$messages);

        $model=new CV_student;
        $user=$model->where(['email'=>$r->email,'password'=>$r->pass])->first();
        $validator->after(function($validator) use ($user) {
            if (!$user) {
        $validator->errors()->add('error', __('cv_lang.fail'));
        }
       });



        if ($validator->fails()){
           $errors = $validator->errors();
           return ['message'=>$errors,'success'=>false];
        }
     
       
        Session::put('id',$user->id);
        return ['message'=>$user->id,'success'=>true];
    }

    public function show_cv_form(){
      $id=Session::get('id')??false;
      if(!$id)
         return view('must_login');

      $data=CV_student::where(['id'=>$id])->first();
      return view('create_cv',['data'=>$data]);
    }

    public function add_skill(Request $r){
      
       $skill= Skill::firstOrNew(['language' => $r->lang,'cv_students_id'=>Session::get('id')]);
       $skill->language=$r->lang;
       $skill->cv_students_id=Session::get('id');
       $skill->percent=$r->percent;
       $skill ->save();

    }
  public function add_education(Request $r){
      $ed=new Education;
      $ed->specialization=$r->specialization;
      $ed->education=$r->education;
      $ed->description=$r->description;
      $ed->begin_month=$r->begin_month;
      $ed->begin_year=$r->begin_year;
      $ed->end_month=$r->end_month;
      $ed->end_year=$r->end_year;
      $ed->cv_student_id=Session::get('id');
      $ed->save();
  }
  public function update_education(Request $r){
      $ed=Education::find($r->id);
      $ed->specialization=$r->specialization;
      $ed->education=$r->education;
      $ed->description=$r->description;
      $ed->begin_month=$r->begin_month;
      $ed->begin_year=$r->begin_year;
      $ed->end_month=$r->end_month;
      $ed->end_year=$r->end_year;
      $ed->save();
  }
  public function add_language(Request $r){
      $lang=new Language;
      $lang->cv_students_id=Session::get('id');
      $lang->language=$r->lang;
      $lang->save();
  }
  public function add_experiance(Request $r){
      $exp=new Experience;
      $exp->job_title=$r->job_title;
      $exp->company=$r->company;
      $exp->start_month=$r->start_month;
      $exp->start_year=$r->start_year;
      $exp->end_month=$r->end_month;
      $exp->end_year=$r->end_year;
      $exp->description=$r->description;
      $exp->cv_students_id=Session::get('id');
      $exp->save();
  }
  public function update_experiance(Request $r){
      // return $r->all();


      $exp=Experience::find($r->id);
      $exp->job_title=$r->title;
      $exp->company=$r->company;
      $exp->start_month=$r->start_month;
      $exp->start_year=$r->start_year;
      $exp->end_month=$r->end_month;
      $exp->end_year=$r->end_year;
      $exp->description=$r->description;
      $exp->save();
  }
  public function do_form(Request $r){
    $st_id=Session::get('id');
    //$st_id=21;
    $stud=CV_student::find($st_id);
    $stud->name=$r->name;
    $stud->phone=$r->phone;
    $stud->address=$r->address;
    $stud->cv_email=$r->cv_email;
    $stud->about_me=$r->about_me;
    $stud->published=(int)$r->check;
    $stud->profession=$r->profession;
    $stud->save();

    $conn= Connection::firstOrNew(['cv_students_id'=>$st_id]);
    $conn->behance=$r->behance;
    $conn->dribble=$r->dribble;
    $conn->facebook=$r->facebook;
    $conn->github=$r->github;
    $conn->linkedin=$r->linkedin;
    $conn->twitter=$r->twitter;
    $conn->save();
  }
  public function add_image(Request $r){
     $st_id=Session::get('id');
     $validator = Validator::make($r->all(),[
         'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
         ]);

      if(!($validator->fails())){
          $imageName = $r->img->getClientOriginalName();  
          $r->img->move(public_path('images/cv_images'), $imageName);
          $stud=CV_student::find($st_id);
          $stud->image=$imageName;
          $stud->save();
      }
  }
public function del_skill(Request $r){
    $skill= new Skill;
    $st_id=Session::get('id');
    $skill->where(['language'=>$r->lang,'cv_students_id'=>$st_id])->first()->delete();
 
}
public function del_education(Request $r){
  $ed=new Education;
  $ed->find($r->id)->delete();
  
}
public function del_language(Request $r){
     Language::find($r->id)->delete();
}
public function del_experience(Request $r){
  Experience::find($r->id)->delete();

}
public function show_cv($id=null){

  $user=CV_student::find($id);
  if(!$user)
     return '<h1>404<h1>';
  $session_id=Session::get('id'); 
  if(!$session_id||$session_id!=$id)
     if(!$user->published){
        return'<h1>CV is not published<h1>';
  }
  return view('my_cv',['data'=>$user]);

}


}
