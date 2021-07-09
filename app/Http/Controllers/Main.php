<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Session;
use App\Subscribe;
use App\Student;
use Illuminate\Http\Request;
use Validator;
use Mail;
class Main extends Controller
{
    public function index(){

   		 return view('home');
   }

    public function sendmail(Request $r){

       $lang=session('locale');
       if($lang=='arm'){
          $invalid_email="Գոյություն չունեցող էլ․հասցե";
          $require="Լրացրեք բոլոր դաշտերը";
          //$fail='Հաղորդագրությունը չի ուղարկվել';
          $success='Հաղորդագրությունն հաջողությամբ ուղարկվել է';
       }
       elseif($lang=='en'){
          $invalid_email="Invalid email address";
          $require="Please,all fields are required";
         // $fail='The message was not sent';
          $success='The message sent successfully';
       }
       $messages = [
           'required' => $require,
           'email'    => $invalid_email,
       ];

       $email=$r->email;
       $name=$r->name;
       $msg=$r->message;

       $validator = Validator::make($r->all(),[
           'email' => 'required|email',
           'name'  => 'required',
           'message' => 'required' 
       ],$messages);

       if ($validator->fails()){
           $errors = $validator->errors();
           return ['message'=>$errors,'success'=>false];
       }
       else{
           Mail::send([], [], function ($message)use($name,$email,$msg) {
           $message->to('colibrilabcenter@gmail.com')
           ->subject('Message to Colibrilab')
           ->from($email,$name)
          ->setBody("name $name<br>email - $email<br>message - $msg", 'text/html');
          });
          return ['message'=>$success,'success'=>true];
       } 
  }


   public function subscribe(Request $r){
       $lang=session('locale');

       if($lang=='arm'){
           $invalid_email="Գոյություն չունեցող էլ․հասցե";
           $require="Լրացրեք դաշտը";
           $success='Շնորհակալություն բաժանորդագրվելու համար';
           $already="Դուք արդեն բաժանանորդագրվել եք։";
        }
        elseif($lang=='en'){
           $invalid_email="Invalid email address";
           $require="Please enter a value";
           $success='Thank you for subscribing';
           $already='You already subscribed';
        }
        $messages = [
              'required' => $require,
              'email'    => $invalid_email,
              'unique'    =>$already
        ];
        $email=$r->email;
        $validator = Validator::make($r->all(),[
      	   'email' => 'required|email|unique:subscribe,email'],$messages);

        

        if ($validator->fails()){
            $errors = $validator->errors();
            return ['message'=>$errors,'success'=>false];
        }
        else{
           return ['message'=>$success,'success'=>true];
        }
        $model = new Subscribe;
        $model->email =$email;
        $model->save();
       
   }
   public function register(Request $r){
   	  $lang=session('locale');
      if($lang=='arm'){
           $invalid_email="Գոյություն չունեցող էլ․հասցե";
           $success='Դուք հաջողությամբ գրանցվել եք։
           ՈՒղարկվել է հաղորդագրություն Ձեր էլ․ հասցեին ';
           $already="Նշված էլ․ հասցեով դուք արդեն գրանցվել եք";
           $age="Տարիքի դաշտը ճիշտ նշված չէ";
           $phone="Հեռախոսահամարի դաշտը ճիշտ նշված չէ";
        }
        elseif($lang=='en'){
           $invalid_email="Invalid email address";
           $success='You signuped successfuly,we sent message to your email';
           $already='You have already registered at the specified email address';
           $age="The age field is not specified correctly";
           $phone="The phone field is not specified correctly";
        }

      $messages = [
              'numeric' => $age,
              'email'    => $invalid_email,
              'unique'    =>$already,
              'regex' =>$phone,
         ];
   
 

         $validator = Validator::make($r->all(),
          ['email'=>'email|unique:students,email',

          'age' => 'numeric|min:10|max:55',
          'phone' => 'regex:~^\+?[0-9]+$~'], $messages);
    

        if ($validator->fails()){
            $errors = $validator->errors();
            return [$errors,'success'=>false];
        }


       $m=new Student;
       $m->fullname=$r->name;
       $m->age=$r->age;
       $m->phone=$r->phone;
       $m->course_type=$r->course_type;
       $m->confirm_type=$r->confirm_type;
       $m->comment=$r->comment;
       $m->email=$r->email;

       $agree_term[0]=$r->morningtime;             
       $agree_term[1]=$r->daytime; 
       $agree_term[2]=$r->eveningtime;;
       $all_terms=implode(':',$agree_term);

       $m->agree_term=$all_terms;                      
      $m->save();

       $course_type=$r->course_type;
       $time="";
       if($agree_term[0]=='true')
	       $time.="Առավոտյան,";
       if($agree_term[1]=='true')
	       $time.="Ցերեկային,";
       if($agree_term[2]=='true')
	      $time.="Երեկոյան";
        $time=trim($time,',');
        $time.=' ժամեր';
        $subject="Գրանցում";
        if($lang=='en'){
           $time=str_ireplace(['Առավոտյան','Ցերեկային','Երեկոյան','ժամեր'], ['Morning','Daytime','Evening','hours'],$time);
           $subject="Sign In";
        }

        $mon=3;
        $month_fee='40 000';
        if($course_type=='Full Stack Web Development'){
             $course='Html, Css Responsive design, Bootstrap JavaScript,
             jQuery, Ajax PHP, MySQL, OOP MVC, Laravel(additional)';
         $mon=6;

        }
        elseif($course_type=='Front-End React Web Development'){
            $course='Html, CSS,Responsive design, Bootstrap,JavaScript, OOP, jQuery,React.js';
   
        }
        else{
           $course='Php, OOP,Ajax, MySQL,MVC,Laravel(additional)';
           $month_fee='50 000';
        }





        $data=[
        	'name'=>$r->name,
            'phone'=>$r->phone,
            'email'=>$r->email,
            'comment'=>$r->comment,
            'students_count'=>$r->confirm_type,
            'course'=>$course,
            'month_fee'=>$month_fee,
            'time'=>$time,
            'course_type'=>$course_type,
            'mon'=>$mon
        ];
   
   
     
       Mail::send('email',$data , function($message) use($r,$subject) {
            $message->to( $r->email, 'Colibrilab')->subject
            ($subject);
            $message->from('info@colibrilab.am','Colibrilab');
        });





        
          
      
  return ['msg'=>$success,'success'=>true];


  }

}