@extends('layouts.admin')

@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-list"></i> 废弃资源列表</h1>
      <p>查看本系统的所有废弃资源</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="javascript:;">废弃资源列表 </a></li>
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
                <th>资源类别</th>
                <th>物品名称</th>
                <th>出厂编号</th>
                <th>编号授权方</th>
                <th>回收编号</th>
                <th>毒害性</th>
                <th>毒害类别</th>
                <th>重量</th>
                <th>数量</th>
                <th>交回人</th>
                <th>回收地区</th>
                <th>回收企业</th>
                <th>回收时间</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              @foreach($resources as $v)
                <tr data-id="{{ $v->id }}">
                  <td>{{ $v->id }}</td>
                  <td>{{ $v->category->display_name or '不存在'}}</td>
                  <td>{{ $v->product_name }}</td>
                  <td>{{ $v->menufactoring_number }}</td>
                  <td>{{ $v->number_auth }}</td>
                  <td>{{ $v->recycle_number }}</td>
                  <td>
                    @if($v->toxic)
                      <span class="badge badge-danger">有毒</span>
                    @else
                      <span class="badge badge-success">无毒</span>
                    @endif
                  </td>
                  <td>{{ $v->poison_category }}</td>
                  <td>{{ $v->weight }}</td>
                  <td>{{ $v->quantity }}</td>
                  <td>{{ $v->jiao_hui_ren }}</td>
                  <td>{{ $v->recycle_area }}</td>
                  <td>{{ $v->recycle_company }}</td>
                  <td>{{ $v->recycle_time }}</td>
                  <td>
                    <div class="btn-group">
                      <a class="btn btn-sm btn-info viewQrCode" href="#"><i class="fa fa-qrcode"></i></a>
                      <a class="btn btn-sm btn-success view" href="#" title="查看"><i class="fa fa-eye"></i></a>
                      <a class="btn btn-sm btn-primary edit" href="#" title="编辑"><i class="fa fa-edit"></i></a>
                      <a class="btn btn-sm btn-danger delete" href="#" title="删除"><i class="fa fa-trash"></i></a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{ $resources->links() }}       
      </div>
    </div>
  </div>
</main>
@endsection

@section('js')
<script type="text/javascript">
var viewQrCodeUrl = "{{ url('admin/resource/showQrCode') }}";
var viewUrl = "{{ url('admin/resource') }}"
var editUrl = "{{ url('admin/resource') }}";
var deleteUrl = "{{ url('admin/resource/delete') }}";

$(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  
  // 查看二维码
  $('.viewQrCode').click(function () {
    var id = $(this).parents('tr').attr('data-id');

    layer.open({
      type: 2,
      title: '查看资源二维码',
      maxmin: true,
      shadeClose: true, //点击遮罩关闭层
      area : ['380px' , '480px'],
      content: viewQrCodeUrl + '/' + id
    });

  });

  // 查看
  $('.view').click(function () {
    var id = $(this).parents('tr').attr('data-id');

    layer.open({
      type: 2,
      title: '查看资源信息',
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
      title: '编辑资源信息',
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