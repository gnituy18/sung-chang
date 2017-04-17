@extends('admin.layouts.master')

@section('content')

    <div  class="row">
      <div class="col-md-2">
        @include('admin.product._product_table')
      </div>
      <div class="col-md-10">
        @if (isset($product))
          @include('admin.product._product_form')
          @include('admin.product._delete_product_btn')
          <hr>
          @include('admin.product._upload_photo_form',['product_eng_name' => $product->eng_name])
          <hr>
          @include('admin.product._photo_wall', ['photos' => $photos, 'product_eng_name' => $product->eng_name])
        @endif
      </div>
    </div>

@endsection
