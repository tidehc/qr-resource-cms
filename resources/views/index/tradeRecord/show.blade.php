@extends('layouts.iframe')

@section('main')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <table class="table responsive-table">
        <tbody>
          <tr>
            <td width="30%">交易订单号：</td>
            <td>{{ $tradeRecord->order_number }}</td>
          </tr>
          <tr>
            <td>出厂编号：</td>
            <td>{{ $tradeRecord->menufactoring_number }}</td>
          </tr>
          <tr>
            <td>物品名称：</td>
            <td>{{ $tradeRecord->product_name }}</td>
          </tr>
          <tr>
            <td>物品类别：</td>
            <td>{{ $tradeRecord->category->display_name }}</td>
          </tr>
          <tr>
            <td>重量：</td>
            <td>{{ $tradeRecord->weight }}</td>
          </tr>
          <tr>
            <td>数量：</td>
            <td>{{ $tradeRecord->quantity }}</td>
          </tr>
          <tr>
            <td>价格：</td>
            <td>{{ $tradeRecord->product_price }}</td>
          </tr>
          <tr>
            <td>成交时间：</td>
            <td>{{ $tradeRecord->order_time }}</td>
          </tr>
          <tr>
            <td>毒害性：</td>
            <td>
              <div class="animated-radio-button">
                <label>
                  @if($tradeRecord->toxic)
                    <span class="badge badge-danger">有毒</span>
                  @else
                    <span class="badge badge-success">无毒</span>
                  @endif
                </label>
              </div>
            </td>
          </tr>
          <tr>
            <td>回收商：</td>
            <td>{{ $tradeRecord->recycler }}</td>
          </tr>
          <tr>
            <td>交易商：</td>
            <td>{{ $tradeRecord->trader }}</td>
          </tr>
            <td>备注</td>
            <td>{{ $tradeRecord->memo }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection