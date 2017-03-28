<form method="post" action="{{ isset($product) ? route('products.update',['product' => $product->eng_name]) : route('products.store')}}">
  <div class="form-group">
    <label for="product_name">產品中文名稱</label>
    <input name="name" type="text" class="form-control" id="product_name" value="{{$product->name or ''}}">
  </div>
  <div class="form-group">
    <label for="product_eng_name">產品英文名稱</label>
    <input name="eng_name" type="text" class="form-control" id="product_eng_name" value="{{$product->eng_name or ''}}">
  </div>
  @if (!isset($product))
  <input style="display:none;" type="text" name="category" value="{{ $category->id }}">
  @endif
  <button type="submit" class="btn btn-default">確認</button>
  {{ isset($product) ? method_field('PUT') : ''}}
  {{ csrf_field() }}
</form>
