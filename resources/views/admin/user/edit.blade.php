@extends('layouts.iframe')

@section('main')
  <div class="row">
    <div class="col-md-12">
      @include('admin.success')
      @include('admin.errors')
      <div class="tile">
        <form action="{{ url('admin/user/'. $user->id) }}" method="post">
          {{ csrf_field() }}
          {{ method_field('put')}}
          <div class="form-group row">
            <label class="control-label col-md-2" for="username"><span class="text-danger">*</span> 用户名：</label>
            <div class="col-md-10">
              <input class="form-control" id="username" name="username" value="{{ $user->username }}" type="text" placeholder="请输入用户名" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="password"><span class="text-danger">*</span> 密码：</label>
            <div class="col-md-10">
              <input class="form-control" id="password" name="password" value="{{ $user->password }}" type="password" placeholder="请输入密码" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="password_confirmation"><span class="text-danger">*</span> 确认密码：</label>
            <div class="col-md-10">
              <input class="form-control" id="password_confirmation" name="password_confirmation" value="{{ $user->password }}" type="password" placeholder="请输入密码" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="logic">用户注册：</label>
            <div class="col-md-10">
              <input class="form-control" id="logic" name="logic" value="{{ $user->logic }}" type="text" placeholder="请输入注册信息">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="address">地址：</label>
            <div class="col-md-10">
              <input class="form-control" id="address" name="address" value="{{ $user->address }}" type="text" placeholder="请输入地址">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="email">电子邮箱：</label>
            <div class="col-md-10">
              <input class="form-control" id="email" name="email" value="{{ $user->email }}" type="text" placeholder="请输入电子邮箱">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="phone">手机号：</label>
            <div class="col-md-10">
              <input class="form-control" id="phone" name="phone" value="{{ $user->phone }}" type="text" placeholder="请输入手机号">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="production_enterprise">废弃资源原产品生产企业：</label>
            <div class="col-md-10">
              <input class="form-control" id="production_enterprise" name="production_enterprise" value="{{ $user->production_enterprise }}" type="text" placeholder="请输入废弃资源原产品生产企业">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="seller">销售商：</label>
            <div class="col-md-10">
              <input class="form-control" id="seller" name="seller" value="{{ $user->seller }}" type="text" placeholder="请输入销售商">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="recycler">回收商：</label>
            <div class="col-md-10">
              <input class="form-control" id="recycler" name="recycler" value="{{ $user->recycler }}" type="text" placeholder="请输入回收商">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="trader">交易商：</label>
            <div class="col-md-10">
              <input class="form-control" id="trader" name="trader" value="{{ $user->trader }}" type="text" placeholder="请输入交易商">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="logistics_provider">物流商：</label>
            <div class="col-md-10">
              <input class="form-control" id="logistics_provider" name="logistics_provider" value="{{ $user->logistics_provider }}" type="text" placeholder="请输入物流商">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="dismantling_enterprise">拆解企业：</label>
            <div class="col-md-10">
              <input class="form-control" id="dismantling_enterprise" name="dismantling_enterprise" value="{{ $user->dismantling_enterprise }}" type="text" placeholder="请输入拆解企业">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="memo">备注：</label>
            <div class="col-md-10">
              <input class="form-control" id="memo" name="memo" value="{{ $user->memo }}" type="text" placeholder="请输入备注">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> 确认修改</button>&nbsp;&nbsp;&nbsp;&nbsp;
              <button class="btn btn-secondary" type="reset"><i class="fa fa-fw fa-lg fa-repeat"></i> 重 置</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection