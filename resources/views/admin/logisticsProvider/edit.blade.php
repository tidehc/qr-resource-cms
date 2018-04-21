@extends('layouts.iframe')

@section('main')
  <div class="row">
    <div class="col-md-12">
      @include('admin.success')
      @include('admin.errors')
      <div class="tile">
        <form action="{{ url('admin/logisticsProvider/' . $logisticsProvider->id) }}" method="post">
          {{ csrf_field() }}
          {{ method_field('put')}}
          <div class="form-group">
            <label for="name">物流商名称：</label>
            <input class="form-control" id="name" name="name" value="{{ $logisticsProvider->name }}" type="text" placeholder="请输入物流商名或企业名" required="">
          </div>
          <div class="form-group">
            <label for="price">价格：</label>
            <input class="form-control" id="price" name="price" value="{{ $logisticsProvider->price }}" type="text" placeholder="请输入价格" required="">
          </div>
          <div class="form-group">
            <label for="contract">联系人：</label>
            <input class="form-control" id="contract" name="contact" value="{{ $logisticsProvider->contact }}" type="text" placeholder="请输入联系人" required="">
          </div>
          <div class="form-group">
            <label for="phone">手机号：</label>
            <input class="form-control" id="phone" name="phone" value="{{ $logisticsProvider->phone }}" type="text" placeholder="请输入电子邮箱" required="">
          </div>
          <div class="form-group">
            <label for="email">电子邮箱：</label>
            <input class="form-control" id="email" name="email" value="{{ $logisticsProvider->email }}" type="text" placeholder="请输入电子邮箱" required="">
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