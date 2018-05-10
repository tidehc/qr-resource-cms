@extends('layouts.admin')

@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-list"></i> 管理员列表</h1>
      <p>查看本系统的所有管理员</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <!-- <li class="breadcrumb-item"></li> -->
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="javascript:;">管理员列表 </a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      @include('admin.success')
      @include('admin.errors')
      <div class="tile">
        <div class="tile-title-w-btn row">
          <div class="col-md-12">
            <button class="pull-right btn btn-sm btn-danger create" type="button"><i class="fa fa-plus"></i>添加管理员</button>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-sm table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>管理员</th>
                <th>手机号</th>
                <th>备注</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              @foreach($admins as $v)
                <tr data-id="{{ $v->id }}">
                  <td>{{ $v->id }}</td>
                  <td>{{ $v->username }}</td>
                  <td>{{ $v->phone }}</td>
                  <td>{{ $v->memo }}</td>
                  <td>
                    <div class="btn-group">
                      <a class="btn btn-info view" href="#" title="查看"><i class="fa fa-eye"></i></a>
                      @if($v->username !== 'admin')
                        <a class="btn btn-primary edit" href="#" title="编辑"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger delete" href="#" title="删除"><i class="fa fa-trash"></i></a>
                      @endif
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{ $admins->links() }}       
      </div>
    </div>
  </div>
</main>
@endsection

@section('js')
<script type="text/javascript">
var createUrl = "{{ url('admin/entrust/admin/create') }}";
var viewUrl = "{{ url('admin/entrust/admin') }}"
var editUrl = "{{ url('admin/entrust/admin') }}";
var deleteUrl = "{{ url('admin/entrust/admin/delete') }}";

$(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  
  // 添加
  $('.create').click(function () {
    layer.open({
      type: 2,
      title: '添加管理员',
      maxmin: true,
      shadeClose: true, //点击遮罩关闭层
      area : ['800px' , '520px'],
      content: createUrl 
    });
  });

  // 查看
  $('.view').click(function () {
    var id = $(this).parents('tr').attr('data-id');

    layer.open({
      type: 2,
      title: '查看管理员',
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
      title: '编辑管理员',
      maxmin: true,
      shadeClose: true, //点击遮罩关闭层
      area : ['800px' , '520px'],
      content: editUrl + '/' + id + '/edit' 
    });

  });

  // 删除
  $('.delete').click(function () {
    var $this = $(this);
    var id = $this.parents('tr').attr('data-id');

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
            $this.parents('tr').remove();
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