@extends('layouts.iframe')

@section('main')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <table class="table responsive-table">
        <tbody>
          <tr>
            <th>用户名：</th>
            <td>{{ $user->username }}</td>
          </tr>
          <tr>
            <th>用户注册：</th>
            <td>{{ $user->logic }}</td>
          </tr>
          <tr>
            <th>地址：</th>
            <td>{{ $user->address }}</td>
          </tr>
          <tr>
            <th>电子邮箱：</th>
            <td>{{ $user->email }}</td>
          </tr>
          <tr>
            <th>手机号：</th>
            <td>{{ $user->phone }}</td>
          </tr>
          <tr>
            <th>废弃资源原产品生产企业：</th>
            <td>{{ $user->production_enterprise }}</td>
          </tr>
          <tr>
            <th>销售商：</th>
            <td>{{ $user->seller }}</td>
          </tr>
          <tr>
            <th>回收商：</th>
            <td>{{ $user->recycler }}</td>
          </tr>
          <tr>
            <th>交易商：</th>
            <td>{{ $user->trader }}</td>
          </tr>
          <tr>
            <th>物流商：</th>
            <td>{{ $user->logistics_provider }}</td>
          </tr>
          <tr>
            <th>拆解企业：</th>
            <td>{{ $user->dismantling_enterprise }}</td>
          </tr>
          <tr>
            <th>备注</th>
            <td>{{ $user->memo }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection