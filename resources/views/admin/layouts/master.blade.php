<!DOCTYPE html>
<html>
  <head>
	  <meta>
    <title>松昌網站管理系統</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container" style="padding-top:30px;">
      <div >
        <ul class="nav nav-tabs">
          <li class="{{isset($category) && $category->eng_name === 'Lumber' ? 'active' : ''}}"><a href="/lumber">實木建材</a></li>
          <li class="{{isset($category) && $category->eng_name === 'Furniture' ? 'active' : ''}}"><a href="/furniture">客製家具</a></li>
          <li class="{{url()->current() === route('products.collection') ? 'active' : ''}}"><a href="/collection">實木藝品</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              其他功能 <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li role="presentation"><a href="/others">修改密碼</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div style="margin:10px 0px">
        @yield('content')
      </div>
    </div>
  </body>
</html>
