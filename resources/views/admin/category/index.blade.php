@extends('layouts.admin')

@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-list"></i> 分类列表</h1>
      <p>查看本系统的所有资源类别</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="javascript:;">分类列表 </a></li>
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
              <th>分类名</th>
              <th>显示名称</th>
              <th>描述</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categorys as $v)
              <tr data-id="{{ $v->id }}">
                <td>{{ $v->id }}</td>
                <td>{{ $v->name }}</td>
                <td>{{ $v->display_name }}</td>
                <td>{{ $v->description }}</td>
                <td>
                  <div class="btn-group">
                    <a class="btn btn-primary edit" href="#" title="编辑"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger delete" href="#" title="删除"><i class="fa fa-trash"></i></a>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $categorys->links() }}       
      </div>
    </div>
  </div>
</main>
@endsection

@section('js')
<script type="text/javascript">
var deleteUrl = "{{ url('admin/category/delete') }}";
var editUrl = "{{ url('admin/category/') }}";

$(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  
  // 编辑
  $('.edit').click(function () {
    var id = $(this).parents('tr').attr('data-id');

    layer.open({
      type: 2,
      title: '编辑分类',
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