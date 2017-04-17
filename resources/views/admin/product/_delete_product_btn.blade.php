<button type="button" data-toggle="modal" data-target="#delete" class="btn btn-danger">刪除分類</button>
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
