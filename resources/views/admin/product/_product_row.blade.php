<li class="{{url()->current()===route('products.show',['category' => $product->category->eng_name, 'product' => $product->eng_name]) ? 'active' : ''}}">
  <a href="/{{$product->category->eng_name}}/{{$product->eng_name}}">
    {{ $product->name }}
  </a>
</li>
