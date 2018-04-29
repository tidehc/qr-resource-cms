@extends('layouts.iframe')

@section('main')
<div class="container">
  <div class="row">
    <p class="col-md-2">角色名：</p>
    <p class="col-md-10">{{ $role->name }}</p>
  </div>
  <div class="row">
    <p class="col-md-2">显示名称：</p>
    <p class="col-md-10">
      @if($role->name == 'admin')
        <span class="badge badge-pill badge-danger">{{ $role->display_name }}</span>
      @else
        <span class="badge badge-pill badge-success">{{ $role->display_name }}</span>
      @endif
    </p>
  </div>
  <div class="row">
    <p class="col-md-2">描述：</p>
    <p class="col-md-10">{{ $role->description }}</p>
  </div>
  @if($role->name != 'admin')
    <div class="row">
      <p class="col-md-2">拥有权限：</p>
      <p class="col-md-10">
        @foreach($role->perms as $v)
          <span class="badge badge-pill badge-dark">{{ $v->display_name }}</span>&nbsp;&nbsp;
        @endforeach
      </p>
    </div>
  @endif
</div>
@endsection