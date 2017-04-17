<form class="form-inline" enctype="multipart/form-data" action="{{ route('photos.store', ['product'=> $product_eng_name])}}" method="post">
  <div class="form-group">
    <label for="product_name">上傳圖片</label>
    <input class="form-control" name="photo" type="file">
  </div>
  <div class="form-group">
    <label for="product_name">圖片名稱</label>
    <input class="form-control" name="name" type="text">
  </div>
  <div class="form-group">
    <input class="btn btn-success" type="submit" value="上傳">
  </div>
  {{ csrf_field() }}
</form>
