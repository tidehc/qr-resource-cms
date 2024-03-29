@extends('layouts.iframe')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('org/laydate/theme/default/laydate.css') }}">
@endsection

@section('main')
  <div class="row">
    <div class="col-md-12">
      @include('index.success')
      @include('index.errors')
      <div class="tile">
        <form action="{{ url('index/logistics/' . $logistics->id) }}" method="post">
          {{ csrf_field() }}
          {{ method_field('put')}}
          <div class="form-group row">
            <label class="control-label col-md-3"><span class="text-danger">*</span> 物流单号：</label>
            <div class="col-md-9">
              <input class="form-control" type="text" name="logistics_number" value="{{ $logistics->logistics_number }}" placeholder="请输入物流单号" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3"><span class="text-danger">*</span> 物品名称：</label>
            <div class="col-md-9">
              <input class="form-control" type="text" name="product_name" value="{{ $logistics->product_name }}" placeholder="请输入物品名称" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3"><span class="text-danger">*</span> 物品分类：</label>
            <div class="col-md-9">
              <select class="form-control" id="category_id" name="category_id" required="">
                <option>请选择一个物品类别</option>
                @foreach($categorys as $v)
                  <option value="{{ $v->id }}" @if($logistics->category && $v->id == $logistics->category->id)selected @endif>{{ $v->display_name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3"><span class="text-danger">*</span> 物流价格：</label>
            <div class="col-md-9">
              <input class="form-control" type="text" name="logistics_price" value="{{ $logistics->logistics_price }}" placeholder="请输入物流价格" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3"><span class="text-danger">*</span> 配送日期：</label>
            <div class="col-md-9">
              <input class="form-control" type="text" id="delivery_date" name="delivery_date" value="{{ $logistics->delivery_date }}" placeholder="请选择配送日期" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3"><span class="text-danger">*</span> 到达日期：</label>
            <div class="col-md-9">
              <input class="form-control" type="text" id="arrive_date" name="arrive_date" value="{{ $logistics->arrive_date }}" placeholder="请选择到达日期" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3"><span class="text-danger">*</span> 配送人：</label>
            <div class="col-md-9">
              <input class="form-control" type="text" name="delivery_man" value="{{ $logistics->delivery_man }}" placeholder="请输入配送人" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3"><span class="text-danger">*</span> 接收人：</label>
            <div class="col-md-9">
              <input class="form-control" type="text" name="receive_man" value="{{ $logistics->receive_man }}" placeholder="请输入接收人" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3"><span class="text-danger">*</span> 配送人手机号：</label>
            <div class="col-md-9">
              <input class="form-control" type="text" name="delivery_phone" value="{{ $logistics->delivery_phone }}" placeholder="请输入配送人手机号" required="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3"><span class="text-danger">*</span> 接收人手机号：</label>
            <div class="col-md-9">
              <input class="form-control" type="text" name="receive_phone" value="{{ $logistics->receive_phone }}" placeholder="请输入接收人手机号" required="">
            </div>
          </div>
         <div class="form-group row">
            <div class="col-md-3"></div>
            <div class="col-md-9">
             <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> 确认修改</button>&nbsp;&nbsp;&nbsp;&nbsp;
             <button class="btn btn-secondary" type="reset"><i class="fa fa-fw fa-lg fa-repeat"></i> 重 置</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
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