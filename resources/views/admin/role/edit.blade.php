@extends('layouts.iframe')

@section('main')
  <div class="row">
    <div class="col-md-12">
      @include('admin.success')
      @include('admin.errors')
      <div class="tile">
        <form action="{{ url('admin/entrust/role/'. $role->id) }}" method="post">
          {{ csrf_field() }}
          {{ method_field('put')}}
          <div class="form-group row">
            <label class="control-label col-md-2" for="name">角色名：</label>
            <div class="col-md-10">
              <input class="form-control" id="name" name="name" type="text" placeholder="请输入角色名称" value="{{ $role->name }}" required=""><small class="form-text text-muted">推荐英文名</small>
              </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="display_name">显示名称：</label>
            <div class="col-md-10">
              <input class="form-control" id="display_name" name="display_name" type="text" value="{{ $role->display_name }}" placeholder="请输入显示名称" required=""><small class="form-text text-muted">填写一个易于理解的(中文)名称</small>
              </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="description">详细描述：</label>
            <div class="col-md-10">
              <input class="form-control" id="description" name="description" type="text" value="{{ $role->description }}" placeholder="请输入描述信息(选填)"><small class="form-text text-muted">该角色的详细描述</small>
              </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="description">拥有权限：</label>
            <div class="col-md-10">
              <div class="row">
                @foreach($permissions as $v)
                  <div class="col-md-3">
                    <div class="animated-checkbox">
                      <label>
                        <input type="checkbox" class="permissions" name="permissions[]" value="{{ $v->id }}" 
                          @if($role->hasPermission($v->name) )checked="" @endif"><span class="label-text">{{ $v->display_name }}</span>
                      </label>
                    </div>
                  </div>
                @endforeach
              </div>
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