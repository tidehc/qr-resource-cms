@extends('layouts.index')

@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> 用户信息</h1>
      <p>用户个人信息</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="javascript:;">用户信息</a></li>
    </ul>
  </div>
  @include('index.success')
  @include('index.errors')
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
            <form action="{{ url('index/updateProfile') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md-8 mb-4">
                  <label>用户名(不可修改)</label>
                  <input class="form-control" type="text" value="{{ $user->username }}" readonly>
                </div>
              </div>
              <div class="row">
                <div class="clearfix"></div>
                <div class="col-md-8 mb-4">
                  <label>用户注册</label>
                  <input class="form-control" type="text" name="logic" value="{{ $user->logic }}" placeholder="请输入用户注册信息">
                </div>
                <div class="col-md-8 mb-4">
                  <label>地址</label>
                  <input class="form-control" type="text" name="address" value="{{ $user->address }}" placeholder="请输入您的地址">
                </div>
                <div class="col-md-8 mb-4">
                  <label>电子邮箱</label>
                  <input class="form-control" type="email" name="email" value="{{ $user->email }}" placeholder="请输入有效的电子邮箱">
                </div>
                <div class="col-md-8 mb-4">
                  <label>手机号</label>
                  <input class="form-control" type="text" name="phone" value="{{ $user->phone }}" placeholder="请输入有效的手机号">
                </div>
                <div class="col-md-8 mb-4">
                  <label>废弃资源原产品生产企业</label>
                  <input class="form-control" type="text" name="production_enterprise" value="{{ $user->production_enterprise }}" placeholder="请输入废弃资源原产品生产企业">
                </div>
                <div class="col-md-8 mb-4">
                  <label>销售商</label>
                  <input class="form-control" type="text" name="seller" value="{{ $user->seller }}" placeholder="请输入销售商">
                </div>
                <div class="col-md-8 mb-4">
                  <label>回收商</label>
                  <input class="form-control" type="text" name="recycler" value="{{ $user->recycler }}" placeholder="请输入回收商">
                </div>
                <div class="col-md-8 mb-4">
                  <label>交易商</label>
                  <input class="form-control" type="text" name="trader" value="{{ $user->trader }}" placeholder="请输入交易商">
                </div>
                <div class="col-md-8 mb-4">
                  <label>物流商</label>
                  <input class="form-control" type="text" name="logistics_provider" value="{{ $user->logistics_provider }}" placeholder="请输入物流商">
                </div>
                <div class="col-md-8 mb-4">
                  <label>拆解企业</label>
                  <input class="form-control" type="text" name="dismantling_enterprise" value="{{ $user->dismantling_enterprise }}" placeholder="请输入拆解企业">
                </div>
                <div class="clearfix"></div>
                <div class="col-md-8 mb-4">
                  <label>备注</label>
                  <textarea class="form-control" name="memo" placeholder="（选填）">{{ $user->memo }}</textarea>
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
            <form action="{{ url('index/updatePassword') }}" method="post">
              {{ csrf_field() }}
              <div class="row mb-4">
                <div class="col-md-8 mb-4">
                  <label><span class="text-danger">*</span> 原密码</label>
                  <input class="form-control" type="password" name="password_old" value="" placeholder="请输入原密码">
                </div>
                <div class="col-md-8 mb-4">
                  <label><span class="text-danger">*</span> 新密码</label>
                  <input class="form-control" type="password" name="password" value="" placeholder="请输入新密码">
                </div>
                <div class="col-md-8 mb-4">
                  <label><span class="text-danger">*</span> 确认密码</label>
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
