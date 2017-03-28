<div class="row">
  @if ($category->eng_name === 'Collection')
    <h2 ><span><a href="{{ route('products.show',['product' => 'collection']) }}">{{ $category->name }}</a></span></h2>
  @else
    <h2 >{{ $category->name }} / <span><a href="{{ route('products.create',['product' => $category->eng_name]) }}">新增</a></span></h2>
    <div style="text-align:center;" class="list-group">
      @each('admin.product._product_row', $category->products, 'product')
    </div>
  @endif
</div>
