@extends('layouts.index')

@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-list"></i> 回收商列表</h1>
      <p>查看本系统的所有回收商</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="javascript:;">回收商列表 </a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      @include('index.success')
      @include('index.errors')
      <div class="tile">
        <table class="table table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>回收商</th>
              <th>回收分类</th>
              <th>回收价格</th>
              <th>详细地址</th>
              <th>联系人</th>
              <th>手机号</th>
              <th>电子邮件</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            @foreach($recyclers as $v)
              <tr data-id="{{ $v->id }}">
                <td>{{ $v->id }}</td>
                <td>{{ $v->name }}</td>
                <td>{{ $v->category->display_name or '不存在' }}</td>
                <td>{{ $v->product_price }}</td>
                <td>{{ $v->address }}</td>
                <td>{{ $v->contact }}</td>
                <td>{{ $v->phone }}</td>
                <td>{{ $v->email }}</td>
                <td>
                  <div class="btn-group">
                    <a class="btn btn-primary edit" href="#"><i class="fa fa-edit"></i></a>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $recyclers->links() }}       
      </div>
    </div>
  </div>
</main>
@endsection

@section('js')
<script type="text/javascript">
var editUrl = "{{ url('index/recycler/') }}";

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
      title: '编辑回收商',
      maxmin: true,
      shadeClose: true, //点击遮罩关闭层
      area : ['800px' , '520px'],
      content: editUrl + '/' + id + '/edit' 
    });

  });

})
</script>
@endsection