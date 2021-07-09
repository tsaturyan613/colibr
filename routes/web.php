<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/', 'Main@index');

Route::get('/register',function(){
	return view('reg_form');
});
Route::post('/do_register', 'Main@register');


Route::get('/FAQ',function(){
	if(session('locale')=='en')
	   return view('questions_en');
	else
	  return view('questions_arm');

});

Route::get('/Privacy',function(){
	if(session('locale')=='en')
	   return view('privacy_policy_eng');
	else
		return view('privacy_policy_am');

});

Route::post('/sendmail', 'Main@sendmail');
Route::post('/subscribe', 'Main@subscribe');

Route::get('/TypingTest',function(){
	   return view('typing-test');
});

Route::post('/cv_register', 'CV@register');
Route::post('/cv_login', 'CV@login');

Route::get('/create','CV@show_cv_form');
Route::post('/add_skill', 'CV@add_skill');
Route::post('/add_education', 'CV@add_education');
Route::post('/update_education', 'CV@update_education');
Route::post('/add_language', 'CV@add_language');
Route::post('/add_experiance', 'CV@add_experiance');
Route::post('/update_experiance', 'CV@update_experiance');
Route::post('/do_form', 'CV@do_form');
Route::post('/add_image', 'CV@add_image');
Route::post('/del_skill', 'CV@del_skill');
Route::post('/del_education', 'CV@del_education');
Route::post('/del_language', 'CV@del_language');
Route::post('/del_experience', 'CV@del_experience');

Route::get('/my_cv/{id}','CV@show_cv');
Route::get('/opinion','OpinionController@index');
