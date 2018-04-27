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
        <form action="{{ url('index/resource/storeByQrcode') }}" method="post">
          {{ csrf_field() }}
          <div class="alert alert-dismissible alert-warning">
            <p>请使用 <strong>扫码枪</strong> 等扫码设备，扫描二维码获取资源数据。以下方框内的数据请勿手动编辑！</p>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3"><span class="text-danger">*</span> 扫描到的二维码数据：</label>
            <div class="col-md-9">
               <textarea class="form-control" name="qrcode-data" id="qrcode-data" cols="60" rows="10" placeholder="请勿手动编辑这些内容"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3"></div>
            <div class="col-md-9">
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

</script>
@endsection