@php





if($_SERVER['HTTP_HOST']=='colibrilab.am'){
      $mycv_href="http://colibrilab.am/my_cv/$id";          
 }
 elseif($_SERVER['HTTP_HOST']=='127.0.0.1:8000'){
     $mycv_href="http://127.0.0.1:8000/my_cv/$data->id";       
 }





 if(!empty($data->image))
    $src=asset('images/'.$data->image);
 else
 $src=asset('images/camera.png');

 $all_skills=$data->skills;
 $all_expeiances=$data->experience;
 $all_connections=$data->connections;
 $all_education=$data->education;


for ($i =date('Y');$i>=1950;$i--)
         $years[]=$i;

$years_end[0]="";
for($i=date('Y');$i>=1950;$i--)
     $years_end[]=$i;




@endphp




<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel = "stylesheet" href = "{{asset('css/cv_style.css')}}">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class = "header-text">
		<p class = "text">{{__('cv_lang.create')}}</p>
	</div>
	
		
	
	<div class = "container">
		<div class = "top-first res">
			<div class = "gluing">
				<i class="fa fa-user" aria-hidden="true"></i>
				<p class ="descript">{{__('cv_lang.personalinfo')}}</p>
			</div>
			<div class = "gluing res-f">
				<p class = "lng">{{__('cv_lang.cvlanguage')}}</p>
				<select class = "select-first">
					<option value = "en" {{__('cv_lang.eng_selected')}}>English</option>
					<option value = "arm" {{__('cv_lang.arm_selected')}}>Հայերեն</option>
				</select>
			</div>
		</div>
					<form action="">
		<div class = "body">
			<div class = "gluing res-elev">
				<div class = "add-photo">
				    <form enctype="multipart/form-data">	
				 				<!-- 	<i class="fa fa-camera" class = "add-ph" aria-hidden="true"></i> -->
				 		<?php
				           if(!empty($data->image)){
                               $src=asset('images/'.$data->image);
                               $width='width="120px"';
                           }
                           else{
                               $src=asset('images/camera.png');
                               $width='width="100px"';
                               echo '<p class = "add-ph">'.__('cv_lang.addphoto').'</p>';
                               }
                        ?>				
						<input name="img" type="file" id="file1" style="display:none"/>
						<input type="button" id="new_image" class="foto" style="display:none"/>
						<label id="image" for="file1"><img  id="new_img" src="<?=$src?>" {{$width}} height="100px" style = "border-radius: 100%;"></label>
				    </form>
					
				</div>
			</div>
				<div class = "column">
                     
                    <p class = "aboutinput-f" >{{__('cv_lang.yourcvadressis')}} <a href="{{$mycv_href}}" id="cv_address">{{$mycv_href}}</a></p> 
					<p class = "aboutinput-f">{{__('cv_lang.name')}}<span class = "ch-red">*</span></p>
					<input type="text" required class = "input-name input vl" value="{{$data->name}}">
					<p class = "aboutinput">{{__('cv_lang.profession')}}<span class = "ch-red">*</span></p>
					<input  type="text" required class = "dev input vl" placeholder="{{__('cv_lang.programmer')}}"value="{{$data->profession}}">
				</div>
			</div>
			<div class = "foot">
				<div class = "column">
					<p class = "about">{{__('cv_lang.aboutme')}}<span class = "ch-red">*</span></p>
					<textarea class = "textarea input vl about-me"placeholder="{{__('cv_lang.introduce')}}" required >{{$data->about_me}}</textarea>
					<div class = "empty"></div>
				</div>
			</div>
		</div>
	<!-- skills -->

		<div class = "container">
			<div class = "top">
				<div class = "gluing">
					<i class="fa fa-puzzle-piece" aria-hidden="true"></i>
					<p class ="descript first">{{__('cv_lang.skills')}}</p>
				</div>
				<div class = "gluing" style = "padding-right:15px;">
					<i class="fa fa-angle-down w" aria-hidden="true"></i>
				</div>
			</div>
			<div class = "all-body-first">
