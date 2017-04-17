@if (isset($product))
  <ul class="nav nav-pills nav-stacked">
    @each('admin.product._product_row', $products, 'product')
  </ul>
@endif
<br>
@include('admin.product._product_form',['product' => null])
