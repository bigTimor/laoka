@extends('layouts.jqmobi')
@section('css')
<style>
    #afui.login .header {
        background: #FFFFFF;
        border-color: #FFFFFF transparent #FFFFFF transparent;
    }
    #content{
        background: #FFFFFF;
    }
    #afui .button {
        background-color: #0088d1;
    }
    .box {
        width: 100%;
        max-width:350px;
        height: 320px;
        position: absolute;
        /*设置负值，为要定位子盒子的一半高度*/
    }
    @media screen and (min-width:350px){
        .box {
            left: 50%;
            /*设置负值，为要定位子盒子的一半宽度*/
            margin-left: -170px;
        }
    }@media screen and (min-height:320px){
        .box {
            top: 50%;
            margin-top: -160px;
        }
    }
    #afui input[type="text"]{
        border-left-width:0px;
        border-top-width:0px;
        border-right-width:0px;
        border-bottom-color:black;
        border-radius: 0;
        width: 220px;
    }
    #afui .header h1{
        width: 50%;
        left: 0%;
    }
    #afui .formGroupHead {
        font-size: 18px;
        font-weight: normal;
        color: #000;
        margin: 16px 0 8px;
    }
</style>
@endsection

@section('header')
    <header id="header">
        <h1><image src="{{ asset('Images/u40.jpg') }}" style="height: 100%;float: left"></image></h1>
    </header>
@endsection
@section('content')
    <div id="content">
        <div class="panel">
            <div class="box">
                <div class="formGroupHead"><image src="{{ asset('Images/u38.png') }}" style="margin-left: 40%"></image></div>
                <form method="post">
                    <input type="hidden"  id="islonin" value="false" />
                    <div class="formGroupHead">
                        账　号：<input type='text' name="username" id="username">
                    </div>
                    <div class="formGroupHead">
                        <span>密　码：</span><input type='password' name="password" class="password">
                    </div>
                    <div class="formGroupHead">
                        <span>验证码：</span><input style="width: 150px" name="verify" type='text' class="verify"><img id="verify" src="{{ url('captcha/mews') }}"  onclick="this.src='{{ url('captcha/mews') }}?r='+Math.random();" alt="验证码">
                    </div>
                    <div class="formGroupHead">
                        <a class="button block" style="width: 50%;height:100%;margin-left: 25%;;background-color: #0088d1;color: #FFFFFF;" id="btnLogin" onclick = 'validate_form_login()' >提交</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('footer')
    <div id="navbar"></div>
@endsection
@section('js')
    <script>
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
            if(username.length < 6 || password < 6)
            {
                layer.msg(" 账号密码错误! (ง •̀_•́)ง", {icon: 5});
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
                            $.post('url',{username:username,password:password},function (data) {
                                if(data){

                                }else{
                                    layer.msg(" 账号密码错误! (ง •̀_•́)ง", {icon: 5});
                                    $('#verify').attr('src','{{ url('captcha/mews') }}?r='+Math.random());
                                }
                            })
                        }else{
                            layer.msg(" 验证码错误! (ง •̀_•́)ง", {icon: 5});
                            $('#verify').attr('src','{{ url('captcha/mews') }}?r='+Math.random());
                        }
                    }
                });
            }
        }
    </script>
@endsection