<?php

$phpstyle='none';
$php_percent=50;
$laravelstyle='none';
$laravel_percent=50;
$javastyle='none';
$java_percent=50;
if($all_skills){

   foreach($all_skills as $sk){
   	switch($sk['language']){
 case 1:
     $phpstyle='block';
     $php_percent=$sk['percent'];
     break;
case 2:
     $laravelstyle='block';
     $laravel_percent=$sk['percent'];
     break;
case 3:
     $javastyle='block';
     $java_percent=$sk['percent'];
     break;     

   	}
  
}
}
?>

    <div class = "body-nn" style="flex-direction: column;">
        <div class = "line-first handle l-one" style="display:{{$phpstyle}}" >
            <div class = "gluing">
                <div class = "flex">
                    <p class = "phplaravel">PHP</p>
                    <div class ="percent">{{$php_percent}}%</div>
                </div>
                <div class = "flex-sec fl" style="left: 166px;top:0px;">
                    <i class="fa fa-times-circle skills x" aria-hidden="true" style="margin-left: 40px;"></i>
                    <i class="fa fa-pencil pen-one" aria-hidden="true" style="display: none;"></i>
                    <i class="fa fa-bars handle" aria-hidden="true"></i>
                </div>
            </div>
            <div class = "no-flex">
                <div class = "chargeline"><div class = "charge" style="width:{{$php_percent}}% !important"></div>
            </div>
        </div>
            <div class = "empty"></div>
        </div>
        <div class = "line-first handle l-sec" style="display:{{$laravelstyle}};">
            <div class = "gluing">
                <div class = "flex">
                    <p class = "phplaravel-sec">Laravel</p>
                    <div class ="percent-sec">{{$laravel_percent}}%</div>
                </div>
                <div class = "flex-sec fl" style="left: 166px;top:0px;">
                    <i class="fa fa-times-circle skills x" aria-hidden="true"style="margin-left: 40px;"></i>
                    <i class="fa fa-pencil pen-one" aria-hidden="true" style="display: none;"></i>
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
            </div>
            <div class = "no-flex">
                <div class = "chargeline-sec"><div class = "charge-sec" style="width:{{$laravel_percent}}% !important"></div>
            </div>
        </div>
            <div class = "empty"></div>
        </div>
        <div class = "line-first handle l-th" style="display:{{$javastyle}}">
            <div class = "gluing">
                <div class = "flex">
                    <p class = "phplaravel-th">Javascript</p>
                    <div class ="percent-th">{{$java_percent}}%</div>
                </div>
                <div class = "flex-sec fl" style="left: 166px;top:0px;">
                    <i class="fa fa-times-circle skills x" aria-hidden="true" style="margin-left: 40px;"></i>
                    <i class="fa fa-pencil pen-one" aria-hidden="true" style="display: none;"></i>
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
            </div>
            <div class = "no-flex">
                <div class = "chargeline-th"><div class = "charge-th" style="width:{{$java_percent}}% !important"></div>
                </div>
            </div>
            <div class = "empty"></div>
        </div>
    </div>

	<div class = "section-first sfone">
		<div class = "flex-th res-t">
			<div class = "left">
				<p class = "skill">{{__('cv_lang.skill')}}</p>
				<select class="selector">
					<option value="1">PHP</option>
					<option value="2">Laravel</option>
					<option value="3">Javascript</option>
				</select>
			</div>
			<div class = "right">
				<p class = "level">{{__('cv_lang.level')}}</p>
				<div class = "flex-th">

				
				<div class = "check"><i class="fa fa-save" aria-hidden="true"></i><span class = "save">{{__('cv_lang.save')}}</span></div>

					<input type="range" min="1" max="100" value="50" class = "slider">
					<p class = "range-percent">50%</p>
				</div>
			</div>
		</div>
	</div>
	<div class = "buttons res-tr">
		<div class = "center">
			<div class = "skill-plus-first"><i class="fa fa-plus-circle" aria-hidden="true"></i><p class = "new-skill">{{__('cv_lang.anotherskill')}}</p></div>
		</div>
	</div>
