@extends('layouts.admin')

@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> 后台首页</h1>
      <p>{{ env('APP_NAME') }} 后台管理中心</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="javascript:;">后台首页</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
        <div class="info">
          <h4>用户数</h4>
          <p><b>6666</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
        <div class="info">
          <h4>回收资源数</h4>
          <p><b>6666</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small warning coloured-icon"><i class="icon fa fa-paypal fa-3x"></i>
        <div class="info">
          <h4>订单数</h4>
          <p><b>10</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small danger coloured-icon"><i class="icon fa fa-truck fa-3x"></i>
        <div class="info">
          <h4>物流数</h4>
          <p><b>500</b></p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">欢迎您</h3>
        <ul>
          <li>
            <p><em>{{ config('app.name') }}</em> 是结合二维码等物联网技术、面向可再生资源回收的信息管理系统。</p>
          </li>
          <li>
            <p>本系统旨在解决当下可再生资源回收的效率偏低问题，通过计算机、物联网技术，提供一套新型的可再生资源回收的解决方案。</p>
          </li>
          <li>
            <p><em>在使用过程中，如果您遇到某些问题亟待解决，请联系我们的管理员。<i class="icon fa fa-hand-o-left fa-2x"></i></em></p>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">系统环境</h3>
        <table class="table">
          <tr>
            <td>服务器：</td>
            <td>{{ $_SERVER['SERVER_SOFTWARE'] }}</td>
          </tr>
          <tr>
            <td>操作系统：</td>
            <td>{{ php_uname() }}</td>
          </tr>
          <tr>
            <td>PHP 版本：</td>
            <td>{{ phpversion() }}</td>
          </tr>
          <tr>
            <td>当前主机 IP：</td>
            <td>{{ GetHostByName($_SERVER['SERVER_NAME']) }}</td>
          </tr>
          <tr>
            <td>当前主机域名：</td>
            <td>{{ $_SERVER['SERVER_NAME'] }}</td>
          </tr>
          <tr>
            <td>客户端 IP：</td>
            <td>{{ $_SERVER['REMOTE_ADDR'] }}</td>
          </tr>
          <tr>
            <td>客户端浏览器：</td>
            <td>{{ $_SERVER['HTTP_USER_AGENT'] }}</td>
          </tr>
          <tr>
            <td>系统时区：</td>
            <td>{{ config('app.timezone') }}</td>
          </tr>
        </table>
        
      </div>
    </div>
  </div>
</main>
@endsection