@extends('layouts.admin')

@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> 管理员信息</h1>
      <p>管理员个人信息</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="javascript:;">管理员信息</a></li>
    </ul>
  </div>
  @include('admin.success')
  @include('admin.errors')
  <div class="row user">
    <div class="col-md-3">
      <div class="tile p-0">
        <ul class="nav flex-column nav-tabs user-tabs">
          <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab" aria-expanded="false"> 基本信息</a></li>
          <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab" aria-expanded="true"> 登录密码</a></li>
        </ul>
      </div>
    </div>
    <div class="col-md-9">
      <div class="tab-content">
        <div class="tab-pane active" id="user-timeline" aria-expanded="false">
          <div class="tile user-settings">
            <h4 class="line-head">基本信息</h4>
            <form action="{{ url('admin/updateProfile') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md-8 mb-4">
                  <label>用户名(不可修改)</label>
                  <input class="form-control" type="text" value="{{ $admin->username }}" readonly>
                </div>
              </div>
              <div class="row">
                <div class="clearfix"></div>
                <div class="col-md-8 mb-4">
                  <label>手机号</label>
                  <input class="form-control" type="text" name="phone" value="{{ $admin->phone }}" placeholder="请输入有效的手机号码">
                </div>
                <div class="clearfix"></div>
                <div class="col-md-8 mb-4">
                  <label>备注</label>
                  <textarea class="form-control" name="memo" placeholder="（选填）">{{ $admin->memo }}</textarea>
                </div>
              </div>
              <div class="row mb-10">
                <div class="col-md-12">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> 确认更新</button>&nbsp;&nbsp;&nbsp;&nbsp;
                  <button class="btn btn-secondary" type="reset"><i class="fa fa-fw fa-lg fa-repeat"></i> 重 置</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="tab-pane" id="user-settings" aria-expanded="true">
          <div class="tile user-settings">
            <h4 class="line-head">登录密码</h4>
            <form action="{{ url('admin/updatePassword') }}" method="post">
              {{ csrf_field() }}
              <div class="row mb-4">
                <div class="col-md-8 mb-4">
                  <label>原密码</label>
                  <input class="form-control" type="password" name="password_old" value="" placeholder="请输入原密码">
                </div>
                <div class="col-md-8 mb-4">
                  <label>新密码</label>
                  <input class="form-control" type="password" name="password" value="" placeholder="请输入新密码">
                </div>
                <div class="col-md-8 mb-4">
                  <label>确认密码</label>
                  <input class="form-control" type="password" name="password_confirmation" value="" placeholder="请确认新密码">
                </div>
              </div>
              <div class="row mb-10">
                <div class="col-md-12">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> 确认修改</button>&nbsp;&nbsp;&nbsp;&nbsp;
                  <button class="btn btn-secondary" type="reset"><i class="fa fa-fw fa-lg fa-repeat"></i> 重 置</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
