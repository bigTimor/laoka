<!DOCTYPE html>
<html>
<head>
    <title>ROCO劳卡衣柜</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/css/icons.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/css/main.css') }}"  />
    <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/css/lists.css') }}"  />
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/bootstrap.min.css') }}"  />
    <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/css/appframework.css') }}"  />
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/index_ipad.css') }}"  />
    <link rel="stylesheet" type="text/css" href="{{ asset('layui/build/css/layui.css') }}"  />
    <!--必要样式-->
    <link id="skin" rel="stylesheet" type="text/css" media="screen" href="{{ asset('Css/style.css') }}" />

    <!--
        <link href="{{ asset('Css/jq22.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('dist/fonts/dropify.eot') }}"  />
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/fonts/dropify.svg') }}"  />
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/fonts/dropify.ttf') }}"  />
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/fonts/dropify.woff') }}"  />
    <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/plugins/css/af.actionsheet.css') }}"  />
    <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/plugins/css/af.popup.css') }}"  />
    <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/plugins/css/af.scroller.css') }}"  />
    <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/plugins/css/af.selectBox.css') }}"  />
    -->
    @yield('css')
    <style>
        @font-face {
            font-family: 'MyNewFont';   /*字体名称*/
            src: url("{{ asset('dist/fonts/GBK.TTF') }}");       /*字体源文件*/
        }
        *{
            font-family: MyNewFont;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('lf/css/init.css') }}">
    <link rel="stylesheet" href="{{ asset('lf/css/styles.css') }}">
    <script src="{{ asset('lf/js/jquery-1.10.2.js') }}"></script>
    <script src="{{ asset('lf/js/objs.js') }}"></script>
    <script src="{{ asset('lf/js/main.js') }}"></script>
    <script src="{{ asset('lf/js/lf.js') }}"></script>
    <script src="{{ asset('lf/js/lf_wall.js') }}"></script>
    <script src="{{ asset('lf/js/lf_door.js') }}"></script>
    <script src="{{ asset('lf/js/lf_furnit.js') }}"></script>
    <script src="{{ asset('lf/js/ssl.js') }}"></script>
    <script src="{{ asset('lf/js/ssl_line.js') }}"></script>
    <script src="{{ asset('lf/js/ssl_text.js') }}"></script>


    <script type="text/javascript" src="{{ asset('/Jqmobi/jq.appframework.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/ui/appframework.ui.js') }}"></script>
    <!-- include af.desktopBrowsers.js on desktop browsers only -->
    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.css3animate.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.scroller.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.touchLayer.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.slidemenu.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.touchEvents.js') }}"></script>

    <!--
    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.actionsheet.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.passwordBox.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.selectBox.js') }}"></script>

    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.popup.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/ui/transitions/fade.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/ui/transitions/flip.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/ui/transitions/pop.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/ui/transitions/slide.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/ui/transitions/slideDown.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/ui/transitions/slideUp.js') }}"></script>
    -->

</head>
<body>
<div id="afui" class="">
    @yield('header')
    @yield('content')
    @yield('footer')
</div>
</body>
<script type="text/javascript" src="{{ asset('/Js/jquery.cookie.js') }}"></script>

<script type="text/javascript" src="{{ asset('Js/jquery.divas-1.0.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('/layer/layer.js') }}"></script>
@yield('js')
</html>