</div>
<div class = "container-plus-first"></div>
</div>
<!-- end skills -->

<!-- education -->
<div class = "container">
	<div class = "top">
		<div class = "gluing">
			<i class="fa fa-graduation-cap" aria-hidden="true"></i>
			<p class ="descript second">{{__('cv_lang.education')}}</p>
		</div>
		<div class = "gluing" style = "padding-right:15px;">
			<i class="fa fa-angle-down w" aria-hidden="true"></i>
		</div>
	</div>
	
				
	<div class = "all-body-first">
		 <div class ="body-mini-sec" > 
          <?php

			

			foreach($all_education as $ed){
			   $id=$ed['id'];
               $begin_month=$ed['begin_month'];
               $begin_year=$ed['begin_year'];
               $end_month=$ed['end_month'];
               $end_year=$ed['end_year'];
               $spec=$ed['specialization'];
               $educ=$ed['education'];
               $desc=$ed['description'];

               
             ?>
<!-- /////////////////////////////// -->
<div class="line-first edu" id="<?=$id?>">
     <div class="flex-col">
     	<p class="th-of-ec"><?=$spec?></p>
     	<div class="interval"><?=$begin_year?> <?=$begin_month?>  - <?=$end_year?>  <?=$end_month?> </div>
     </div>
     <div class="flex-sec res-fr">
     	<i class="fa fa-times-circle x education" aria-hidden="true"></i>
     	<i class="fa fa-pencil pencil pen-one fff" aria-hidden="true"></i>
     	<i class="fa fa fa-bars handleT" aria-hidden="true"></i>
     </div>
     <div class="new-body" style="display: none;">
     	<div class="body-sec show-hide hides update_education"  style="display:block;">
     		<div class="content">
     			<p class="title-input">{{__('cv_lang.specialization')}}<span class = "ch-red">*</span></p>
     			<input type="text" class="desc-ss" value="{{$spec}}" placeholder="{{__('cv_lang.web')}}">
     		</div>
     		<div class="content">
     			<p class="title-input">{{__('cv_lang.education_text')}}<span class = "ch-red">*</span></p>
     			<input type="text" class="desc-tt" value="{{$educ}}" placeholder="{{__('cv_lang.school')}}">
     		</div>
     		<div class="content" style="display: flex;">
     			<div class="part-one" style="margin-right: 22px;">
     				<p class="title-input">{{__('cv_lang.startdate')}}</p>     				<div class="flex-content">
     					<select class="month-nn"  >
     						<?php
                             for($i=0;$i<12;$i++){
                             	$m=__('cv_lang.months')[$i];
                                 if($m==$begin_month)
                                 	echo "<option value='$begin_month' selected>$begin_month</option>";
                              
                                  else
                                 	 echo  "<option value='$m'>$m</option>";
                               }
                             	?>
                        </select>
     					<select class="yearr" style="margin-left: 10px;" value="<?=$begin_year?>">
     						
							@foreach($years as $year)
								@if($year==$begin_year)
							        <option value={{$year}} selected>{{$year}}</option>
							    @else
							    <option value={{$year}}>{{$year}}</option>
                                @endif
						     @endforeach
     					</select>
     				</div>
     			</div>
     			<div class="part-two">
     				<p class="title-input">{{__('cv_lang.enddate')}}</p>
     				<div class="flex-content">
     					<select class="monthSS-nn" value="<?=$end_month?>">
     						
     						@foreach(__('cv_lang.months_end') as $m_end)
     					        @if($m_end==$end_month)
                                   	<option value={{$end_month}} selected>{{$end_month}}</option>
                                @else
                                 	 <option value={{$m_end}}>{{$m_end}}</option>
                                @endif   	 
                            @endforeach
     					</select>
     					 <select class="yearS-nn" style="margin-left: 10px;"value="{{$end_year}}">
     					 
						
							@foreach($years_end as $year_end)
								@if($year_end==$end_year)
							      <option value='{{$year_end}}' selected>{{$year_end}}</option>
							    @else
							    	<option value='{{$year_end}}'>{{$year_end}}</option>
                                @endif
						    @endforeach
						  
     					 </select>
     					</div>
     				</div>
     			</div>
     			<div class="content" style="padding-bottom:30px;">
     				<p class="title-input">{{__('cv_lang.description')}}</p>
     				<textarea class="textarea-ss" type="text" placeholder="Write your text..." style="margin-top: 7px;height:67px;">{{$desc}}</textarea>
     				<input type="hidden" class="edu_id" value="<?=$id?>">
     				<div class="close-secondd">
     					<i class="fa fa-trash" aria-hidden="true"></i>
     					<span class="del education" id={{$id}}>{{__('cv_lang.delete')}}</span>
     				</div><div class="check-secondd save_edu" >
     					<i class="fa fa-save" aria-hidden="true"></i>
     					<span class="save ">{{__('cv_lang.save')}}</span>
     				</div>
     			</div>
     		</div>
     	</div>
     </div>





<!-- ///////////////////////////////////		 -->	
		
	@php
}
@endphp
</div>
		<div class = "body-sec show-hide s">
			<div class = "content">
				<p class = "title-input">{{__('cv_lang.specialization')}}<span class = "ch-red">*</span></p>
				<input type = "text" id="specialization" class = "desc-s" placeholder="{{__('cv_lang.web')}}">
			</div>
			<div class = "content">
				<p class = "title-input" >{{__('cv_lang.education_text')}}<span class = "ch-red">*</span></p>
				<input type = "text" id="education" class = "desc-t"placeholder="{{__('cv_lang.school')}}">
			</div>
			<div class = "content  res-fv" style = "display: flex;">
				<div class = "part-one" style="margin-right: 22px;">
					<p class = "title-input">{{__('cv_lang.startdate')}}</p>
					<div class = "flex-content">
						<select class="month">
							<?php
     						for($i=0;$i<12;$i++){
     							$m=__('cv_lang.months')[$i];
                               echo  "<option value='$m'>$m</option>";
     						}
                            ?>
						</select> 
						<select class="year" style = "margin-left: 10px;">
							<?php
							for($i=date('Y');$i>=1950;$i--)
							echo "<option value=$i>$i</option>";
						     ?>
						</select>
					</div>
				</div>
				<div class = "part-two">
					<p class = "title-input">{{__('cv_lang.enddate')}}</p>
					<div class = "flex-content">
						<select class="monthS">
							<?php
     						for($i=0;$i<13;$i++){
     							$m=__('cv_lang.months_end')[$i];
                               echo  "<option value='$m'>$m</option>";
     						}
                            ?>
						</select> 
						<select class="yearS" style = "margin-left: 10px;">
							<?php
							echo "<option value=''></option>";
							for($i=date('Y');$i>=1950;$i--)
							echo "<option value=$i>$i</option>";
						     ?>
						</select>
					</div>
				</div>
			</div>
			<div class = "content" style="padding-bottom:30px;">
				<p class = "title-input">{{__('cv_lang.description')}}</p>
				<textarea class = "textarea-s" type = "text" placeholder="{{__('cv_lang.write_text')}}" style="margin-top: 7px;height:67px;" id="edu_description"></textarea>
				
				<div class = "close-second"><i class="fa fa-trash" aria-hidden="true"></i><span class = "del">{{__('cv_lang.delete')}}</span></div>
				<div class = "check-second"><i class="fa fa-save" aria-hidden="true"></i><span class = "save edu_save">{{__('cv_lang.save')}}</span></div>
	
			</div>
		</div>
			<div class = "center" style="margin-top: 10px;">
				<div class = "skill-plus-sec"><i class="fa fa-plus-circle" aria-hidden="true"></i><p class = "new-skill-s">{{__('cv_lang.new_education')}}</p></div>
			</div>
	</div>
	
</div>
<!-- end education -->

<div class = "container">
	<div class = "top">
		<div class = "gluing">
			<i class="fa fa-language" aria-hidden="true"></i>
			<p class ="descript third">{{__('cv_lang.languages')}}</p>
		</div>
		<div class = "gluing" style = "padding-right:15px;">
			<i class="fa fa-angle-down w" aria-hidden="true"></i>
		</div>
	</div>
	<div class = "all-body-first">
		<div class = "body-mini">
                     
        @foreach($data->language as $lang)
			<div class="line-first-lng" id="{{$lang->id}}">
	            <p class="lang">{{$lang->language}}</p>
	            <div class="flex-sq">
		           <i class="fa fa-times-circle x del_lang res-te" aria-hidden="true" style="margin-left:40px;"></i>
		           <i class="fa fa-pencil pencil" style="display:none;" aria-hidden="true"></i>
		           <i class="fa fa fa-bars handleS" aria-hidden="true"></i>
	            </div>
            </div>

        @endforeach

		</div>
		<div class = "body show-hide-third" style = "flex-direction: column;">
			<div class = "center-sec">
				<div class = "flex-col"style="height:auto;">
					<p class = "langs">{{__('cv_lang.language')}}</p>
				</div>
			</div>
			<div class = "input-lng">
				<input type="text" name="" class = "inLng" id = "inLng" maxlength="15" placeholder="{{__('cv_lang.english')}}">
				
				<div class = "close-four"><i class="fa fa-trash" aria-hidden="true"></i><span class = "del ">{{__('cv_lang.delete')}}</span></div>
				<div class = "check-four"><i class="fa fa-save" aria-hidden="true"></i><span class = "save">{{__('cv_lang.save')}}</span></div>
     		 </div>
		</div>

			<div class = "skill-plus-th"><i class="fa fa-plus-circle" aria-hidden="true"></i><p class = 'new-lng'>{{__('cv_lang.anotherlanguage')}}</p></div>
			<div class = "empty" style = "padding: 8px;"></div>
		</div>
	</div>
