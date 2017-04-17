@extends('admin.layouts.master')

@section('content')
  <div  class="row">
    <div class="col-md-3">
      @include('admin.product._product_table')
    </div>
    <div class="col-md-9">.col-md-1</div>
  </div>
@endsection
