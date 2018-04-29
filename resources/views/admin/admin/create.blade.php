@extends('layouts.iframe')

@section('main')
  <div class="row">
    <div class="col-md-12">
      @include('admin.success')
      @include('admin.errors')
      <div class="tile">
        <form action="{{ url('admin/entrust/admin') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group row">
            <label class="control-label col-md-2" for="username">管理员：</label>
            <div class="col-md-10">
              <input class="form-control" name="username" type="text" placeholder="请输入管理员名称" required="">
              </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="password">登录密码：</label>
            <div class="col-md-10">
              <input class="form-control" name="password" type="password" placeholder="请输入登录密码" required="">
              </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="password_confirmation">确认密码：</label>
            <div class="col-md-10">
              <input class="form-control" name="password_confirmation" type="password" placeholder="请再输入一次登录密码" required="">
              </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="description">赋予角色：</label>
            <div class="col-md-10">
              <div class="row">
                @foreach($roles as $v)
                  @if($v->name != 'admin')
                    <div class="col-md-3">
                      <div class="animated-checkbox">
                        <label>
                          <input type="checkbox" name="roles[]" value="{{ $v->id }}"><span class="label-text">{{ $v->display_name }}</span>
                        </label>
                      </div>
                    </div>
                  @endif
                @endforeach
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> 确认添加</button>&nbsp;&nbsp;&nbsp;&nbsp;
              <button class="btn btn-secondary" type="reset"><i class="fa fa-fw fa-lg fa-repeat"></i> 重 置</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection