@extends('layouts.admin')

@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-list"></i> 用户列表</h1>
      <p>查看本系统的所有用户</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="javascript:;">用户列表 </a></li>
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
              <th>用户</th>
              <th>地址</th>
              <th>电子邮箱</th>
              <th>手机号</th>
              <th>废弃资源原产品生产企业</th>
              <th>销售商</th>
              <th>回收商</th>
              <th>交易商</th>
              <th>物流商</th>
              <th>拆解企业</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $v)
              <tr data-id="{{ $v->id }}">
                <td>{{ $v->id }}</td>
                <td>{{ $v->username }}</td>
                <td>{{ $v->address }}</td>
                <td>{{ $v->email }}</td>
                <td>{{ $v->phone }}</td>
                <td>{{ $v->production_enterprise }}</td>
                <td>{{ $v->seller }}</td>
                <td>{{ $v->recycler }}</td>
                <td>{{ $v->trader }}</td>
                <td>{{ $v->logistics_provider }}</td>
                <td>{{ $v->dismantling_enterprise }}</td>
                <td>
                  <div class="btn-group">
                    <a class="btn btn-success view" href="#"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-primary edit" href="#"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger delete" href="#"><i class="fa fa-trash"></i></a>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $users->links() }}       
      </div>
    </div>
  </div>
</main>
@endsection

@section('js')
<script type="text/javascript">
var viewUrl = "{{ url('admin/user') }}"
var editUrl = "{{ url('admin/user/') }}";
var deleteUrl = "{{ url('admin/user/delete') }}";

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
      title: '查看用户',
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
      title: '编辑用户',
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