</div>
<!-- ////experiences -->
<div class = "container res-nin">
	<div class = "top">
		<div class = "gluing">
			<i class="fa fa-suitcase" aria-hidden="true"></i>
			<p class ="descript four">{{__('cv_lang.experiences')}}</p>
		</div>
		<div class = "gluing" style = "padding-right:15px;">
			<i class="fa fa-angle-down w" aria-hidden="true"></i>
		</div>
	</div>
	<div class = "all-body-first">
		<div class ="body-mini-th">
        <?php

			foreach($all_expeiances as $exp){
                $id=$exp['id'];

               $job_title=$exp['job_title'];
               $company1=$exp['company'];
               $begin_month=$exp['start_month'];
               $begin_year=$exp['start_year'];
               $end_month=$exp['end_month'];
               $end_year=$exp['end_year'];
               $description1=$exp['description'];
           
		?>

           <div class="line-first" id="<?=$id?>" >
	<div class="flex-col">
		<p class="th-of-ec">{{$job_title}}</p>
		<div class="interval"><?=$begin_year?> <?=$begin_month?> - <?=$end_year?> <?=$end_month?></div>
	</div>
	<div class="flex-sec">
		<i class="fa fa-times-circle x exp_del" aria-hidden="true"></i>
		<i class="fa fa-pencil pencil pen-one fff" aria-hidden="true"></i>
		<i class="fa fa fa-bars handleF" aria-hidden="true"></i>
	</div>
	<div class="new-body">
		<div class="body-sec show-hide hides" style="display:block;">
			<div class="content">
				<p class="title-input">{{__('cv_lang.jobtitle')}}<span class = "ch-red">*</span></p>
				<input type="text" class="desc-ss" value="{{$job_title}}" placeholder="{{__('cv_lang.web')}}">
				
			
				
			</div>
			<div class="content">
				<p class="title-input">{{__('cv_lang.company')}}<span class = "ch-red">*</span></p>
				<input type="text" class="desc-tt" value="<?=$company1?>" placeholder="{{__('cv_lang.school')}}">
			</div>
			<div class="content" style="display: flex;">
				<div class="part-one" style="margin-right: 22px;">
					<p class="title-input">{{__('cv_lang.startdate')}}'</p>
					<div class="flex-content">
						<select class="month-nn">
								<?php
                                 for($i=0;$i<12;$i++){
                                 	$m=__('cv_lang.months')[$i];
                                 if($m==$begin_month)
                                 	echo "<option value='$begin_month' selected>$begin_month</option>";
                              
                                  else
                                 	 echo  "<option value='$m'>$m</option>";
                                 }
                             	?>
						</select>
						<select class="yearr" style="margin-left: 10px;">
							<?php
							for($i=0;$i<=date('Y')-1950;$i++)
								if($years[$i]==$begin_year)
							        echo "<option value='$years[$i]' selected>$years[$i]</option>";
							    else
							    	echo "<option value='$years[$i]'>$years[$i]</option>";

						     ?>
						</select>
					</div>
				</div>
				<div class="part-two">
					<p class="title-input">{{__('cv_lang.enddate')}}</p>
					<div class="flex-content">
						<select class="monthSS-nn">
								<?php
                             for($i=0;$i<13;$i++){
                             	$m=__('cv_lang.months_end')[$i];
                                 if($m==$end_month)
                                 	echo "<option value='$begin_month' selected>$end_month</option>";
                              
                                  else
                                 	 echo  "<option value='$m'>$m</option>";
                                }
                             	?>
                             		
                             	</select>
							<select class="yearS-nn" style="margin-left: 10px;">
								<?php
							for($i=0;$i<=date('Y')-1950;$i++)
								if($years_end[$i]==$end_year)
							        echo "<option value='$years_end[$i]' selected>$years_end[$i]</option>";
							    else
							    	echo "<option value='$years_end[$i]'>$years_end[$i]</option>";

						     ?>
							</select>
						</div>
					</div>
				</div>
				<div class="content" style="padding-bottom:30px;">
					<p class="title-input">{{__('cv_lang.description')}}</p>
					<textarea id="<?=$id?>" class="textarea-ss" type="text" placeholder="Write your text..." style="margin-top: 7px;height:67px;"value="{{__('cv_lang.description')}}">{{$description1}}</textarea>
                    <!-- <input type="hidden" id="exper_id" value="<?=$id?>"> -->
					<div class="close-secondd">
						<i class="fa fa-trash" aria-hidden="true"></i>
						<span class="del experiences" id={{$id}}>{{__('cv_lang.delete')}}</span>
					</div>
					
					<div class="check-secondd save_exp">
						<i class="fa fa-save" aria-hidden="true"></i>
						<span class="save">{{__('cv_lang.save')}}</span>
					</div>
				</div>
			</div>
		</div>
	</div>

 

<?php } ?>
		</div>




		<div class = "body-sec show-hide-second">
			<div class = "content">
				<p class = "title-input">{{__('cv_lang.jobtitle')}}<span class = "ch-red">*</span></p>
				<input type = "text" placeholder="{{__('cv_lang.web')}}" class = "input-lng-s">
			</div>
			<div class = "content">
				<p class = "title-input">{{__('cv_lang.company')}}<span class = "ch-red">*</span></p>
				<input type = "text" placeholder="{{__('cv_lang.school')}}" class = "input-comp">
			</div>
			<div class = "content res-sx" style = "display: flex;">
				<div class = "part-one" style="margin-right: 22px;">
					<p class = "title-input">{{__('cv_lang.startdate')}}</p>
					<div class = "flex-content">
						<select class="month-s" >
							<?php
                               $m1=__('cv_lang.months')[0];
                             echo "<option value='$m1' selected >$m1</option>";
                              for($i=0;$i<12;$i++){
                                  $m=__('cv_lang.months')[$i];
                            	 echo "<option value='$m' >$m</option>";
                              }
                            ?>
						</select> 
						<select class="year-s" style = "margin-left: 10px;">

							<?php

							for($i=date('Y');$i>=1950;--$i)
							   echo "<option value=$i>$i</option>";
						     ?>
							
						</select>
					</div>
				</div>
				<div class = "part-two">
					<p class = "title-input">{{__('cv_lang.enddate')}}</p>
					<div class = "flex-content">
						<select class="monthS-s" value="{{__('cv_lang.months_end')[0]}}">
							<?php
							 $m1=__('cv_lang.months_end')[0];
                             echo "<option value='$m1' selected >$m1</option>";
                             for($i=1;$i<13;$i++){
                             	$m=__('cv_lang.months_end')[$i];
                            	echo "<option value='$m' >$m</option>";
                            }
                            ?>
						</select> 
						<select class="yearS-s" style = "margin-left: 10px;">
							<?php
							echo "<option value=''></option>";
							for($i=date('Y');$i>=1950;--$i)
							echo "<option value=$i>$i</option>";
						     ?>
						</select>
					</div>
				</div>
			</div>
			<div class = "content" style = "padding-bottom:30px;">
				<p class = "title-input">{{__('cv_lang.description')}}</p>
				<textarea class = "textarea-t" type = "text" placeholder="{{__('cv_lang.write_text')}}" style="margin-top: 7px;height:67px;"></textarea>
			
				<div class = "close-third"><i class="fa fa-trash" aria-hidden="true"></i><span class = "del">{{__('cv_lang.delete')}}</span></div>
				<div class = "check-third"><i class="fa fa-save" aria-hidden="true"></i><span class = "save">{{__('cv_lang.save')}}</span></div>
			</div>
		</div>
			<div class = "center">
				<div class = "skill-plus"><i class="fa fa-plus-circle" aria-hidden="true"></i><p class = "new-lng-s">{{__('cv_lang.anotherworkexperience')}}</p></div>
			</div>
	</div>
