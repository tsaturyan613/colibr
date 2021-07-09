@extends('layouts.main')

@section('title', 'ՀՏՀ')

@section('content')
 <canvas class="nokey" style="position: absolute;z-index: 0;width: 100%;"></canvas>
<div class="container pt-5 block" style="margin: 100px auto">
    <div class='text-center mb-5 title'>
       <h1 style='font-family: cursive; font-size: 35px'>Հաճախակի տրվող հարցեր</h1>
     </div>
    <div class="accordion-wrapper ">
        <div class="acc-head card p-3 rounded-0 accord-bg accord-bg"  style="border-radius: 5px !important">
          Դասընթացներին մասնակցելու համար անհրաժե՞շտ են նախնական գիտելիքներ։
        </div>
         <div class="acc-body rounded-0 accord-bg1" style="padding-left: 11px; padding: 12px; font-size: 15px; color: #7575a3;">
          Դասընթացներին մասնակցելու համար նախնական գիտելիքներ անհրաժեշտ չեն, սակայն ցանկալի է մի փոքր անգլերենի իմացությունը։
         </div>
      </div>
    <div class="accordion-wrapper">
        <div class="acc-head card p-3 rounded-0 accord-bg" style="border-radius: 5px !important">
             Ո՞ւմ համար են նախատեսված դասընթացները։
         </div>
         <div class="acc-body rounded-0 accord-bg1" style="padding-left: 11px; padding: 12px; font-size: 15px; color: #7575a3;">
              Դասընթացները նախատեսված են ինչպես սկսնակների, այնպես էլ  որոշակի նախնական գիտելիքներ ունեցողների համար։
         </div>
    </div>
    <div class="accordion-wrapper">
           <div class="acc-head card p-3 rounded-0 accord-bg" style="border-radius: 5px !important">
              Դուք համակարգիչներ տրամադրու՞մ, եք։
            </div>
            <div class="acc-body rounded-0 accord-bg1" style="padding-left: 11px; padding: 12px; font-size: 15px; color: #9494b8;">
          Մեր լսարանները տեխնիկապես ապահովված են։Սակայն ցանկության դեպքում կարող եք դասընթացին մասնակցել Ձեր նոթբուքով։
           </div>
    </div>
    <div class="accordion-wrapper">
       <div class="acc-head card p-3 rounded-0 accord-bg" style="border-radius: 5px !important">
         Դասընթացի ավարտին հավաստագիր տրամադրու՞մ եք։
        </div>
        <div class="acc-body rounded-0 accord-bg1" style="padding-left: 11px; padding: 12px; font-size: 15px; color: #7575a3;">
         Դասընթացի ավարտից հետո տրամադրում ենք հավաստագիր՝ համապատասխան որակավորմամբ։
        </div>
    </div>
    <div class="accordion-wrapper">
        <div class="acc-head card p-3 rounded-0 accord-bg" style="border-radius: 5px !important">
           Ձեզ մոտ սովորելուց հետո կարո՞ղ եմ ընդունվել աշխատանքի։
        </div>
        <div class="acc-body rounded-0 accord-bg1" style="padding-left: 11px; padding: 12px; font-size: 15px; color: #7575a3;">
            Դասընթացն ամբողջությամբ ավարտելուց հետո բարձր առաջադիմությամբ ուսանողներին տրվում է պրակտիկայի հնարավորություն, ինչը բարեհաջող անցնելու դեպքում՝ նաև աշխատանքի հնարավորություն մեր  կամ մեր գործընկեր կազմակերպություններում։
        </div>
    </div>
    <div class="accordion-wrapper">
        <div class="acc-head card p-3 rounded-0 accord-bg" style="border-radius: 5px !important">
           Դասերն անհատակա՞ն են, թե՞ խմբային։
        </div>
        <div class="acc-body rounded-0 accord-bg1" style="padding-left: 11px; padding: 12px; font-size: 15px; color: #7575a3;">
            Մեզ մոտ դասերն անցկացվում են թե՛ խմբային, թե՛ անհատական տարբերակներով։
        </div>
    </div>
    <div class="accordion-wrapper">
       <div class="acc-head card p-3 rounded-0 accord-bg" style="border-radius: 5px !important">
          Ինչպես կարող եմ գրանցվել ծրագրավորման դասերին։
       </div>
      <div class="acc-body rounded-0 accord-bg1" style="padding-left: 11px; padding: 12px; font-size: 15px; color: #7575a3;">
          Դասընթացներին կարող եք գրանցվել ինչպես զանգահարելով, այնպես էլ կայքի միջոցով գրանցվելով։
      </div>
    </div>
</div>









  <script type="text/javascript">
    $(".acc-body").slideUp();
      $(document).ready(function(){
  $('.acc-head').click(function(){
    $(this).next().slideToggle(500);
    $(this).toggleClass('active');
  })
})
  </script>

@endsection
  <!-- Default dropup button -->
