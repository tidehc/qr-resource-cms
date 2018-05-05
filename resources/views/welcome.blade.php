
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>{{ config('app.name', 'Welcome') }}</title>
  <meta name="keywords" content="资源回收，二维码，内容管理系统，管理信息系统，Qr-Code，CMS，ERP" />
  <meta name="description" content="{{ config('app.name') }} 致力于为现今的资源回收行业提供一份新的线上解决方案，整合各方资源，开展信息采集、数据分析、流向监控，通过二维码等物联网技术跟踪产品及废弃物流向，完善再生资源回收体系，促使再生资源交易市场由线下向线上线下结合转型升级，减少回收环节，降低回收成本，提升再生资源的回收效率。" />
  <link rel="shortcut icon" href="{{ url('favicon.ico') }}">
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://cdn.bootcss.com/materialize/1.0.0-beta/css/materialize.min.css" rel="stylesheet">
  <link href="{{ asset('css/welcome.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">{{ config('app.name', 'Welcome') }}</a>
      <ul class="right hide-on-med-and-down">
        @if(session('user') == null)
            <li><a href="{{ url('index/login') }}">登 录</a></li>
        @else
            <li><a href="{{ url('index') }}">用户中心</a></li>
            <li><a href="{{ url('index/logout') }}">退 出</a></li>
        @endif
      </ul>

      <ul id="nav-mobile" class="sidenav">
        @if(session('user') == null)
            <li><a href="{{ url('index/login') }}">登 录</a></li>
        @else
            <li><a href="{{ url('index') }}">用户中心</a></li>
            <li><a href="{{ url('index/logout') }}">退 出</a></li>
        @endif
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">二维码资源回收系统</h1>
        <div class="row center">
          <h5 class="header col s12 light">一套结合二维码等物联网技术、面向再生资源回收的线上解决方案</h5>
        </div>
        <div class="row center">
          <a href="javascript:;" class="btn-large waves-effect waves-light teal lighten-1">快 速 开 始</a>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="{{ asset('images/background1.jpg') }}" alt="Unsplashed background img 1"></div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">flight_takeoff</i></h2>
            <h5 class="center">多方整合</h5>

            <p class="light">利用互联网、大数据建立便捷高效的再生资源回收交易服务平台，整合物流资源，梳理回收渠道，优化回收网点布局，使供需双方能够快速获得信息匹配，实现上下游企业间的智能化物流，完善再生资源回收体系。</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">timeline</i></h2>
            <h5 class="center">效益提升</h5>

            <p class="light">开展信息采集、数据分析、流向监控，通过二维码等物联网技术跟踪产品及废弃物流向，优化回收网点布局，使供需双方能够快速获得信息匹配，促使再生资源交易市场由线下向线上线下结合转型升级，减少了回收环节，降低了回收成本，提升了再生资源回收效率。</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">airplay</i></h2>
            <h5 class="center">一站管理</h5>

            <p class="light">多用户、多模块，处理回收资源广泛：空调，整厂回收，工厂设备，废旧金属、废旧塑胶等各项废旧资源。从废旧物的资源回收、信息采集、数据录入、条码管理、标签定制，到订单和物流的及时管理和数据更新，实现一条龙式的一体化细致管理。</p>
          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">我们的生态和社区正在成长，衷心欢迎您的加入</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="{{ asset('images/background2.jpg') }}" alt="Unsplashed background img 2"></div>
  </div>

  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4>了解 {{ config('app.name') }}</h4>
          <p class="left-align light">随着互联网技术的飞速发展，一些再生资源回收企业利用互联网、大数据建立便捷高效的再生资源回收交易服务平台，{{ config('app.name') }} 旨在为现今的资源回收行业提供一份新的线上解决方案，整合各方资源，开展信息采集、数据分析、流向监控，通过二维码等物联网技术跟踪产品及废弃物流向，完善再生资源回收体系，促使再生资源交易市场由线下向线上线下结合转型升级，减少回收环节，降低回收成本，提升再生资源的回收效率。</p>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">{{ config('app.name', '社区生态') }} 诚心欢迎您的加入！感谢您的支持和关注！</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="{{ asset('images/background3.jpg') }}" alt="Unsplashed background img 3"></div>
  </div>

  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">展 望</h5>
          <p class="grey-text text-lighten-4">我们的 {{ config('app.name', '社区生态') }} 还在成长中，一切都充满朝阳般的活力。我们有信心，在广大用户和支持者，以及我们的开发人员团队的共同努力下，{{ config('app.name', '社区生态') }} 将会越来越好。</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">友情链接</h5>
          <ul>
            <li><a class="white-text" href="#!">蓝河废旧资源回收企业</a></li>
            <li><a class="white-text" href="#!">北京正洋股份有限公司</a></li>
            <li><a class="white-text" href="#!">易动力信息有限公司</a></li>
            <li><a class="white-text" href="#!">MBP 软件信息有限公司</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">技术支持</h5>
          <ul>
            <li><a class="white-text" href="#!">{{ config('app.name', '社区生态') }} 开发团队</a></li>
            <li><a class="white-text" href="#!">运维团队</a></li>
            <li><a class="white-text" href="#!">测试团队</a></li>
            <li><a class="white-text" href="#!">前端 UI 团队</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      版权所有 <a class="brown-text text-lighten-3" href="#">{{ config('app.name', '社区生态') }}</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
  <script src="https://cdn.bootcss.com/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script src="{{ asset('js/welcome.js') }}"></script>

  </body>
</html>
