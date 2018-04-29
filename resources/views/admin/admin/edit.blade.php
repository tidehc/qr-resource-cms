@extends('layouts.iframe')

@section('main')
  <div class="row">
    <div class="col-md-12">
      @include('admin.success')
      @include('admin.errors')
      <div class="tile">
        <form action="{{ url('admin/entrust/admin/'. $admin->id) }}" method="post">
          {{ csrf_field() }}
          {{ method_field('put')}}
           <div class="form-group row">
            <label class="control-label col-md-2">管理员：</label>
            <div class="col-md-10">{{ $admin->username }}</div>
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
                          <input type="checkbox" name="roles[]" value="{{ $v->id }}"
                          @if($admin->hasRole($v->name) )checked="" @endif"><span class="label-text">{{ $v->display_name }}</span>
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
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> 确认修改</button>&nbsp;&nbsp;&nbsp;&nbsp;
              <button class="btn btn-secondary" type="reset"><i class="fa fa-fw fa-lg fa-repeat"></i> 重 置</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection