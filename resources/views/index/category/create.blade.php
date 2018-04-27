@extends('layouts.index')

@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-plus"></i> 添加分类</h1>
      <p>新增一份资源类别</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="javascript:;">添加分类 </a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      @include('index.success')
      @include('index.errors')
      <div class="tile">
        <form action="{{ url('index/category') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group row">
            <label class="control-label col-md-2" for="name"><span class="text-danger">*</span> 分类名：</label>
            <div class="col-md-10">
              <input class="form-control" id="name" name="name" type="text" placeholder="请输入分类名称" required=""><small class="form-text text-muted">推荐英文名</small>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="display_name"><span class="text-danger">*</span> 显示名称：</label>
            <div class="col-md-10">
              <input class="form-control" id="display_name" name="display_name" type="text" placeholder="请输入显示名称" required=""><small class="form-text text-muted">填写一个易于理解的(中文)名称</small>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="description">详细描述：</label>
            <div class="col-md-10">
              <input class="form-control" id="description" name="description" type="text" placeholder="请输入描述信息(选填)"><small class="form-text text-muted">该分类的详细描述</small>
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