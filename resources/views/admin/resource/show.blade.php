@extends('layouts.iframe')

@section('main')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <table class="table responsive-table">
        <tbody>
          <tr>
            <td class="30%">资源类别：</td>
            <td>{{ $resource->category->display_name }}</td>
          </tr>
          <tr>
            <td>物品名称：</td>
            <td>{{ $resource->product_name }}</td>
          </tr>
          <tr>
            <td>出厂编号：</td>
            <td>{{ $resource->menufactoring_number }}</td>
          </tr>
          <tr>
            <td>编号授权方：</td>
            <td>{{ $resource->number_auth }}</td>
          </tr>
          <tr>
            <td>回收编号：</td>
            <td>{{ $resource->recycle_number }}</td>
          </tr>
          <tr>
            <td>毒害性：</td>
            <td>
              <div class="animated-radio-button">
                <label>
                  @if($resource->toxic)
                    <span class="badge badge-danger">有毒</span>
                  @else
                    <span class="badge badge-success">无毒</span>
                  @endif
                </label>
              </div>
            </td>
          </tr>
          <tr>
            <td>毒害类别：</td>
            <td>{{ $resource->poison_category }}</td>
          </tr>
          <tr>
            <td>重量：</td>
            <td>{{ $resource->weight }}</td>
          </tr>
          <tr>
            <td>数量：</td>
            <td>{{ $resource->quantity }}</td>
          </tr>
          <tr>
            <td>交回人：</td>
            <td>{{ $resource->jiao_hui_ren }}</td>
          </tr>
          <tr>
            <td>回收地区：</td>
            <td>{{ $resource->recycle_area }}</td>
          </tr>
          <tr>
            <td>回收企业：</td>
            <td>{{ $resource->recycle_company }}</td>
          </tr>
          <tr>
            <td>回收时间：</td>
            <td>{{ $resource->recycle_time }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection