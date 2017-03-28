<!DOCTYPE html>
<html>
  @include('includes._head')
  <body>
    @include('includes._ham_menu', ['some' => 'data'])
    <div class="ham-menu-neighbor">
      <div class="container">
        <div class="nav">
          @include('includes._logo')
          @include('includes._nav')
        </div>
        @yield('content')
        @include('includes._foot')
        @include('includes._scripts')
      </div>
    </div>
  </body>
</html>
