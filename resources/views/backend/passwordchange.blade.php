@extends('backend/dashboard')

@section('content')
<form class="form-horizontal tasi-form" method="post" action="">
  {{csrf_field()}}
  @if(count($errors)>0)
    @foreach($errors->all() as $error)
    <div class="alert alert-block alert-danger fade in">
        <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="icon-remove"></i>
        </button>
        {{$error}}
    </div>
    @endforeach
  @endif
  <div class="form-group">
    <label class="col-sm-2 control-label">原密码</label>
    <div class="col-sm-10">
        <input type="text" name="oldPwd" class="form-control" value="{{ old('oldPwd') }}">
        <span class="help-block">请输入原来的密码</span>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">新密码</label>
    <div class="col-sm-10">
        <input type="text" name="password" class="form-control" value="{{ old('password') }}">
        <span class="help-block">请输入要重新设置的密码，6-15位英文数字组合</span>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">确认密码</label>
    <div class="col-sm-10">
        <input type="text" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
        <span class="help-block">请再次输入要重新设置的密码</span>
    </div>
  </div>
  <button type="submit" class="btn btn-info">确认修改</button>
</form>
@endsection
