<!DOCTYPE html>
<!--HTML5 doctype-->
<html>

<head>
    <script>
        (function() {
            if ("-ms-user-select" in document.documentElement.style && navigator.userAgent.match(/IEMobile\/10\.0/)) {
                var msViewportStyle = document.createElement("style");
                msViewportStyle.appendChild(
                    document.createTextNode("@-ms-viewport{width:auto!important}")
                );
                document.getElementsByTagName("head")[0].appendChild(msViewportStyle);
            }
        })();
    </script>

        <title>劳卡量尺宝</title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="_token" content="{{ csrf_token() }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/css_phone/icons.css') }}" />

        <style>
            @font-face {
                font-family: 'MyNewFont';   /*字体名称*/
                src: url("{{ asset('dist/fonts/GBK.TTF') }}");       /*字体源文件*/
            }
            *{
                font-family: MyNewFont;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="{{ asset('Css/bootstrap.min.css') }}"  />
        <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/css_phone/main.css') }}"  />
        <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/css_phone/lists.css') }}"  />
        <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/css_phone/appframework.css') }}"  />

      {{--<link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/css_phone/forms.css') }}"  />--}}
      <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/css_phone/buttons.css') }}"  />
      <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/css_phone/badges.css') }}"  />
      <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/css_phone/grid.css') }}"  />

        <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/css_phone/ios.css') }}"  />
        <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/plugins/css/af.actionsheet.css') }}"  />
        <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/plugins/css/af.popup.css') }}"  />
        <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/plugins/css/af.scroller.css') }}"  />
        <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/plugins/css/af.selectBox.css') }}"  />

        
        <!-- uncomment for intel.xdk apps 
        <script type="text/javascript" charset="utf-8" src="intelxdk.js"></script>
        <script type="text/javascript" charset="utf-8" src="xhr.js"></script>
        -->
        <link rel="stylesheet" href="{{ asset('lf/css/init.css') }}">
        <link rel="stylesheet" href="{{ asset('lf/css/styles.css') }}">

        <!--手机端样式-->
        <link rel="stylesheet" type="text/css" href="{{ asset('Css/index_phone.css') }}"  />

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

        <!--<script type="text/javascript" charset="utf-8" src="./appframework.js"></script>-->
        <!-- include af.desktopBrowsers.js on desktop browsers only -->
        <script>

            function loadedPanel(what) {
                //We are going to set the badge as the number of li elements inside the target
                $.ui.updateBadge("#aflink", $("#af").find("li").length);
            }


            function unloadedPanel(what) {
                console.log("unloaded " + what.id);
            }

            if (!((window.DocumentTouch && document instanceof DocumentTouch) || 'ontouchstart' in window)) {
                var script = document.createElement("script");
                script.src = "plugins/af.desktopBrowsers.js";
                var tag = $("head").append(script);
                //$.os.desktop=true;
            }
          
        </script>





        <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.actionsheet.js') }}"></script>
        <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.css3animate.js') }}"></script>
        <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.passwordBox.js') }}"></script>
        <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.scroller.js') }}"></script>
        <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.selectBox.js') }}"></script>
        <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.touchEvents.js') }}"></script>
        <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.touchLayer.js') }}"></script>
        <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.popup.js') }}"></script>

        <!-- <script type="text/javascript" charset="utf-8" src="./ui/transitions/all.js"></script> -->
        <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/ui/transitions/fade.js') }}"></script>
        <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/ui/transitions/flip.js') }}"></script>
        <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/ui/transitions/pop.js') }}"></script>
        <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/ui/transitions/slide.js') }}"></script>
        <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/ui/transitions/slideDown.js') }}"></script>
        <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/ui/transitions/slideUp.js') }}"></script>
        <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.slidemenu.js') }}"></script>
        

        <script type="text/javascript">
            /* This function runs once the page is loaded, but intel.xdk is not yet active */
            //$.ui.animateHeaders=false;
             var search=document.location.search.toLowerCase().replace("?","");
             //if(!search)
            $.ui.useOSThemes=true;
            if(search.length>0) //Android fix has too many buggy issues on iOS - can't preview with $.os.android
            {

               $.ui.useOSThemes=true;
                if(search=="win8")
                    $.os.ie=true;
                $.ui.ready(function(){
                    $("#afui").get(0).className='ios';
                    console.log(search);
                });
            }
            
            var webRoot = "./";
            $.ui.openLinksNewTab = false;
            $.ui.splitview=false;
            

            $(document).ready(function(){
                  // $.ui.launch();

            });
            
            /* This code is used to run as soon as intel.xdk activates */
            var onDeviceReady = function () {
                intel.xdk.device.setRotateOrientation("portrait");
                intel.xdk.device.setAutoRotate(false);
                webRoot = intel.xdk.webRoot + "";
                //hide splash screen
                intel.xdk.device.hideSplashScreen();
                $.ui.blockPageScroll(); //block the page from scrolling at the header/footer
            };
            document.addEventListener("intel.xdk.device.ready", onDeviceReady, false);

            function showHide(obj, objToHide) {
                var el = $("#" + objToHide)[0];

                if (obj.className == "expanded") {
                    obj.className = "collapsed";
                } else {
                    obj.className = "expanded";
                }
                $(el).toggle();

            }
        </script>
</head>
    <body>
        <div id="afui" class="ios">
            <!-- 加载页面 -->
            <div id="splashscreen" class='ui-loader heavy'>
                App Framework
                <br>
                <br>    <span class='ui-icon ui-icon-loading spin'></span>
                <h1>Starting app</h1>

            </div>

            <!-- 默认的header头 -->
            <header id="header">
            </header>

            <!-- 量尺页面header头 -->
            <header id="header_measure">
                <div class="header_measure">
                    <input name="search" type="search" placeholder="输入关键词搜索" />
                    <button><img src="{{ asset('Images/search.png') }}"></button>
                </div>
                <div class="add_customer_button">
                    <a href="#add_customer" style="color: #FFFfff">+</a>
                </div>
            </header>
            <header id="header_customer_details">
                <a id="backButton" class="button" style="visibility: visible;"> </a>
                <h1>客户详情</h1>
                <a class="go_editor_button" href="javascript:" onclick="go_editor_button()"><img src="{{ asset('Images/editor.png') }}"></a>
            </header>
            <div id="content">

                <div id="measure" class="panel" selected="true" data-header="header_measure" data-load="loadedCustomer" data-unload="unloadedPanel" data-tab="navbar_measure">
                    <url class="customer_classify">
                        <li value="1">临时客户</li>
                        <li value="2">待量尺客户</li>
                        <li value="3">已量尺客户</li>
                    </url>
                    <ul class="customer_list temporary_customer"></ul>
                    <ul class="customer_list old_customer"></ul>
                    <ul class="customer_list waiting_customer"></ul>
                    <div class="buoy">
                        <div class="buoy_camera"><img src="{{ asset('Images/buoy_camera.png') }}"></div>
                        <div class="buoy_voice"><img src="{{ asset('Images/buoy_voice.png') }}"></div>
                    </div>
                </div>

                <div id="customer_details" class="panel" data-header="header_customer_details" data-footer="none">
                    <ul class="customer_details">
                        <li class="customer_header"><div><img src="{{ asset('Images/man_header.png') }}"></div></li>
                        <li>姓名<span id="customer_username"></span></li>
                        <li>性别<span id="customer_sex"></span></li>
                        <li>地址<span id="customer_address"></span></li>
                        <li>电话<span id="customer_telephone"></span></li>
                        <li>微信号<span id="customer_wetchat"></span></li>
                        <li>量尺时间<span id="customer_measure_time"></span></li>
                        <li>预算<span id="customer_budget"></span></li>
                        <li>看方案时间<span id="customer_scheme_time"></span></li>
                    </ul>
                    <input type="hidden" name="customer_id" value="">
                    <a class="go_measure" href="javascript:" onclick="portal()">进入量尺</a>
                    <div class="buoy" style="bottom: 10%">
                        <div class="buoy_camera"><img src="{{ asset('Images/buoy_camera.png') }}"></div>
                        <div class="buoy_voice"><img src="{{ asset('Images/buoy_voice.png') }}"></div>
                    </div>
                </div>

                <div id="customer_edit" class="panel" title="编辑客户" data-footer="none">
                    <ul class="customer_details">
                        <li class="customer_header">
                            <div><img src="{{ asset('Images/man_header.png') }}"></div><span style="color: #c81532">（注:有*标记的为必填项）</span>
                        </li>
                        <li>
                            <span class="mandatory">*</span>姓名<label><input type="text" name="add_username" placeholder="姓名"></label>
                        </li>
                        <li style="overflow:hidden;">
                            <span class="mandatory">*</span>性别
                            <label class="sex_woman"><input name="sex" type="radio" value="0">女<img class="sex_img_woman" src="{{ asset('Images/sex@2x_34.png') }}"><img style="display: none" class="sex_true" src="{{ asset('Images/true.png') }}"></label>
                            <label class="sex_man"><input name="sex" type="radio" value="1" checked="true">男<img class="sex_img_man" src="{{ asset('Images/sex@2x.png') }}"><img class="sex_true" src="{{ asset('Images/true.png') }}"></label>
                        </li>
                        <li>
                            <span class="mandatory">*</span>地址<label><input type="text" name="add_address" placeholder="请输入客户的楼盘"></label>
                        </li>
                        <li>
                            <span class="mandatory">*</span>电话<label><input type="text" name="add_telephone" placeholder="请输入客户的联系方式"></label>
                        </li>
                        <li>
                            <span class="mandatory">*</span>微信号<label><input type="text" name="add_wetchat" placeholder="请输入微信号"></label>
                        </li>
                        <li>
                            <span class="mandatory">*</span>装修预算<span>请选择装修预算</span>
                        </li>
                        <li>
                            看方案时间<label><input type="text" name="add_scheme_time" placeholder="请输入客户看方案时间"></label>
                        </li>
                    </ul>
                    <p class="bottom_button">
                        <a class="go_edit_customer" href="javascript:" onclick="add_customer_do()">确定</a>
                        <a class="reset_edit" href="javascript:" onclick="">取消</a
                    </p>
                </div>

                <div id="add_customer" class="panel" title="添加临时客户" data-footer="none">
                    <ul class="customer_details">
                        <li class="customer_header">
                            <div><img src="{{ asset('Images/man_header.png') }}"></div><span style="color: #c81532">（注:有*标记的为必填项）</span>
                        </li>
                        <li>
                            <span class="mandatory">*</span>姓名<label><input type="text" name="add_username" placeholder="姓名"></label>
                        </li>
                        <li style="overflow:hidden;">
                            <span class="mandatory">*</span>性别
                            <label class="sex_woman"><input name="sex" type="radio" value="0">女<img class="sex_img_woman" src="{{ asset('Images/sex@2x_34.png') }}"><img style="display: none" class="sex_true" src="{{ asset('Images/true.png') }}"></label>
                            <label class="sex_man"><input name="sex" type="radio" value="1" checked="true">男<img class="sex_img_man" src="{{ asset('Images/sex@2x.png') }}"><img class="sex_true" src="{{ asset('Images/true.png') }}"></label>
                        </li>
                        <li>
                            <span class="mandatory">*</span>地址<label><input type="text" name="add_address" placeholder="请输入客户的楼盘"></label>
                        </li>
                        <li>
                            <span class="mandatory">*</span>电话<label><input type="text" name="add_telephone" placeholder="请输入客户的联系方式"></label>
                        </li>
                        <li>
                            <span class="mandatory">*</span>微信号<label><input type="text" name="add_wetchat" placeholder="请输入微信号"></label>
                        </li>
                        <li onclick="choose_dudget()">
                            <span class="mandatory">*</span>装修预算<span class="budget">请选择装修预算</span>
                            <input name="hidden_budget" type="hidden">
                        </li>
                        <li>
                            看方案时间<label><input type="text" name="add_scheme_time" placeholder="请输入客户看方案时间"></label>
                        </li>
                    </ul>
                    <p class="bottom_button">
                        <a class="go_edit_customer" href="javascript:" onclick="add_customer_do()">确定</a>
                        <a class="reset_edit" href="javascript:" onclick="">取消</a
                    </p>
                </div>

                <div class="panel" title="选择风格" id="go_measurement" data-load="list_style" data-footer='none'>
                    <div class="choose">
                        <ul>
                        </ul>
                        <div style="clear: both;"></div>
                        <div class="next_measure">
                            <button onclick="next_measure()">下一步</button>
                        </div>
                        <div class="buoy" style="bottom: 10%">
                            <div class="buoy_camera"><img src="{{ asset('Images/buoy_camera.png') }}"></div>
                            <div class="buoy_voice"><img src="{{ asset('Images/buoy_voice.png') }}"></div>
                        </div>
                    </div>
                </div>

                <div class="panel" title="选择搭配" id="next_measurement" data_footer="none">
                    <div class="collocation_title">
                        <span>现代风格 - </span><span class="theme_name">极简主义</span><a href="#">筛选》</a>
                    </div>
                    <ul class="collocation_list">

                    </ul>
                    <div class="next_measure">
                        <button onclick="">下一步</button>
                    </div>
                    <div class="buoy" style="bottom: 10%">
                        <div class="buoy_camera"><img src="{{ asset('Images/buoy_camera.png') }}"></div>
                        <div class="buoy_voice"><img src="{{ asset('Images/buoy_voice.png') }}"></div>
                    </div>
                </div>

                <div class="panel" title="活动中心" id="activity" data-load="loadActivity" data-header="header_activity">
                    <div id="activity_body" style="width: 100%;text-align: center">
                        <a href="#"><img style="width: 100%" src="{{ asset('Images/u5012.gif') }}"></a>
                        <a href="#"><img style="width: 100%" src="{{ asset('Images/u5016.png') }}"></a>
                        <a href="#"><img style="width: 100%" src="{{ asset('Images/u5012.gif') }}"></a>
                        <a href="#"><img style="width: 100%" src="{{ asset('Images/u5016.png') }}"></a>
                        <a href="#"><img style="width: 100%" src="{{ asset('Images/u5012.gif') }}"></a>
                        <a href="#"><img style="width: 100%" src="{{ asset('Images/u5016.png') }}"></a>
                    </div>
                </div>
            </div>
            <!-- ------------------------------------------ -->
            <!-- navbar -->

        <!--底部按钮-->
        <div id="navbar">
            <a href="#measure" id='navbar_measure'><img src="{{ asset('Images/f_measure.png') }}"></a>
            <a href="#scheme" id='navbar_scheme'><img src="{{ asset('Images/f_scheme.png') }}"></a>
            <a href="#activity" id='navbar_activity'><img src="{{ asset('Images/f_activity.png') }}"></a>
            <a href="#private" id='navbar_private'><img src="{{ asset('Images/f_private.png') }}"></a>
        </div></div>
    </body>
    <script type="text/javascript" src="{{ asset('/Js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('Js/phone.js') }}"></script>
    <script>
        //男性客户头像图片与女性客户头像图片
        var sex_headerImg = {
            '0':"{{ asset('Images/woman_header.png') }}",
            '1':"{{ asset('Images/man_header.png') }}"
        };
        var is_loadedCustomer = false;

        // 客户页面加载事件
        function loadedCustomer() {
            change_footer_img();
            $('#navbar_measure>img').attr('src','../Images//t_measure.png');

            if(is_loadedCustomer){
                return false;
            }
            get_customer(1);
            get_customer(3);

            $('.customer_classify>li[value=2]').trigger("click");
            is_loadedCustomer = true;
        }

        //获取客户列表
        function get_customer(val) {
            var aa = "{{ asset('Images/recycle.png') }}";
            //临时客户列表
            $.ajax({
                url: "{{ url('get_customer') }}",
                type: 'POST',
                data: {
                    val:val
                },
                success: function (result) {
                    result = JSON.parse(result);
                    console.log(result);
                    if (result.status && result.retData.data.length > 0) {
                        if(val == 3){
                            $('.temporary_customer').html("");
                            sessionStorage.setItem('temporary_customer', JSON.stringify(result.retData.data));
                            for (var i = 0; i < result.retData.data.length; i++) {
                                $('.temporary_customer').append('<li value="'+result.retData.data[i].id+'"><div class="list_header_portrait" ><img src="'+sex_headerImg[0]+'"></div><div class="message_title"><span class="username">'+result.retData.data[i].c_name+'</span><span class="contact">'+result.retData.data[i].c_phone_num+'</span></div><button class="check_to_del"><img src="'+aa+'"></button></li>');
                            }
                        }else{
                            $('.old_customer').html("");
                            $('.waiting_customer').html("");
                            sessionStorage.setItem('customers', JSON.stringify(result.retData.data));
                            for (var i = 0; i < result.retData.data.length; i++) {
                                if(result.retData.data[i].plan_measure_date){
                                    $('.old_customer').append('<li value="'+result.retData.data[i].id+'"><div class="list_header_portrait" ><img src="'+sex_headerImg[0]+'"></div><div class="message_title"><span class="username">'+result.retData.data[i].c_name+'</span><span class="contact">'+result.retData.data[i].c_phone_num+'</span></div><button class="check_to_del"><img src="'+aa+'"></button></li>');
                                }else{
                                    $('.waiting_customer').append('<li value="'+result.retData.data[i].id+'"><div class="list_header_portrait" ><img src="'+sex_headerImg[0]+'"></div><div class="message_title"><span class="username">'+result.retData.data[i].c_name+'</span><span class="contact">'+result.retData.data[i].c_phone_num+'</span></div><button class="check_to_del"><img src="'+aa+'"></button></li>');
                                }
                            }
                        }
                        //客户列表绑定左滑动事件
                        $('.customer_list>li:not(.loss_customer)').bind('swipeLeft',del_customer);
                        //客户列表绑定点击事件
                        $('.customer_list>li:not(.loss_customer)').bind('click',customer_click);
                        //删除按钮绑定点击事件
                        $('.check_to_del').bind('click',del_customer_do);
                    }else{
                        $('.temporary_customer').append('<li class="loss_customer">'+result.retErr+'</li>');
                    }
                }
            });
        }

        //选择风格页面加载事件
        function list_style() {
            if(!$('.choose').find('.pitch_on').val()){
                var pid = 0;
                $.ajax({
                    url:"{{ url('/get_menu') }}",
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                    },
                    data:{
                        pid:pid,
                    },
                    type:'post',
                    success:function (data) {
                        data = JSON.parse(data);
                        if(data.status){
                            var aa = "{{ asset('Images') }}";
                            for(var i=0;i<data.retData.length;i++){
                                $('.choose>ul').append('<li value = "'+ data.retData[i].id+'"><span class="choose_li_header">'+data.retData[i].name+'</span></li>');
                                $('.next_measure').before('<div class="style_explain" name="'+data.retData[i].id+'"><div class=style_explain_bg><img src="'+aa+'/'+data.retData[i].cover+'"></div><div class="captions"><span>设计风格介绍：</span><p>室内设计是根据建筑物的使用性质、所处环境和相应标准，运用物质技术手段和建筑设计原理，创造功能合理、舒适优美、满足人们物质和精神生活需要的室内环境。这一空间环境既具有使用价值，满足相应的功能要求，同时也反映了历史文脉、建筑风格、环境气 氛等精神因素。</p></div></div>');
                            }
                            $('.choose>ul>li').on('click',check_style);
                            $('.choose>ul>li:first-child').trigger('click');
                        }
                    }
                });
            }
        }

        //选择风格页面点击事件
        function check_style() {
            if($(this).attr('class') != 'pitch_on'){
                $('.style_explain').hide();
                $('.pitch_on').removeClass('pitch_on');
                $(this).attr('class','pitch_on');
                $('.style_explain[name='+$(this).val()+']').show();
            }
        }

        //选择搭配页面加载
        function show_collocation(style_id,theme_id) {
            $.ajax({
                url:"{{ url('/get_img') }}",
                data:{
                    style_id:style_id,
                    theme_id:theme_id
                },
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                type:'post',
                success:function (data) {
                    $('.collocation_list').html('');
                    data = JSON.parse(data);
                    var aa = "{{ asset('Images') }}";
                    if(data.status == 1) {
                        for (var i = 0; i < data.retData.length; i++) {
                            j = i + 1;
                            if (i == 0) {
                                $('.collocation_list').append('<li value="' + data.retData[i].match_id + '" class="theme_pitch_on"><img src="' + aa + '/' + data.retData[0].picture + '" class="img-thumbnail"><img class="img_badge" src="' + aa + '/2x_80.png" ><span>搭配' + j + '</span></li>');
                            } else {
                                $('.collocation_list').append('<li value="' + data.retData[i].match_id + '"><img src="' + aa + '/' + data.retData[0].picture + '" class="img-thumbnail"><img class="img_badge" src="' + aa + '/2x_61.png" ><span>搭配' + j + '</span></li>');
                            }
                        }
                    }
//                    $.ui.loadContent('#next_measurement',false,false,'slide');
                    popup_collocation(style_id,theme_id);
                }
            });
        }

        //选择搭配页面弹出选择
        function popup_collocation(style_id,theme_id) {
            //获取主题与风格列表
            $.ajax({
                url:"{{ url('get_theme') }}",
                type:'POST',
                data:{
                    style_id:style_id
                },
                success:function(data){
                    console.log(data);
                    data = JSON.parse(data);
                    for(var i = 0;i<data.style_data.length;i++){
                        console.log('aa');
                    }
                }
            });

            $("#afui").popup({
                title:' ',
                message: '<ul class="popup_style"><li><li></ul><ul><li></li></ul>',
                cancelText: "取消",
                cancelCallback: function () {},
                doneText: "确定",
                doneCallback: function () {
                    alert("Logging in")
                },
                cancelOnly: false
            });
        }
    </script>
</html>