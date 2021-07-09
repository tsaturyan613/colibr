@extends('layouts.main')

@section('title', 'FAQ')

@section('content')
<canvas class="nokey" style="position: absolute;z-index: 0;width: 100%;"></canvas>
<div class="container pt-5 block">
  <div class='text-center mb-5 title'>
    <h1>Frequently Asked Questions</h1>
  </div>
  <div class="accordion-wrapper ">
    <div class="acc-head card p-3 rounded-0 accord-bg accord-bg">
     Do I need prior knowledge to participate in classes?
    </div>
    <div class="acc-body rounded-0 accord-bg1">
    No prior knowledge is required to participate in the courses, but a little knowledge of English is desirable.
    </div>
  </div>
  <div class="accordion-wrapper">
    <div class="acc-head card p-3 rounded-0 accord-bg">
      Who are the courses for?
    </div>
    <div class="acc-body rounded-0 accord-bg1">
     The courses are designed for both beginners and those who have some basic knowledge.
    </div>
  </div>
  <div class="accordion-wrapper">
    <div class="acc-head card p-3 rounded-0 accord-bg">
      Do you provide us with computers?
    </div>
    <div class="acc-body rounded-0 accord-bg1">
       Our classrooms are technically equipped. However, if you wish, you can participate in the course with your laptop.
    </div>
  </div>
    <div class="accordion-wrapper">
    <div class="acc-head card p-3 rounded-0 accord-bg">
      Do you provide a certificate at the end of the course?
    </div>
    <div class="acc-body rounded-0 accord-bg1">
      After successfully completing the course you are given a certificate.
    </div>
  </div>
    <div class="accordion-wrapper">
    <div class="acc-head card p-3 rounded-0 accord-bg">
      Is it possible to get a job after graduating the course?
    </div>
    <div class="acc-body rounded-0 accord-bg1">
      After completing the course, the students with high marks are given the opportunity of an internship, which, if successful, gives an opportunity to work in our or our partner organizations.
    </div>
  </div>
    <div class="accordion-wrapper">
    <div class="acc-head card p-3 rounded-0 accord-bg">
       What kind of classes do you organize: individual or group trainings?
    </div>
    <div class="acc-body rounded-0 accord-bg1">
       Our classes are held in both group and individual versions.
    </div>
  </div>
    <div class="accordion-wrapper">
    <div class="acc-head card p-3 rounded-0 accord-bg">
      How can I enroll in programming classes?
    </div>
    <div class="acc-body rounded-0 accord-bg1">
     You can register for the courses both by calling and by registering through the website.
  </div>
</div>










  <script type="text/javascript">
      $(document).ready(function(){
  $('.acc-head').click(function(){
    $(this).next().slideToggle(500);
    $(this).toggleClass('active');
  })
})
  </script>

@endsection


