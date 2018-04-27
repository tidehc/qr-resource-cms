@extends('layouts.iframe')

@section('main')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <table class="table responsive-table">
        <tbody>
          <tr>
            <td>用户名：</td>
            <td>{{ $user->username }}</td>
          </tr>
          <tr>
            <td>用户注册：</td>
            <td>{{ $user->logic }}</td>
          </tr>
          <tr>
            <td>地址：</td>
            <td>{{ $user->address }}</td>
          </tr>
          <tr>
            <td>电子邮箱：</td>
            <td>{{ $user->email }}</td>
          </tr>
          <tr>
            <td>手机号：</td>
            <td>{{ $user->phone }}</td>
          </tr>
          <tr>
            <td>废弃资源原产品生产企业：</td>
            <td>{{ $user->production_enterprise }}</td>
          </tr>
          <tr>
            <td>销售商：</td>
            <td>{{ $user->seller }}</td>
          </tr>
          <tr>
            <td>回收商：</td>
            <td>{{ $user->recycler }}</td>
          </tr>
          <tr>
            <td>交易商：</td>
            <td>{{ $user->trader }}</td>
          </tr>
          <tr>
            <td>物流商：</td>
            <td>{{ $user->logistics_provider }}</td>
          </tr>
          <tr>
            <td>拆解企业：</td>
            <td>{{ $user->dismantling_enterprise }}</td>
          </tr>
          <tr>
            <td>备注</td>
            <td>{{ $user->memo }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection