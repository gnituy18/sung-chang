<button type="button" data-toggle="modal" data-target="{{ isset($product) ? '#modal-edit' : '#modal-create' }}" class="btn btn-primary">{{ isset($product) ? '修改資料' : '新增分類' }}</button>
<div id="{{ isset($product) ? 'modal-edit' : 'modal-create' }}" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">修改資訊</h4>
      </div>
      <form method="post" action="{{ isset($product) ? route('products.update', ['category' => $category, 'product' => $product->eng_name]) : route('products.store', ['category' => $category]) }}">
        <div class="modal-body">
          <div class="form-group">
            <label for="product_name">產品中文名稱</label>
            <input name="name" type="text" class="form-control" id="product_name" value="{{ $product->name or ''}}">
          </div>
          <span> </span>
          <div class="form-group">
            <label for="product_eng_name">產品英文名稱</label>
            <input name="eng_name" type="text" class="form-control" id="product_eng_name" value="{{$product->eng_name or ''}}">
          </div>
          @if (isset($product))
            <label>順序</label>
            <select name="order" class="form-control">
              @for ($i = 1; $i <= $product->category->products->count(); $i++)
                <option {{ $product->order === $i ? 'selected="selected"' : '' }} >{{ $i }}</option>
              @endfor
            </select>
          @endif
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">確認</button>
        </div>
        {{ isset($product) ? method_field('PUT') : ''}}
        {{ csrf_field() }}
      </form>
    </div>
  </div>
</div>
