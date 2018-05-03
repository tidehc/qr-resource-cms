@extends('layouts.iframe')

@section('main')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="text-center">
        <br>
        <img id="img-qrcode" class="img-rounded" src="{{ url('admin/resource/qrCode/' . $id) }}" alt="二维码图片">
        <br><br>
        <button class="btn btn-block btn-primary" id="print" onclick="doPrint()"><i class="fa fa-print" aria-hidden="true"></i>打印二维码</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
function doPrint(){
  let body = window.document.body.innerHTML; // 预存页面
  let imgHtml = window.document.getElementById('img-qrcode').outerHTML;
  window.document.body.innerHTML = imgHtml;  // 图片html覆盖网页body的html
  window.print(); // 打印网页（现在只有图片）
  window.document.body.innerHTML = body;     // 还原页面
}
</script>
@endsection