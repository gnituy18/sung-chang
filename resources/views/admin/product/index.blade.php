@extends('admin.layouts.master')

@section('content')
  @each ('admin.product._product_table', $categories, 'category')
@endsection
