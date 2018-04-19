@extends('layouts.iframe')

@section('main')
  <div class="row">
    <div class="col-md-12">
      @include('admin.success')
      @include('admin.errors')
      <div class="tile">
        <form action="{{ url('admin/category/'. $category->id) }}" method="post">
          {{ csrf_field() }}
          {{ method_field('put')}}
          <div class="form-group">
            <label for="name">分类名</label>
            <input class="form-control" id="name" name="name" type="text" placeholder="请输入分类名称" value="{{ $category->name }}" required=""><small class="form-text text-muted">推荐英文名</small>
          </div>
          <div class="form-group">
            <label for="display_name">显示名称</label>
            <input class="form-control" id="display_name" name="display_name" type="text" value="{{ $category->display_name }}" placeholder="请输入显示名称" required=""><small class="form-text text-muted">填写一个易于理解的(中文)名称</small>
          </div>
          <div class="form-group">
            <label for="description">详细描述</label>
            <input class="form-control" id="description" name="description" type="text" value="{{ $category->description }}" placeholder="请输入描述信息(可选)"><small class="form-text text-muted">该分类的详细描述</small>
          </div>
          <div class="form-group">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> 确认修改</button>&nbsp;&nbsp;&nbsp;&nbsp;
              <button class="btn btn-secondary" type="reset"><i class="fa fa-fw fa-lg fa-repeat"></i> 重 置</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection