@extends('admin.layouts.master')

@section('content')
  <h2>{{ $category->name }} / 新增</h2>
  <hr>
  @include('admin.product._product_form')
@endsection
