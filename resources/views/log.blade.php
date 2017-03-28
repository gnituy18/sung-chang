@extends('layouts.master')

@section('content')
  @include('includes._banner', ['url' => '/storage/log-banner.jpg'])
  <div style="min-height:350px;">
    <div class="intro">
      @include('includes._title', ['title' => '原木買賣'])
      <p>經營各式原木料買賣，包括日檜、日櫸、日柳杉、南美黑桃木、北美香衫、寮國香衫、非洲柚木、花旗松、黃檜、雲衫、紅杉等等，實際現貨之木料請來電洽詢</p>
    </div>
    <div style="display:inline-block;">
      <img style="display:inline-block;margin:30px 0;vertical-align:top;" src="/storage/wood.png" height="300">
    </div>
  </div>

@endsection
