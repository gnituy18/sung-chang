@extends('admin.layouts.master')

@section('content')
  @include('admin.product._upload_photo_form',['product_eng_name' => 'collection'])
  <hr>
  @include('admin.product._photo_wall', ['photos' => $photos, 'product_eng_name' => 'collection'])
@endsection