</div>
<div class = "container">
	<div class = "top">
		<div class = "gluing">
			<i class="fa fa-phone" aria-hidden="true"></i>
			<p class ="descript">{{__('cv_lang.contacts')}}</p>
		</div>
		<div class = "gluing" style = "padding-right:15px;">
			<i class="fa fa-angle-down w" aria-hidden="true"></i>
		</div>
	</div>
	<div class = "all-body-first">
		<div class = "content">
			<p class = "title-input">{{__('cv_lang.adress')}}<span class = "ch-red">*</span></p>
			<input type = "text" placeholder="" required class = "input-adress input vl" value="{{$data->address}}">
		</div>
		<div class = "content" style = "display: flex;">
			<div class = "part-first">
				<p class = "title-input res-sv" style = "margin-left: 0px;">{{__('cv_lang.phonenumber')}}<span class = "ch-red">*</span></p>
				<div class = "flex-content"style="margin-top: 5px;">
					<input type="text" required placeholder = "+374 960000" class = "input-numb input vl" value="{{$data->phone}}">
				</div>
			</div>
			<div class = "part-sec">
				<p class = "title-input res-sv"style = "margin-left: 0px;">{{__('cv_lang.email')}}<span class = "ch-red">*</span><span id="wrong_email"></span></p>
				<div class = "flex-content" style="margin-top: 5px;">
					<input type="email" required class = "input-email input vl" value="{{$data->email}}">
				</div>
			</div>
		</div>
	</div>
