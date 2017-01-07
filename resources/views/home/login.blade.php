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
            border: 1px solid #A29F98;
            opacity:1;
            height: 34px;
            border-radius:5px;
            width: 90%;
            margin-top: 5px;
            margin-bottom: 18px;
            text-align: left;
            vertical-align:middle;
            padding-top: 4px;
            padding-bottom: 4px;
        }
        .log_form label img{
            height: 90%;
            margin-left: 10px;
            margin-right: 10px;
            vertical-align:middle;
            opacity:1 !important;
            z-index: 999;
        }
        input{
            height: 24px;
            background-color: #A29F98;
            border: 1px solid #A29F98;
            border-left: 1px solid #c3c1bd;
        }
        .verify{
            display: block;
            height: 34px;
            border-radius:5px;
            margin-top: 5px;
            margin-bottom: 15px;
            margin-right: 0px;
            text-align: left;
        }
        .verify label{
            background-color: #444444;
            border: 1px solid #444444;
            height: 34px;
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
            border: 0px solid #444444;
            height: 100%;
            width: 70%;
            margin-bottom: 0px;
            margin-top: 0px;
            margin-left: 15%;
            font-size: 20px;
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
            margin-top: 15%;
            position: relative;
            font-weight: normal;
            top: -204px;
        }
        .login_to:hover{
            text-decoration:none;
            border: 1px solid #FFFFFF;
            color: #FFFDFE;
        }
        .bottom{
            display: block;
            margin-top: 5%;
            position: relative;
            top: -204px;
        }
        .bottom a:hover{
            color: #FFFDFE;
            text-decoration:none;
        }
        .reset{
            display: inline-block;
            float: left;
            font-size: 0.5em;
            border-bottom: 1px solid #FFFDFE;
            color: #FFFDFE;
            height: 18px;
            line-height: 18px;
        }
    </style>
</head>
<body>
    <div class="login">
        <div class="box">
            <image style="width: 70%" src="{{ asset('Images/logo.png') }}"></image>
            <div class="floor"></div>
            <div class="log_form">
                <form method="post" action="{{ url('ces') }}" id="login">
                    {{ csrf_field() }}
                    <input type="hidden"  id="islonin" value="false" />
                    <label>
                        <img src="{{ asset('Images/user.png') }}"><input class="text" type='text' name="username" id="username">
                    </label>
                    <label>
                        <img src="{{ asset('Images/pass.png') }}"><input class="text" type='password' name="password" class="password">
                    </label>
                    <p class="verify">
                        <label>
                            <input class="verify" placeholder="输入验证码" type='text' name="verify">
                        </label>
                        <img id="verify" src="{{ url('captcha/mews') }}"  onclick="this.src='{{ url('captcha/mews') }}?r='+Math.random();" alt="验证码">
                    </p>
                </form>
            </div>
            <a class="login_to" onclick = 'validate_form_login()' >登 录</a>
            <p class="bottom">
                <a class="reset"> 忘记密码?</a>
            </p>
        </div>
    </div>
</body>
<script type="text/javascript" src="{{ asset('/Js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('/Js/jquery.cookie.js') }}"></script>
<script type="text/javascript" src="{{ asset('/layer/layer.js') }}"></script>
<script>
    $.cookie('sw',window.screen.width);
    @if($errors->has('name'))
    layer.msg("  {{ $errors->first('name') }} (ง •̀_•́)ง", {icon: 5});
    @elseif($errors->has('email'))
    layer.msg("  {{ $errors->first('email') }} (ง •̀_•́)ง", {icon: 5});
    @elseif($errors->has('password'))
    layer.msg("  {{ $errors->first('password') }} (ง •̀_•́)ง", {icon: 5});
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
        if(verify.length != 4)
        {
            layer.msg(" 验证码错误! (ง •̀_•́)ง", {icon: 5});
            return false;
        }else{
            $.ajax({
                url:"{{ url('captcha/check') }}",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type:'POST',
                data:{
                    verify:verify
                },
                success:function (data) {
                    if(data == 1){
                        <!-- 登陆接口 -->
                        $.post('http://roco.honghaiweb.com/Api/index.php/App/Base/login',{username:username,password:password},function (data) {
                            if(data.status){
                                $.cookie('user',JSON.stringify(data.retData));
                                $.cookie('user_id',data.retData.u_id);
                                $.cookie('session_id',data.retData.session_id);
                                $.cookie('auth_key',data.retData.auth_key);
                                window.location.href='{{ url("/") }}';
                            }else{
                                layer.msg(data.retErr + "! (ง •̀_•́)ง", {icon: 5});
                                $('#verify').attr('src','{{ url('captcha/mews') }}?r='+Math.random());
                                $('input[name=verify]').val('');
                                $('input[name=password]').val('');
                            }
                        })
                    }else{
                        layer.msg(" 验证码错误! (ง •̀_•́)ง", {icon: 5});
                        $('input[name=verify]').val('');
                        $('#verify').attr('src','{{ url('captcha/mews') }}?r='+Math.random());
                    }
                }
            });
        }
    }
</script>
</html>