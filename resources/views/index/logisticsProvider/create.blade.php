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
          <div class="form-group">
            <label for="name">物流商名称：</label>
            <input class="form-control" id="name" name="name" type="text" placeholder="请输入物流商名或企业名" required="">
          </div>
          <div class="form-group">
            <label for="price">价格：</label>
            <input class="form-control" id="price" name="price" type="text" placeholder="请输入回收价格" required="">
          </div>
          <div class="form-group">
            <label for="contract">联系人：</label>
            <input class="form-control" id="contract" name="contact" type="text" placeholder="请输入联系人" required="">
          </div>
          <div class="form-group">
            <label for="phone">手机号：</label>
            <input class="form-control" id="phone" name="phone" type="text" placeholder="请输入电子邮箱" required="">
          </div>
          <div class="form-group">
            <label for="email">电子邮箱：</label>
            <input class="form-control" id="email" name="email" type="text" placeholder="请输入电子邮箱" required="">
          </div>
          <div class="form-group">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> 确认添加</button>&nbsp;&nbsp;&nbsp;&nbsp;
              <button class="btn btn-secondary" type="reset"><i class="fa fa-fw fa-lg fa-repeat"></i> 重 置</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
@endsection