</div>
<div class = "container">
	<div class = "top">
		<div class = "gluing">
			<i class="fa fa-link" aria-hidden="true"></i>
			<p class ="descript six">{{__('cv_lang.connections_text')}}</p>
		</div>
		<div class = "gluing" style = "padding-right:15px;">
			<i class="fa fa-angle-down w" aria-hidden="true"></i>
		</div>
	</div>
	<div class = "all-body-first" style="padding: 5px 0px 20px 0px;">
		<div class="first-label">
			<div class="left-flex">
			<img src="{{asset('images/facebook.svg')}}" class = "linkIcon">
			<p class="link-title">Facebook {{__('cv_lang.link')}}</p>
			</div>
			<input type="url" name="" class = "end-links facebook" value="{{$all_connections['facebook']}}"required>
		</div>
		<div class="first-label">
			<div class="left-flex">
			<img src="{{asset('images/linkedin .svg')}}" class = "linkIcon">
			<p class="link-title">LinkedIn {{__('cv_lang.link')}}</p>
			</div>
			<input type="url" name="" class = "end-links linkedin" value="{{$all_connections['linkedIn']}}"required>
		</div>
		<div class="first-label">
			<div class="left-flex">
			<img src="{{asset('images/twitter .svg')}}" class = "linkIcon">
			<p class="link-title">Twitter {{__('cv_lang.link')}}</p>
			</div>
			<input type="url" name="" class = "end-links twitter" value="{{$all_connections['twitter']}}" required>
		</div>
		<div class="first-label">
			<div class="left-flex">
			<img src="{{asset('images/Dribble.svg')}}" class = "linkIcon">
			<p class="link-title">Dribble {{__('cv_lang.link')}}</p>
			</div>
			<input type="url" name="" class = "end-links dribble"  value="{{$all_connections['dribble']}}" required>
		</div>
		<div class="first-label">
			<div class="left-flex">
				<img src="{{asset('images/Github.svg')}}" class = "linkIcon">
				<p class="link-title">Github {{__('cv_lang.link')}}</p>
			</div>
			<input type="url" name="" class = "end-links github"  value="{{$all_connections['github']}}" required>
		</div>
		<div class="first-label">
			<div class="left-flex">
				<img src="{{asset('images/behance-logo.svg')}}" class = "linkIcon">
				<p class="link-title">Behance {{__('cv_lang.link')}}</p>
			</div>
			<input type="url" name="" class = "end-links behance"  value="{{$all_connections['behance']}}" required>
		</div>

	</div>
</div>
<div class = "container res-ei" style = "background:none;box-shadow: none; position: relative;display: flex;">
	<label class = "label-end">
		<div class="flex-end">
			<?php
            $checked='checked';
         
			if(isset($data->published)){
			if($data->published==0)
					$checked='';
			else 
				$checked='checked';

			}

			?>
			<input type="checkbox" name="" <?=$checked?> class ="checkbox">
			<p class = "text-end">{{__('cv_lang.public_link')}}</p>
		</div>
		<p class = "text-end-second">{{__('cv_lang.if_public')}}</p>
	</label>
	<div class = "flex-right">
		<div class="callout">
			<span style = "color:red">{{__('cv_lang.required')}}</span>
		</div>
		<input type="button" class = "done" value="Done">
	</form>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.js" integrity="sha512-oFLHZETzSq73qlg3k4OFuVzRiADU9pt13uI7nxpBNPT2WVZBM42Z/2G6BUKWV5vG8exDwyWTftxjd51+A+XG/w==" crossorigin="anonymous"></script>
<script >
      var url="{{url('/')}}";
    
    </script>
<script src="{{asset('js/cv_script.js')}}"></script>
</body>
</html>