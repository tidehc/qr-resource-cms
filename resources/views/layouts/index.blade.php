
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title', '用户中心')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="资源回收，二维码，内容管理系统，管理信息系统，Qr-Code，CMS，ERP" />
    <meta name="description" content="{{ config('app.name') }} 致力于为现今的资源回收行业提供一份新的线上解决方案，整合各方资源，开展信息采集、数据分析、流向监控，通过二维码等物联网技术跟踪产品及废弃物流向，完善再生资源回收体系，促使再生资源交易市场由线下向线上线下结合转型升级，减少回收环节，降低回收成本，提升再生资源的回收效率。" />
    <link rel="shortcut icon" href="{{ url('favicon.ico') }}">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('org/layer/theme/default/layer.css') }}">
    @yield('css')
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="{{ url('index') }}">{{ env('APP_NAME') }}</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="{{ url('index/profile') }}"><i class="fa fa-user fa-lg"></i> 个人信息</a></li>
            <li><a class="dropdown-item" href="{{ url('index/logout') }}"><i class="fa fa-sign-out fa-lg"></i> 退出</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{ asset('images/default-avatar.png') }}" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">欢迎您，{{ session('user')->username }}</p>
          <p class="app-sidebar__user-designation">{{ session('user')->memo }}</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="{{ url('index') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">用户中心</span></a></li>
        <li class="treeview
          @if(Request::is('index/resource*'))is-expanded @endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">废弃资源管理</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item
              @if(Request::is('index/resource'))active @endif" href="{{ url('index/resource') }}"><i class="icon fa fa-list"></i> 所有资源列表</a></li>
            <li><a class="treeview-item
              @if(Request::is('index/resource/create'))active @endif" href="{{ url('index/resource/create') }}"><i class="icon fa fa-plus"></i> 表单添加资源</a></li>
            <li><a class="treeview-item
              @if(Request::is('index/resource/createByQrCode'))active @endif" href="{{ url('index/resource/createByQrCode') }}"><i class="icon fa fa-qrcode"></i> 扫码添加资源</a></li>
          </ul>
        </li>
        <li class="treeview
          @if(Request::is('index/category*'))is-expanded @endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-bookmark-o"></i><span class="app-menu__label">资源分类管理</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item
              @if(Request::is('index/category'))active @endif" href="{{ url('index/category') }}">
              <i class="icon fa fa-list"></i> 分类列表</a></li>
            <li><a class="treeview-item
              @if(Request::is('index/category/create'))active @endif" href="{{ url('index/category/create') }}">
              <i class="icon fa fa-plus"></i> 添加分类</a></li>
          </ul>
        </li>
        <li class="treeview
          @if(Request::is('index/tradeRecord*'))is-expanded @endif""><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-paypal"></i><span class="app-menu__label">交易记录管理</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item
              @if(Request::is('index/tradeRecord'))active @endif" href="{{ url('index/tradeRecord') }}"><i class="icon fa fa-list"></i> 交易记录列表</a></li>
            <li><a class="treeview-item
              @if(Request::is('index/tradeRecord/create'))active @endif" href="{{ url('index/tradeRecord/create') }}"><i class="icon fa fa-plus"></i> 添加交易记录</a></li>
          </ul>
        </li>
        <li class="treeview
          @if(Request::is('index/logistics*'))is-expanded @endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-globe"></i><span class="app-menu__label">物流信息管理</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item
              @if(Request::is('index/logistics'))active @endif" href="{{ url('index/logistics') }}"><i class="icon fa fa-list"></i> 物流信息列表</a></li>
            <li><a class="treeview-item
              @if(Request::is('index/logistics/create'))active @endif" href="{{ url('index/logistics/create') }}"><i class="icon fa fa-plus"></i> 添加物流信息</a></li>
          </ul>
        </li>
        <li class="treeview
          @if(Request::is('index/recycler*'))is-expanded @endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-large"></i><span class="app-menu__label">回收商</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item
              @if(Request::is('index/recycler'))active @endif" href="{{ url('index/recycler') }}">
             <i class="icon fa fa-list"></i> 回收商列表</a></li>
            <li><a class="treeview-item
              @if(Request::is('index/recycler/create'))active @endif" href="{{ url('index/recycler/create') }}">
              <i class="icon fa fa-plus"></i> 添加回收商</a></li>
          </ul>
        </li>
        <li class="treeview
          @if(Request::is('index/logisticsProvider*'))is-expanded @endif""><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-truck"></i><span class="app-menu__label">物流商</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item
              @if(Request::is('index/logisticsProvider'))active @endif" href="{{ url('index/logisticsProvider') }}"><i class="icon fa fa-list"></i> 物流商列表</a></li>
            <li><a class="treeview-item
              @if(Request::is('index/logisticsProvider/create'))active @endif" href="{{ url('index/logisticsProvider/create') }}">
              <i class="icon fa fa-plus"></i> 添加物流商</a></li>
          </ul>
        </li>
      </ul>
    </aside>
    @yield('main')
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('js/plugins/pace.min.js') }}"></script>
    <!-- Page specific javascripts-->
    <script src="https://cdn.bootcss.com/limonte-sweetalert2/7.18.0/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="{{ asset('org/layer/layer.js') }}"></script>
    @yield('js')
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
      }
    </script>
  </body>
</html>