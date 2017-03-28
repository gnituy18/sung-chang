<a href="{{ route('products.show',['product' => $product->eng_name]) }}" class="list-group-item">
  <h4 class="list-group-item-heading">{{ $product->name }}</h4>
  <span class="list-group-item-heading">{{ $product->eng_name }}</span>
</a>
