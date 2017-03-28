<nav class="menu">
  <li style="margin-left:-25px;" class="menu-element {{ url()->current()==route('about') ? 'active' : '' }}"><a href="{{ route('about') }}">關於我們 About</a></li>
  <span>|</span>
  <li class="menu-element {{ url()->current()==route('log') ? 'active' : '' }}"><a href="{{ route('log') }}">原木買賣 Log</a></li>
  <span>|</span>
  @foreach ($categories as $category)
    @if ($category->eng_name === 'Collection')
      <li class="menu-element {{ (isset($currentCategory) && $currentCategory->eng_name == 'Collection') ? 'active' : '' }}"><a href="/collection">{{ $category->name }} {{ $category->eng_name }}</a></li>
      <span>|</span>
    @else
      <li class="menu-element {{ (isset($activeProduct) && ($activeProduct->category->eng_name === $category->eng_name)) ? 'active' : '' }}">
        <span style="display:inline-block">{{$category->name}} {{$category->eng_name}}</span>
        <ul class="sub-menu">
          @foreach ($category->products as $product)
            <li><a href="{{ route('product',['product'=>$product->eng_name]) }}">{{$product->name}} {{$product->eng_name}}</a></li>
          @endforeach
        </ul>
      </li>
      <span>|</span>
    @endif
  @endforeach
  <li style="margin-right:-25px;" class="menu-element {{ url()->current()==route('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">聯絡我們 Contact</a></li>
</nav>
<div class="ham-menu-control"></div>
