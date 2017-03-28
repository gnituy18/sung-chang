<form enctype="multipart/form-data" action="{{ route('photos.store',['photo'=> $product->eng_name])}}" method="post">
  <div class="form-group">
    <input class="form-control" name="photo" type="file">
  </div>
  <span>產品說明</span>
  <div class="form-group">
    <input class="form-control" name="name" type="text">
  </div>
  <div class="form-group">
    <input class="btn btn-default" type="submit" value="上傳">
  </div>
  {{ csrf_field() }}
</form>
