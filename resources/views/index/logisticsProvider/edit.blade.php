@extends('layouts.iframe')

@section('main')
  <div class="row">
    <div class="col-md-12">
      @include('index.success')
      @include('index.errors')
      <div class="tile">
        <form action="{{ url('index/logisticsProvider/' . $logisticsProvider->id) }}" method="post">
          {{ csrf_field() }}
          {{ method_field('put')}}
          <div class="form-group row">
            <label class="control-label col-md-2" for="name"><span class="text-danger">*</span> 物流商名称：</label>
            <div class="col-md-10">
              <input class="form-control" id="name" name="name" value="{{ $logisticsProvider->name }}" type="text" placeholder="请输入物流商名或企业名" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="price"><span class="text-danger">*</span> 价格：</label>
            <div class="col-md-10">
              <input class="form-control" id="price" name="price" value="{{ $logisticsProvider->price }}" type="text" placeholder="请输入价格" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="contract"><span class="text-danger">*</span> 联系人：</label>
            <div class="col-md-10">
              <input class="form-control" id="contract" name="contact" value="{{ $logisticsProvider->contact }}" type="text" placeholder="请输入联系人" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="phone"><span class="text-danger">*</span> 手机号：</label>
            <div class="col-md-10">
              <input class="form-control" id="phone" name="phone" value="{{ $logisticsProvider->phone }}" type="text" placeholder="请输入电子邮箱" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2" for="email"><span class="text-danger">*</span> 电子邮箱：</label>
            <div class="col-md-10">
              <input class="form-control" id="email" name="email" value="{{ $logisticsProvider->email }}" type="text" placeholder="请输入电子邮箱" required="">
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