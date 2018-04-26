@extends('layouts.index')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('org/laydate/theme/default/laydate.css') }}">
@endsection

@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-plus"></i>添加交易记录</h1>
      <p>新增一份交易记录</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="javascript:;">添加交易记录 </a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      @include('index.success')
      @include('index.errors')
      <div class="tile">
        <form action="{{ url('index/tradeRecord') }}" method="post">
          {{ csrf_field() }}
          <table class="table responsive-table">
            <tbody>
              <tr>
                <td width="15%"><span class="text-danger">*</span> 交易订单号：</td>
                <td>
                  <input class="form-control" type="text" name="order_number" placeholder="请输入交易订单号" required="">
                </td>
              </tr>
              <tr>
                <td><span class="text-danger">*</span> 出厂编号：</td>
                <td>
                  <input class="form-control" type="text" name="menufactoring_number" placeholder="请输入出厂编号" required="">
                </td>
              </tr>
              <tr>
                <td><span class="text-danger">*</span> 物品名称：</td>
                <td>
                  <input class="form-control" type="text" name="product_name" placeholder="请输入物品名称" required="">
                </td>
              </tr>
              <tr>
                <td><span class="text-danger">*</span> 物品类别：</td>
                <td>
                  <select class="form-control" id="category_id" name="category_id" required="">
                    <option>请选择一个物品类别</option>
                    @foreach($categorys as $v)
                      <option value="{{ $v->id }}">{{ $v->display_name }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <td><span class="text-danger">*</span> 重量：</td>
                <td>
                  <input class="form-control" type="text" name="weight" placeholder="请输入重量（单位：kg）" required="">
                </td>
              </tr>
              <tr>
                <td><span class="text-danger">*</span> 数量：</td>
                <td>
                  <input class="form-control" type="text" name="quantity" placeholder="请输入数量" required="">
                </td>
              </tr>
              <tr>
                <td><span class="text-danger">*</span> 价格：</td>
                <td>
                  <input class="form-control" type="text" name="product_price" placeholder="请输入价格" required="">
                </td>
              </tr>
              <tr>
                <td><span class="text-danger">*</span> 成交时间：</td>
                <td>
                  <input class="form-control" type="text" id="order_time" name="order_time" placeholder="请选择成交时间" required="">
                </td>
              </tr>
              <tr>
                <td><span class="text-danger">*</span> 毒害性：</td>
                <td>
                  <div class="animated-radio-button">
                    <label>
                      <input type="radio" name="toxic" value="0" checked=""><span class="label-text">无毒</span>
                    </label>
                    <label>&nbsp;&nbsp;
                      <input type="radio" name="toxic" value="1"><span class="label-text">有毒</span>
                    </label>
                  </div>
                </td>
              </tr>
              <tr>
                <td><span class="text-danger">*</span> 回收商：</td>
                <td>
                  <input class="form-control" type="text" name="recycler" placeholder="请输入回收商" required="">
                </td>
              </tr>
              <tr>
                <td><span class="text-danger">*</span> 交易商：</td>
                <td>
                  <input class="form-control" type="text" name="trader" placeholder="请输入交易商" required="">
                </td>
                </td>
              </tr>
                <td>备注</td>
                <td>
                  <textarea class="form-control" name="memo" placeholder="请输入备注（选填）"></textarea>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>
                  <div class="form-group">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> 确认添加</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-secondary" type="reset"><i class="fa fa-fw fa-lg fa-repeat"></i> 重 置</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
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
    elem: '#order_time'
    ,type: 'datetime'
  });
})
</script>
@endsection