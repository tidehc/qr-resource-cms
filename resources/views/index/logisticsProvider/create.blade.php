@extends('layouts.index')

@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-plus"></i> 添加物流商</h1>
      <p>添加一条新的物流商信息</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="javascript:;">添加物流商 </a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      @include('index.success')
      @include('index.errors')
      <div class="tile">
        <form action="{{ url('index/logisticsProvider') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group row">
            <label class="control-label col-md-2" for="name"><span class="text-danger">*</span> 物流商名称：</label>
            <div class="col-md-10">
              <input class="form-control" id="name" name="name" type="text" placeholder="请输入物流商名或企业名" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="price"><span class="text-danger">*</span> 价格：</label>
            <div class="col-md-10">
              <input class="form-control" id="price" name="price" type="text" placeholder="请输入回收价格" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="contract"><span class="text-danger">*</span> 联系人：</label>
            <div class="col-md-10">
              <input class="form-control" id="contract" name="contact" type="text" placeholder="请输入联系人" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="phone"><span class="text-danger">*</span> 手机号：</label>
            <div class="col-md-10">
              <input class="form-control" id="phone" name="phone" type="text" placeholder="请输入电子邮箱" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="email"><span class="text-danger">*</span> 电子邮箱：</label>
            <div class="col-md-10">
              <input class="form-control" id="email" name="email" type="text" placeholder="请输入电子邮箱" required="">
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
</main>
@endsection