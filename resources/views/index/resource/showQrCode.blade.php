@extends('layouts.iframe')

@section('main')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="text-center">
        <br>
        <img id="img-qrcode" class="img-rounded" src="{{ url('index/resource/qrCode/' . $id) }}" alt="二维码图片">
        <br><br>
        <button class="btn btn-block btn-primary" id="print" onclick="doPrint()"><i class="fa fa-print" aria-hidden="true"></i>打 印</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
function doPrint(){
  let src = document.getElementById('img-qrcode').src;
  let newWin = window.open(src, '_blank');
  newWin.onload = () => {
    newWin.print();
    newWin.close();
  }
}
</script>
@endsection