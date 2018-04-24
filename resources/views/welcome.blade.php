<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 15px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .description li{
                padding-bottom: 8px;
                list-style: none;
                line-height: 1.8em;
                font-size: .95em;
            }
            .text-left{
                text-align: left;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
                @if(session('user') == null)
                    <a href="{{ url('index/login') }}">登录</a>
                @else
                    <a href="{{ url('index') }}">用户中心</a>
                    <a href="{{ url('index/logout') }}">退 出</a>
                @endif
            </div>

            <div class="content">
                <div class="title m-b-md">
                    {{ config('app.name') }}
                </div>
                <div class="description">
                    <ul>
                        <li class="text-left">- <em>QrCms</em> 是一套结合二维码等物联网技术、面向可再生资源回收的信息管理系统。</li>
                        <li>- 本系统尚在开发测试阶段，感谢您的体验。</li>
                        <li class="text-left">- <em>使用过程中如果遇到一些问题亟待解决，请联系我们的管理员</em>。</li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
