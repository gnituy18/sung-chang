<div class="side-menu">
  @foreach ($category->products as $product)
    | <a class="{{ url()->current()==route('product', ['product' => $product->eng_name]) ? 's-active' : '' }}" href="{{ route('product', ['product' => $product->eng_name]) }}">{{ $product->name }} {{ $product->eng_name }}</a><br>
  @endforeach
</div>
