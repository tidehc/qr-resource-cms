@extends('layouts.index')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('org/laydate/theme/default/laydate.css') }}">
@endsection

@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-plus"></i> 添加物流信息</h1>
      <p>新增一份物流信息</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="javascript:;">添加物流信息 </a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      @include('index.success')
      @include('index.errors')
      <div class="tile">
        <form action="{{ url('index/logistics') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group row">
            <label class="control-label col-md-2"><span class="text-danger">*</span> 物流单号：</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="logistics_number" placeholder="请输入物流单号" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2"><span class="text-danger">*</span> 物品名称：</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="product_name" placeholder="请输入物品名称" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2"><span class="text-danger">*</span> 物品分类：</label>
            <div class="col-md-10">
              <select class="form-control" id="category_id" name="category_id" required="">
                <option>请选择一个物品类别</option>
                @foreach($categorys as $v)
                  <option value="{{ $v->id }}">{{ $v->display_name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2"><span class="text-danger">*</span> 物流价格：</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="logistics_price" placeholder="请输入物流价格" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2"><span class="text-danger">*</span> 配送日期：</label>
            <div class="col-md-10">
              <input class="form-control" type="text" id="delivery_date" name="delivery_date" placeholder="请选择配送日期" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2"><span class="text-danger">*</span> 到达日期：</label>
            <div class="col-md-10">
              <input class="form-control" type="text" id="arrive_date" name="arrive_date" placeholder="请选择到达日期" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2"><span class="text-danger">*</span> 配送人：</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="delivery_man" placeholder="请输入配送人" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2"><span class="text-danger">*</span> 接收人：</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="receive_man" placeholder="请输入接收人" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2"><span class="text-danger">*</span> 配送人手机号：</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="delivery_phone" placeholder="请输入配送人手机号" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2"><span class="text-danger">*</span> 接收人手机号：</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="receive_phone" placeholder="请输入接收人手机号" required="">
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

@section('js')
<script type="text/javascript" src="{{ asset('org/laydate/laydate.js') }}"></script>
<script type="text/javascript">
$(function () {
  // Init laydate
  laydate.render({
    elem: '#delivery_date',
    type: 'datetime'
  });
  laydate.render({
    elem: '#arrive_date',
    type: 'datetime'
  });
})
</script>
@endsection