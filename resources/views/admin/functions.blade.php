@extends('admin.layouts.master')

@section('content')
  <form method="POST" action="{{ route('resetpw') }}">
    <div class="form-group">
      <label for="exampleInputEmail1">舊密碼</label>
      <input name="password" type="password" class="form-control" placeholder="舊密碼">
    </div>
    <div class="form-group">
      <label>新密碼</label>
      <input name="newpassword1" type="password" class="form-control" placeholder="新密碼">
    </div>
    <div class="form-group">
      <label>請重複輸入新密碼</label>
      <input name="newpassword2" type="password" class="form-control" placeholder="新密碼">
    </div>
    <button type="submit" class="btn btn-default">確認</button>
    {{ csrf_field() }}
  </form>
@endsection
