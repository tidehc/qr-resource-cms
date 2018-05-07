@extends('layouts.index')

@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-qrcode"></i> 扫码添加资源</h1>
      <p>新增一份废弃资源</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="javascript:;">扫码添加资源 </a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      @include('index.success')
      @include('index.errors')
      <div class="tile">
        <form id="form-resource-create" action="{{ url('index/resource/storeByQrcode') }}" method="post">
          {{ csrf_field() }}
          <div class="alert alert-dismissible alert-warning">
            <p>请保持光标留在下面的文本框内，然后使用 <strong>扫码枪</strong> 等设备扫描二维码，即可提交数据。<em>请勿手动编辑下面方框里的数据！</em></p>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-2"><span class="text-danger">*</span> 扫描到的数据：</label>
            <div class="col-md-10">
               <textarea class="form-control" name="qrcode-data" id="qrcode-data" cols="60" rows="10" placeholder="保持光标留在这里，请勿手动编辑" required="" autofocus=""></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> 确认添加</button>&nbsp;&nbsp;&nbsp;&nbsp;
              <button class="btn btn-secondary" type="reset"><i class="fa fa-fw fa-lg fa-repeat"></i> 重 置</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
@endsection

@section('js')
<script type="text/javascript">
  $('#qrcode-data').keyup(function () {
    let data = $(this).val();
    console.log(data);
  });
  $('#form-resource-create').on('submit', function () {
    swal({
        title: '该功能暂未开放',
        text: '2秒后自动关闭',
        timer: 2000
    }).then(
        function () {},
        // handling the promise rejection
        function (dismiss) {
            if (dismiss === 'timer') {
                console.log('I was closed by the timer')
            }
        }
    );
    return false;
  });
</script>
@endsection