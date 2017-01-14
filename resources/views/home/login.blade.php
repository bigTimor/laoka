<!DOCTYPE html>
<!--HTML5 doctype-->
<html>
<head>
    <title>ROCO劳卡衣柜</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{ asset('Css/bootstrap.min.css') }}">
    <style>
        body{
            overflow:hidden;
        }
        @font-face {
            font-family: 'MyNewFont';   /*字体名称*/
            src: url("{{ asset('dist/fonts/GBK.TTF') }}");       /*字体源文件*/
        }
        *{
            font-family: MyNewFont;
        }
        input:focus{
            outline: none;
            border: 1px solid #A7A8A4;
        }
        .login{
            width: 100%;
            height: 100%;
            background: url("{{ asset('Images/login_back.png') }}") fixed center center;
            background-size: cover;
            position:absolute;
            color: #FFFFFF;
            font-size: large;
        }
        .box {
            min-width:316px;
            max-width:316px;
            height: 320px;
            position: absolute;
            text-align: center;
            /*设置负值，为要定位子盒子的一半高度*/
        }
        @media screen and (min-width:316px){
            .box {
                left: 50%;
                /*设置负值，为要定位子盒子的一半宽度*/
                margin-left: -158px;
            }
        }@media screen and (min-height:320px){
            .box {
                top: 40%;
                margin-top: -160px;
            }
        }
        .box image{
            width: 60%;
        }
        .floor {
            width: 100%;
            margin-top: 10%;
            background-color: #D5D2Cb;
            opacity: 0.3;
            border-radius: 5px;
            padding-top: 15px;
            padding-bottom: 20px;
            position: relative;
            height: 196px;
        }
        .log_form{
            width: 100%;
            margin-top: 10%;
            border-radius:5px;
            padding-top: 15px;
            padding-bottom: 20px;
            height: 196px;
            position: relative;
            top: -226px;
        }
        .log_form label{
            background-color: #A29F98;
            opacity:1;
            height: 40px;
            width: 90%;
            margin-top: 5px;
            margin-bottom: 18px;
            text-align: left;
            vertical-align:middle;
            border-radius:5px;
        }
        .log_form label img{
            height: 56%;
            margin-left: 10px;
            margin-right: 10px;
            vertical-align:middle;
            opacity:1 !important;
            z-index: 999;
            width: 16px;
        }
        #login input{
            height: 32px;
            margin-top: 4px;
            width: 80%;
            background: none;
            border: none;
            border-radius: 0px;
            padding-left: 2%;
            border-left: 1px solid #c3c1bd;
            outline: none;
            -webkit-tap-highlight-color:rgba(255,0,0,0);
        }
        input:focus { outline: none; }
        .verify{
            display: block;
            height: 40px;
            border-radius:5px;
            margin-top: 5px;
            margin-bottom: 15px;
            margin-right: 0px;
            text-align: left;
        }
        .verify label{
            background-color: #444444;
            border: 1px solid #444444;
            height: 40px;
            border-radius:5px;
            width: 140px;
            margin-top: 0px;
            margin-left: 5%;
            margin-right: 5%;
            line-height: 34px;
            padding-top: 0px;
            padding-bottom: 0px;
            opacity: 0.3;
        }
        .verify img{
            vertical-align:top;
        }
        .verify label input{
            background-color: #444444;
            border: 0px !important;
            height: 100% !important;

            width: 70%;
            margin-bottom: 0px;
            margin-top: 0px !important;
            margin-left: 15%;
            font-size: 1em;
        }
        ::-webkit-input-placeholder {
            color:#FFFFFF;
            font-size: 0.9em;
            font-weight: 100;
        }
        .login_to{
            display: block;
            background-color: #A10922;
            height: 40px;
            border-radius:5px;
            line-height: 40px;
            font-size: 1.1em;
            color: #FFFDFE;
            margin-top: 10%;
            position: relative;
            font-weight: normal;
            top: -204px;
            width: 100%;
            border: none;
        }

        /*.bottom a:hover{*/
            /*color: #FFFDFE;*/
            /*text-decoration:none;*/
        /*}*/

        /*.bottom{*/
            /*display: block;*/
            /*margin-top: 5%;*/
            /*position: relative;*/
            /*top: -204px;*/
        /*}*/
        /*.reset{*/
            /*display: inline-block;*/
            /*float: left;*/
            /*font-size: 0.8em;*/
            /*border-bottom: 1px solid #FFFDFE;*/
            /*color: #FFFDFE;*/
            /*height: 18px;*/
            /*line-height: 18px;*/
        /*}*/

    </style>
</head>
<body>
    <div class="login">
        <div class="box">
            <image style="width: 70%" src="{{ asset('Images/logo.png') }}"></image>
            <div class="floor"></div>
            <form method="post" action="{{ url('/do_login') }}" id="login" onsubmit="return validate_form_login()">
                <div class="log_form">
                    <label for="username">
                        <img src="{{ asset('Images/user.png') }}"><input class="text" type='text' name="username" id="username" value="{{ old('username') }}">
                    </label>
                    <label for="password">
                        <img src="{{ asset('Images/pass.png') }}"><input class="text" type='password' name="password" class="password" value="{{ old('password') }}">
                    </label>
                    <p class="verify">
                        <label for="verify">
                            <input class="verify" placeholder="输入验证码" type='text' name="verify">
                        </label>
                        <img id="verify" src=""  onclick="show_captcah()" alt="验证码">
                    </p>

                </div>
                <button class="login_to" type="submit">登 录</button>
            </form>
        </div>
    </div>
</body>
<script type="text/javascript" src="{{ asset('/Js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('/Js/jquery.cookie.js') }}"></script>
<script type="text/javascript" src="{{ asset('/layer/layer.js') }}"></script>
<script>
    $.cookie('sw',window.screen.width);
    show_captcah()
    @if($errors->first())
           layer.msg("  {{ $errors->first() }} (ง •̀_•́)ง", {icon: 5});
    @endif

    function validate_form_login()
    {
        var username = $('input[name=username]').val();
        var password = $('input[name=password]').val();
        var verify = $('input[name=verify]').val();

        if(username == '' || password == '' || verify =='')
        {
            return false;
        }
        if(verify.length != 4) {
            layer.msg(" 验证码错误! (ง •̀_•́)ง", {icon: 5});
            return false;
        }
        return true;
    }

    //验证码
    function show_captcah() {
        $.ajax({
            url:"{{ url('/captcha/mews') }}",
            type:'POST',
            data:'',
            success:function (data) {
                $('#verify').attr('src',data);
            }
        });
    }
</script>
</html>