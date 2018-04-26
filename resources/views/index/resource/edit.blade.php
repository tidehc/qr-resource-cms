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
        <form action="{{ url('index/resource/'. $resource->id) }}" method="post">
          {{ csrf_field() }}
          {{ method_field('put')}}
          <table class="table responsive-table">
            <tbody>
              <tr>
                <td width="15%"><span class="text-danger">*</span> 资源类别：</td>
                <td>
                  <select class="form-control" id="category_id" name="category_id">
                    <option>请选择一个资源类别</option>
                    @foreach($categorys as $v)
                      <option value="{{ $v->id }}"
                        @if($v->id == $resource->category->id) selected @endif
                        >{{ $v->display_name }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <td><span class="text-danger">*</span> 物品名称：</td>
                <td>
                  <input class="form-control" id="product_name" name="product_name" value="{{ $resource->product_name }}" type="text" placeholder="请输入物品名称" required="">
                </td>
              </tr>
              <tr>
                <td><span class="text-danger">*</span> 出厂编号：</td>
                <td>
                  <input class="form-control" id="menufactoring_number" name="menufactoring_number" value="{{ $resource->menufactoring_number }}" type="text" placeholder="请输入出厂编号" required="">
                </td>
              </tr>
              <tr>
                <td><span class="text-danger">*</span> 编号授权方：</td>
                <td>
                  <input class="form-control" id="number_auth" name="number_auth" value="{{ $resource->number_auth }}" type="text" placeholder="请输入编号授权方" required="">
                </td>
              </tr>
              <tr>
                <td><span class="text-danger">*</span> 回收编号：</td>
                <td>
                  <input class="form-control" id="recycle_number" name="recycle_number" value="{{ $resource->recycle_number }}" type="text" placeholder="请输入回收编号" required="">
                </td>
              </tr>
              <tr>
                <td><span class="text-danger">*</span> 毒害性：</td>
                <td>
                  <div class="animated-radio-button">
                    <label>
                      <input type="radio" name="toxic" value="0" @if(!$resource->toxic)checked="" @endif><span class="label-text">无毒</span>
                    </label>
                    <label>&nbsp;&nbsp;
                      <input type="radio" name="toxic" value="1" @if($resource->toxic)checked="" @endif><span class="label-text">有毒</span>
                    </label>
                  </div>
                </td>
              </tr>
              <tr>
                <td><span class="text-danger">*</span> 毒害类别：</td>
                <td>
                  <input class="form-control" id="poison_category" name="poison_category" value="{{ $resource->poison_category }}" type="text" placeholder="请输入毒害类别" required="">
                </td>
              </tr>
              <tr>
                <td><span class="text-danger">*</span> 重量：</td>
                <td>
                  <input class="form-control" id="weight" name="weight" value="{{ $resource->weight }}" type="text" placeholder="请输入重量（单位：kg）" required="">
                </td>
              </tr>
              <tr>
                <td><span class="text-danger">*</span> 数量：</td>
                <td>
                  <input class="form-control" id="quantity" name="quantity" value="{{ $resource->quantity }}" type="text" placeholder="请输入数量" required="">
                </td>
              </tr>
              <tr>
                <td><span class="text-danger">*</span> 交回人：</td>
                <td>
                  <input class="form-control" id="jiao_hui_ren" name="jiao_hui_ren" value="{{ $resource->jiao_hui_ren }}" type="text" placeholder="请输入交回人" required="">
                </td>
              </tr>
              <tr>
                <td><span class="text-danger">*</span> 回收地区：</td>
                <td>
                  <input class="form-control" id="recycle_area" name="recycle_area" value="{{ $resource->recycle_area }}" type="text" placeholder="请输入回收地区" required="">
                </td>
              </tr>
              <tr>
                <td><span class="text-danger">*</span> 回收企业：</td>
                <td>
                  <input class="form-control" id="recycle_company" name="recycle_company" value="{{ $resource->recycle_company }}" type="text" placeholder="请输入回收企业" required="">
                </td>
              </tr>
              <tr>
                <td>回收时间：</td>
                <td>
                  <input class="form-control" value="{{ $resource->recycle_time }}" type="text" id="recycle_time" name="recycle_time" placeholder="请选择回收时间" required="">
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>
                  <div class="form-group">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> 确认修改</button>&nbsp;&nbsp;&nbsp;&nbsp;
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
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('org/laydate/laydate.js') }}"></script>
<script type="text/javascript">
$(function () {
  // Pretty radio cascading action
  $(":radio[name=toxic]").change(function () {
    let $poison_category = $('input[name="poison_category"]');

    if ($(this).val() == '0') {
      $poison_category.val('无');
    } else {
      $poison_category.val('');
    }
  });

  // Init laydate
  laydate.render({
    elem: '#recycle_time'
    ,type: 'datetime'
  });
})
</script>
@endsection