@extends('layouts.iframe')

@section('main')
<div class="container">
  <div class="row">
    <p class="col-md-2">管理员：</p>
    <p class="col-md-10">{{ $admin->username }}</p>
  </div>
  <div class="row">
    <p class="col-md-2">手机号：</p>
    <p class="col-md-10">{{ $admin->phone }}</p>
  </div>
  <div class="row">
    <p class="col-md-2">备注：</p>
    <p class="col-md-10">{{ $admin->memo }}</p>
  </div>
  <div class="row">
    <p class="col-md-2">拥有角色：</p>
    <p class="col-md-10">
      @foreach($admin->roles as $v)
        @if($v->name == 'admin')
          <span class="badge badge-pill badge-danger">{{ $v->display_name }}</span>&nbsp;&nbsp;
        @else
          <span class="badge badge-pill badge-success">{{ $v->display_name }}</span>&nbsp;&nbsp;
        @endif
      @endforeach
    </p>
  </div>
</div>
@endsection