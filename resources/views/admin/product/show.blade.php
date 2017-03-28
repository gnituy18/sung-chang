@extends('admin.layouts.master')

@section('content')
  @if ($product->eng_name === 'collection')
    <h2>
      {{ $product->category->name}}
    </h2>
  @else
    <h2>
      {{ $product->category->name}} / {{ $product->name }} /
      <span style="cursor:pointer;color:#c72541;" data-toggle="modal" data-target="#delete">刪除</span>
    </h2>
    <hr>
    @include('admin.product._product_form')
    <div id="delete" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">刪除所有產品資料</h4>
          </div>
          <form action="{{ route('products.destroy', ['product' => $product->eng_name]) }}" method="post">
            <div class="modal-body">
                <div class="form-group">
                  <input type="password" class="form-control" name="password">
                </div>
            </div>
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger">刪除</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <hr>
  @endif
  <h2>產品照片</h2>
  @include('admin.product._upload_photo_form')
  @foreach ($product->photos as $photo)
  <div class="col-md-3">
    <a class="thumbnail" href="{{ route('photos.destroy', ['id' => $photo->id]) }}" onclick="return confirm('你確定要刪除嗎?')">
      <img src={{ asset($photo->path) }}>
    </a>
  </div>

  @endforeach


@endsection
