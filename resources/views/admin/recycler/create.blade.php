@extends('layouts.admin')

@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-plus"></i> 添加回收商</h1>
      <p>添加一条新的回首商信息</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="javascript:;">添加回收商 </a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      @include('admin.success')
      @include('admin.errors')
      <div class="tile">
        <form action="{{ url('admin/recycler') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="name">回收商名称：</label>
            <input class="form-control" id="name" name="name" type="text" placeholder="请输入回收商名或企业名" required="">
          </div>
          <div class="form-group">
            <label for="category_id">回收分类：</label>
            <select class="form-control" id="category_id" name="category_id" required="">
                <option>请选择一个回收的主要类别</option>
                @foreach($categorys as $v)
                  <option value="{{ $v->id }}">{{ $v->display_name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="product_price">回收价格：</label>
            <input class="form-control" id="product_price" name="product_price" type="text" placeholder="请输入回收价格" required="">
          </div>
          <div class="form-group">
            <label for="address">详细地址：</label>
            <input class="form-control" id="address" name="address" type="text" placeholder="请输入详细地址" required="">
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