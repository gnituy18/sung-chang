@extends('layouts.master')

@section('content')
  @include('includes._banner', ['url' => '/storage/about-banner.jpg'])
  <div style="min-height:350px;">
    <div class="intro">
      @include('includes._title', ['title' => '關於我們'])
      <p>松昌成立於民國48年，以建材行起家。當年販售之商品含括磚、木料、鋼筋水泥、砂石、瓦片及五金等等，涉及範圍甚廣。</p>
      <p>民國62年因宜蘭大元山伐木興盛，漸漸轉型為實木專賣。所製產品更熱銷日本及國內 , 像是 神社材、木門窗、木製家具等等。</p>
      <p>現今數十年來累積的經驗，使松昌成為宜蘭地區實木領域之專業指標。不但提供原木買賣、實木建材等規畫及統包服務，未來更積極推廣實木客製家具及藝品，將傳統木業融入設計文創及年輕元素。歡迎和我們一樣喜歡木頭天然質地、溫度的客人及設計師至現場參觀或電洽 了解更多詳細資訊。</p>
    </div>
    <div style="min-width:100px;display:inline-block;padding-left:10px;">
      <img style="display:inline-block;margin:15px 5px;vertical-align:top;" src="/storage/brand-wood.png" height="200">
      <img style="display:inline-block;margin:15px 5px;vertical-align:top;" src="/storage/company.jpg" height="200">
    </div>
  </div>
@endsection
