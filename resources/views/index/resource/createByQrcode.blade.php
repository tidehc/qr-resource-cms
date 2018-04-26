@extends('layouts.index')

@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-qrcode"></i> 扫码添加资源</h1>
      <p>新增一份废弃资源 - (请使用<em>扫码枪</em>等设备扫码)</p>
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
          <table class="table table-responsive">
            <tbody>
              <tr>
                <td colspan="2">
                  <div class="alert alert-dismissible alert-warning">
                    <p>请使用 <strong>扫码枪</strong> 等设备、扫描二维码获取资源数据，以下方框内的数据请勿手动编辑。</p>
                  </div>
                </td>
              </tr>
              <tr>
                <td><span class="text-danger">*</span> 扫描到的二维码数据：</td>
                <td>
                  <textarea class="form-control" name="qrcode-data" id="qrcode-data" cols="60" rows="10" placeholder="请勿手动编辑这些内容"></textarea>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>
                  <div class="form-group">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> 确认添加</button>&nbsp;&nbsp;&nbsp;&nbsp;
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
</main>
@endsection

@section('js')
<script type="text/javascript">

</script>
@endsection