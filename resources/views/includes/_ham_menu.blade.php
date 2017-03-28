<div class="ham-menu">
  <div class="ham-menu-element"><a href="{{ route('about') }}">關於我們<br>About</a></div>
  <div class="ham-menu-element"><a href="{{ route('log') }}">原木買賣<br>Log</a></div>
  @foreach ($categories as $category)
    @if ($category->eng_name !== 'Collection')
      <div class="ham-menu-element">
        <span onclick="toggleHamSubMenu('{{$category->eng_name}}')" class="ham-sub-menu-title">{{ $category->name}}<br>{{ $category->eng_name}}</span><br>
          <div class="display-none" id="{{ $category->eng_name}}">
            @foreach ($category->products as $product)
              <div class="ham-sub-menu-element"><a href="{{ route('product', ['product' => $product->eng_name]) }}">{{ $product->name }} {{ $product->eng_name }}</a></div>
            @endforeach
          </div>
      </div>
    @endif
  @endforeach
  <div class="ham-menu-element"><a href="{{ route('product', ['name' => 'collection']) }}">實木藝品<br>Collection</a></div>
  <div class="ham-menu-element"><a href="{{ route('contact')}}">聯絡我們<br>Contact</a></div>
</div>
