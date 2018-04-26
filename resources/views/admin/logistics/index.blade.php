@extends('layouts.admin')

@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-list"></i> 物流信息列表</h1>
      <p>查看本系统的所有物流信息</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="javascript:;">物流信息列表 </a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      @include('admin.success')
      @include('admin.errors')
      <div class="tile">
        <table class="table table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>物流单号</th>
              <th>物品名称</th>
              <th>物品分类</th>
              <th>物流价格</th>
              <th>配送日期</th>
              <th>到达日期</th>
              <th>配送人</th>
              <th>接收人</th>
              <th>配送人手机号</th>
              <th>接收人手机号</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            @foreach($logistics as $v)
              <tr data-id="{{ $v->id }}">
                <td>{{ $v->id }}</td>
                <td>{{ $v->logistics_number }}</td>
                <td>{{ $v->product_name }}</td>
                <td>{{ $v->category->display_name }}</td>
                <td>{{ $v->logistics_price }}</td>
                <td>{{ $v->delivery_date }}</td>
                <td>{{ $v->arrive_date }}</td>
                <td>{{ $v->delivery_man }}</td>
                <td>{{ $v->receive_man }}</td>
                <td>{{ $v->delivery_phone }}</td>
                <td>{{ $v->receive_phone }}</td>
                <td>
                  <div class="btn-group">
                    <a class="btn btn-sm btn-success view" href="#"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-sm btn-primary edit" href="#"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger delete" href="#"><i class="fa fa-trash"></i></a>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $logistics->links() }}       
      </div>
    </div>
  </div>
</main>
@endsection

@section('js')
<script type="text/javascript">
var viewUrl = "{{ url('admin/logistics') }}"
var editUrl = "{{ url('admin/logistics/') }}";
var deleteUrl = "{{ url('admin/logistics/delete') }}";

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
      title: '查看物流信息',
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
      title: '编辑物流信息',
      maxmin: true,
      shadeClose: true, //点击遮罩关闭层
      area : ['800px' , '520px'],
      content: editUrl + '/' + id + '/edit' 
    });

  });

  // 删除
  $('.delete').click(function () {
    var id = $(this).parents('tr').attr('data-id');

    swal({ 
      title: '确定删除吗？', 
      text: '你将无法恢复它！', 
      type: 'warning',
      showCancelButton: true, 
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: '确定删除！', 
    }).then(function(result){
      if (result.value){
        $.post(deleteUrl, {id: id}, function (data) {
          if (!data.code) {
            swal('删除!', data.msg, 'success');
            window.location.reload();
          } else {
            swal('删除!', data.msg, 'error');
          }
        });
      }
    })

  });
})
</script>
@endsection