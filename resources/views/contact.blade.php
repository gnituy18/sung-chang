@extends('layouts.contact')

@section('content')
  <div id="map" style="margin-top:80px;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2849.937214881214!2d121.7656734726904!3d24.72569910901135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3467e5002890c497%3A0x98f02fa8a18ee073!2zMjYw5a6c6Jit57ij5a6c6Jit5biC5Lit5bGx6Lev5LiA5q61MjQ15be3NTfomZ8!5e0!3m2!1szh-TW!2stw!4v1492498545471" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>
  <div class="contact-foot" style="line-height:150%;padding-top:50px;">
    <span>松昌股份有限公司</span>
    <span class="float-right">SUNG CHANG WOOD CO.,LTD.</span><br>
    <span>T 03-9503117</span>
    <span class="float-right">T 03-9503117</span><br>
    <span>F 03-9503070</span>
    <span class="float-right">F 03-9503070</span><br>
    <span>E aguo@rgicc.com</span>
    <span class="float-right">E aguo@rgicc.com</span><br>
    <span>宜蘭縣羅東鎮中山路一段579巷57號</span>
    <span class="float-right">No.57, Ln. 579, Sec. 1, Zhongshan Rd., Luodong Township</span><br>
    <span>週一~週五 / 08:00-17:00</span>
    <span class="float-right">Mon~Fri / 08:00-17:00</span><br>
  </div>
  <div class="rwd-foot foot">
    <p>
      松昌股份有限公司<br>
      T 03-9503117<br>
      F 03-9503070<br>
      E aguo@rgicc.com<br>
      宜蘭縣羅東鎮中山路一段579巷57號<br>
      週一~週五 / 08:00-17:00<br>
      歡迎來電預約<br>
      SUNG CHANG WOOD CO.,LTD.<br>
      T 03-9503117<br>
      F 03-9503070<br>
      E aguo@rgicc.com<br>
      No.57, Ln. 579, Sec. 1, Zhongshan Rd., Luodong Township<br>
      Mon~Fri / 08:00-17:00<br>
    </p>
  </div>
  <script>
    window.document.getElementById('map').onclick = map
    function map(){
      if( (navigator.platform.indexOf("iPhone") != -1)
          || (navigator.platform.indexOf("iPod") != -1)
          || (navigator.platform.indexOf("iPad") != -1))
           window.open("maps://maps.google.com/maps?daddr=lat,long&amp;ll=");
      else
           window.open("http://maps.google.com/maps?daddr=lat,long&amp;ll=");
    }
  </script>
@endsection
