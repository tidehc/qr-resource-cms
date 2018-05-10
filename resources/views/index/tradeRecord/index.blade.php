@extends('layouts.index')

@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-list"></i> 交易记录列表</h1>
      <p>查看本系统的所有交易记录</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="javascript:;">交易记录列表 </a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      @include('index.success')
      @include('index.errors')
      <div class="tile">
        <div class="table-responsive">
          <table class="table table-sm table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th class="order_number">交易订单号</th>
                <th>物品名称</th>
                <th>物品类别</th>
                <th>重量（kg）</th>
                <th>数量</th>
                <th>价格</th>
                <th>成交时间</th>
                <th>毒害性</th>
                <th>交易商</th>
                <th>回收商</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tradeRecords as $v)
                <tr data-id="{{ $v->id }}">
                  <td>{{ $v->id }}</td>
                  <td>{{ $v->menufactoring_number }}</td>
                  <td>{{ $v->product_name }}</td>
                  <td>{{ $v->category->display_name or '不存在'}}</td>
                  <td>{{ $v->weight }}</td>
                  <td>{{ $v->quantity }}</td>
                  <td>{{ $v->product_price }}</td>
                  <td>{{ $v->order_time }}</td>
                  <td>
                    @if($v->toxic)
                      <span class="badge badge-danger">有毒</span>
                    @else
                      <span class="badge badge-success">无毒</span>
                    @endif
                  </td>
                  <td>{{ $v->trader }}</td>
                  <td>{{ $v->recycler }}</td>
                  <td>
                    <div class="btn-group">
                      <a class="btn btn-sm btn-success view" href="#" title="查看"><i class="fa fa-eye"></i></a>
                      <a class="btn btn-sm btn-primary edit" href="#" title="编辑"><i class="fa fa-edit"></i></a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{ $tradeRecords->links() }}       
      </div>
    </div>
  </div>
</main>
@endsection

@section('js')
<script type="text/javascript">
var viewUrl = "{{ url('index/tradeRecord') }}"
var editUrl = "{{ url('index/tradeRecord/') }}";

$(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  
  // 查看
  $('.view').click(function () {
    var id = $(this).parents('tr').attr('data-id');

    layer.open({
      type: 2,
      title: '查看交易记录',
      maxmin: true,
      shadeClose: true, //点击遮罩关闭层
      area : ['800px' , '520px'],
      content: viewUrl + '/' + id
    });

  });

  // 编辑
  $('.edit').click(function () {
    var id = $(this).parents('tr').attr('data-id');

    layer.open({
      type: 2,
      title: '编辑交易记录',
      maxmin: true,
      shadeClose: true, //点击遮罩关闭层
      area : ['800px' , '520px'],
      content: editUrl + '/' + id + '/edit' 
    });

  });

})
</script>
@endsection