@extends('layouts.iframe')

@section('main')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <table class="table responsive-table">
        <tbody>
          <tr>
            <td>物流单号：</td>
            <td>{{ $logistics->logistics_number }}</td>
          </tr>
          <tr>
            <td>物品名称：</td>
            <td>{{ $logistics->product_name }}</td>
          </tr>
          <tr>
            <td>物品分类：</td>
            <td>{{ $logistics->category->display_name }}</td>
          </tr>
          <tr>
            <td>物流价格：</td>
            <td>{{ $logistics->logistics_price }}</td>
          </tr>
          <tr>
            <td>配送日期：</td>
            <td>{{ $logistics->delivery_date }}</td>
          </tr>
          <tr>
            <td>到达日期：</td>
            <td>{{ $logistics->arrive_date }}</td>
          </tr>
          <tr>
            <td>配送人：</td>
            <td>{{ $logistics->delivery_man }}</td>
          </tr>
          <tr>
            <td>接收人：</td>
            <td>{{ $logistics->receive_man }}</td>
          </tr>
          <tr>
            <td>配送人电话：</td>
            <td>{{ $logistics->delivery_phone }}</td>
          </tr>
          <tr>
            <td>接收人电话：</td>
            <td>{{ $logistics->receive_phone }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection