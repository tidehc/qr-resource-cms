@extends('layouts.index')

@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> 用户中心</h1>
      <p>{{ env('APP_NAME') }} 前台用户中心</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="javascript:;">用户中心</a></li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-8">
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
            <td>主机 IP：</td>
            <td>{{ GetHostByName($_SERVER['SERVER_NAME']) }}</td>
          </tr>
          <tr>
            <td>主机域名：</td>
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
    <div class="col-md-4">
      <div class="tile">
        <h3 class="tile-title">欢迎您</h3>
        <p>
          本系统 <em>({{ config('app.name') }})</em> 旨在解决当下可再生资源回收的效率偏低问题，通过物联网技术，提供一套现代化的可再生资源回收信息管理系统。
        </p>
        <p>
          系统采用 <em>LAMP</em> 环境搭建，用著名的 <em>PHP</em> 开发框架 <em>Laravel</em> 设计完成。
          尚在开发阶段，感谢您的初次体验。
        </p>
        <p>
          <em>如果遇到某些问题亟待解决，请联系我们的管理员。<i class="icon fa fa-hand-o-left fa-2x"></i></em>
        </p>
      </div>
    </div>
  </div>
</main>
@endsection