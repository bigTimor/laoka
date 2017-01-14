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
    <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/css/icons.css') }}" />


    <style>
        @font-face {
            font-family: 'MyNewFont';   /*字体名称*/
            src: url("{{ asset('dist/fonts/GBK.TTF') }}");       /*字体源文件*/
        }
        *{
            font-family: MyNewFont;
        }

        #header{
            background-image: url("{{ asset('Images/banner.png') }}");
            background-size:cover;
            max-height: 120px;
            border: 0px;
            color: #FFFFFF;
        }
        .detailed{
            width: 67%;
            position:absolute;
            right: 0px;
            height: 100%;
            background-image: url("{{ asset('Images/bg.png') }}");
            background-size:cover;
            overflow: auto;
        }
        .right,.full_screen,.choose,.private_right,.add_customer_interface,.collocation_album_body,.directory,.design_explain{
            background-image: url("{{ asset('Images/bg.png') }}");
        }
        #header_lf .procedurea{
            color: #db3740;
            background-color: beige;
            background-image: url("{{ asset('Images/UIkit.png') }}");
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/bootstrap.min.css') }}"  />
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/style.css') }}"  />
    <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/css/main.css') }}"  />
    <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/css/lists.css') }}"  />
    <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/css/appframework.css') }}"  />

    {{--<link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/css_phone/forms.css') }}"  />--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/css/buttons.css') }}"  />
    <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/css/badges.css') }}"  />
    <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/css/grid.css') }}"  />

    <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/plugins/css/af.actionsheet.css') }}"  />
    <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/css/af.popup.css') }}"  />
    <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/plugins/css/af.scroller.css') }}"  />
    <link rel="stylesheet" type="text/css" href="{{ asset('Jqmobi/plugins/css/af.selectBox.css') }}"  />


    <link rel="stylesheet" href="{{ asset('lf/css/init.css') }}">
    <link rel="stylesheet" href="{{ asset('lf/css/styles.css') }}">

    <!--ipad端样式-->
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/index_ipad.css') }}"  />

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




    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.actionsheet.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.css3animate.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.passwordBox.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.scroller.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.selectBox.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.touchEvents.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/plugins/af.touchLayer.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('Jqmobi/af.popup.js') }}"></script>

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
                $("#afui").get(0).className='login';
            });
        }

        var webRoot = "./";
        $.ui.openLinksNewTab = false;
        $.ui.splitview=false;

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
<div id="afui" class="">
    <header id="header">
        <span style="position: absolute;right: 3%;text-align: right;top:30px">
                <a class="voice" href="javascript:">
                    <img src="{{ asset('Images/voice.png') }}">
                </a>
                <a class="camera" href="javascript:">
                    <img src="{{ asset('Images/camera.png') }}">
                </a>
            </span>
    </header>
    <header id="header_measure" class="header_measure">
        <img class="header_logo" src="{{ asset('Images/logo_white.png') }}">
        <div class="header_menu">
            <ul>
                <li value="1" class="check_on" onclick="list_customer(1,this)">待测量</li>
                <li value="2" onclick="list_customer(2,this)">已测量</li>
                <li value="3" onclick="list_customer(3,this)">临时客户</li>
            </ul>
            <span style="position: absolute;right: 0px;text-align: right">
                <a class="voice" href="javascript:">
                    <img src="{{ asset('Images/voice.png') }}">
                </a>
                <a class="camera" href="javascript:">
                    <img src="{{ asset('Images/camera.png') }}">
                </a>
            </span>
        </div>
    </header>
    <header id="header_activity" class="header_activity">
        <div class="header_content">
            <img class="header_logo_secondary" src="{{ asset('Images/logo_white.png') }}">
            <span>活动</span><br />
            <label>
                <img src="{{ asset('Images/search.png') }}">
                <input name="search" type="search" placeholder="输入关键词搜索" />
            </label>
            <span style="position: absolute;right: 3%">
                <a class="voice" href="javascript:">
                    <img src="{{ asset('Images/voice.png') }}">
                </a>
                <a class="camera" href="javascript:">
                    <img src="{{ asset('Images/camera.png') }}">
                </a>
            </span>
        </div>
    </header>
    <header id="header_scheme" class="header_activity">
        <div class="header_content">
            <img class="header_logo_secondary" src="{{ asset('Images/logo_white.png') }}">
            <span>主题风格</span><br />
            <label>
                <img src="{{ asset('Images/search.png') }}">
                <input name="search" type="search" placeholder="输入关键词搜索" />
            </label>
            <span style="position: absolute;right: 3%">
                <a class="voice" href="javascript:">
                    <img src="{{ asset('Images/voice.png') }}">
                </a>
                <a class="camera" href="javascript:">
                    <img src="{{ asset('Images/camera.png') }}">
                </a>
            </span>
        </div>
    </header>
    <header id="header_private" class="header_activity">
        <div class="header_content">
            <img class="header_logo_secondary" src="{{ asset('Images/logo_white.png') }}">
            <span>个人中心</span>
            <br />
            <a class="logout" data-ignore="True" href="{{ url('/logout') }}">
                <img src="{{ asset('Images/logout.png') }}"> 退出登录
            </a>
        </div>
    </header>
    <header id="header_lf" class="header_lf">
        <a id="backButton" class="button" style="visibility: visible;position: absolute;top:8px;"> </a>
        <div class="btn-group">
            <button id="stage0" class="btn procedure procedurea"></button>
            <button id="stage1" class="btn procedure"></button>
            <button id="stage2" class="btn procedure"></button>
            <button id="stage3" class="btn procedure"></button>
        </div>
        <button id="lf_next" class="btn">下一步</button>
    </header>
    <div id="content">
        <div class="panel" id="measure" selected="true" data-load="loadeCustomer" data-header="header_measure">
            <div class="customer">
                <div class="search">
                    <img class="search_img" src="{{ asset('Images/search.png') }}">
                    <input name="search" type="search" placeholder="输入关键词搜索" />
                </div>
                <div style="width: 97%;height: 79%;overflow: auto;">
                    <ul class="customer_list" id="customer_list">
                    </ul>
                </div>
                <div class="add_customer">
                    <a href="#add_customer">╋ 添加临时客户</a>
                </div>
            </div>
            <div class="detailed">
                <div class="data_center">
                    <a href="javascript:" onclick='layer.msg("暂无权限！", {icon: 5})'>编辑</a>
                    <div class="header_img"><img src=""></div>
                    <div class="data_list">
                        <input type="hidden" value="" name="customer_id">
                        <table>
                            <tr>
                                <th>姓名</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>性别</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>地址</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>电话</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>微信号</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>量尺时间</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>预算</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>看方案时间</th>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div class="go_measure">
                        <a href="javascript:" onclick="portal()"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel" title="选择风格" id="go_measurement" data-load="list_style" data-footer='none'>
            <div class="choose">
                <ul>
                </ul>
                <div class="next_measure">
                    <button onclick="$.ui.loadContent('#next_measurement')">下一步</button>
                </div>
            </div>
        </div>
        <div class="panel" title="选择风格主题" id="next_measurement" data-load="loadeMenu" data-footer='none'>
            <div class="menu_top">
                <ul class="style_list">
                </ul>
            </div>
            <div style="clear: both;"></div>
            <div class="left">
                <ul>
                </ul>
            </div>
            <div class="right">
                <div style="clear: both"></div>
                <div class="collocation">
                    <div class="screen">
                        <ul>
                        </ul>
                    </div>
                    <div class="next_measure">
                        <button onclick="go_choose_room()">下一步</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel" title="选择房间" id="choose_room" data-load="loadeRoom" data-footer="none">
            <div class="full_screen">
                <ul>
                    <li value='1'>
                        <img src="{{ asset('Images/u521.jpg') }}" class="img-thumbnail">
                        <span>卧室</span>
                    </li>
                    <li value='2'>
                        <img src="{{ asset('Images/u521.jpg') }}" class="img-thumbnail">
                        <span>客餐厅</span>
                    </li>
                    <li value='3'>
                        <img src="{{ asset('Images/u521.jpg') }}" class="img-thumbnail">
                        <span>多功能房</span>
                    </li>
                    <li value='4'>
                        <img src="{{ asset('Images/u521.jpg') }}" class="img-thumbnail">
                        <span>儿童房</span>
                    </li>
                    <li value='5'>
                        <img src="{{ asset('Images/u521.jpg') }}" class="img-thumbnail">
                        <span>厨房</span>
                    </li>
                    <li value='6'>
                        <img src="{{ asset('Images/u521.jpg') }}" class="img-thumbnail">
                        <span>其它</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="panel" title="风格主题" id="scheme" data-load="loadeTheme" data-header="header_scheme">
            <div class="scheme_style">
                <ul class="scheme_style_list">
                </ul>
            </div>
            <div class="scheme_left">
                <ul>
                </ul>
            </div>
            <div class="right">
                <div>
                    <ul class="li_room">
                    </ul>
                </div>
                <div style="clear: both"></div>
                <div class="scheme_collocation">
                    <div class="scheme_screen">
                        <ul>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel" title="搭配预览" id="collocation_album" data-load="loadeCollocation" data-footer="none">
            <div class="collocation_album_body">
                <h1 class="collocation_title">标题</h1>
                <div class="album_body">
                    <section id="slider_wrapper">

                        <div id="slider" class="divas-slider">

                            <ul class="divas-slide-container">
                            </ul>

                            <div class="divas-navigation">
                                <span class="divas-prev">&nbsp;</span>
                                <span class="divas-next">&nbsp;</span>
                            </div>

                            <div class="divas-controls">
                                <span class="divas-start"><i class="fa fa-play"></i></span>
                                <span class="divas-stop"><i class="fa fa-pause"></i></span>
                            </div>

                        </div>

                    </section>
                </div>
                <div class="collocation_explain">
                    <span>风格介绍：</span>
                    <p>室内设计是根据建筑物的使用性质、所处环境和相应标准，运用物质技术手段和建筑设计原理，创造功能合理、舒适优美、满足人们物质和精神生活需要的室内环境。</p>
                </div>
            </div>
        </div>
        <div class="panel" title="活动中心" id="activity" data-load="loadActivity" data-header="header_activity" style="width: 100%;text-align: center;overflow: auto;-webkit-overflow-scrolling:touch;">
            <div id="activity_body" style="width: 100%;text-align: center;overflow: auto;-webkit-overflow-scrolling:touch;">
                <a href="#"><img style="width: 100%" src="{{ asset('Images/u5012.gif') }}"></a>
                <a href="#"><img style="width: 100%" src="{{ asset('Images/u5016.png') }}"></a>
                <a href="#"><img style="width: 100%" src="{{ asset('Images/u5012.gif') }}"></a>
                <a href="#"><img style="width: 100%" src="{{ asset('Images/u5016.png') }}"></a>
                <a href="#"><img style="width: 100%" src="{{ asset('Images/u5012.gif') }}"></a>
                <a href="#"><img style="width: 100%" src="{{ asset('Images/u5016.png') }}"></a>
            </div>
        </div>
        <div class="panel" title="个人中心" id="private" data-load="loadUser" data-header="header_private">
            <div class="private_left">
                <ul class="private" id="p_menu">
                    <li class="relay stage" name="user">
                        <div>
                            <img src="{{ asset('Images/default.png') }}"><br />
                        </div>
                        <span class="self_name"></span>
                        <span class="identity"></span>
                    </li>
                    <li class="relay" name="reset_passowrd"><img src="{{ asset('Images/resetpass.png') }}">修改密码</li>
                    <li onclick="$.ui.loadContent('#measure',false,false,'slide')"><img src="{{ asset('Images/customer.png') }}">我的客户</li>
                    <li class="relay" name="data_center"><img src="{{ asset('Images/data.png') }}">数据中心</li>
                    <li onclick="recommend()"><img src="{{ asset('Images/recommend.png') }}">推荐给朋友</li>
                    <li class="relay" name="message"><img src="{{ asset('Images/message.png') }}">信息推荐</li>
                    <li class="relay" name="about_us"><img src="{{ asset('Images/about_us.png') }}">关于我们</li>
                    <li class="relay"><img src="{{ asset('Images/help.png') }}">使用帮助</li>
                    <li class="relay"><img src="{{ asset('Images/agreement.png') }}">服务条款</li>
                    <li class="relay" name="feedback"><img src="{{ asset('Images/feedback.png') }}">用户反馈</li>
                    <li onclick="set_bluetooth()"><img src="{{ asset('Images/bluetooth.png') }}">蓝牙设置</li>
                    <li class="relay"><img src="{{ asset('Images/clear.png') }}">清除缓存</li>
                    <li class="relay"><img src="{{ asset('Images/update.png') }}">版本更新</li>
                    <li><img src="{{ asset('Images/meassage.png') }}"><a href="telL:400 888 888">服务热线：<span class="meassage_telephone">400 888 888</span></a></li>
                </ul>
            </div>
            <div class="private_right">
                <!-- 个人中心->显示用户基本信息 -->
                <div class="shadow private_user">
                    <div class="self_detailed">
                        <div class="private_headerImg">
                            <img src="{{ asset('Images/default.png') }}"/>
                        </div>
                        <h1>个人信息 </h1>
                        <span class="edit_button"><img src="{{ asset('Images/editor.png') }}" onclick="        alert($('#p_menu').parent().parent().height());"> 编辑</span>
                        <hr />
                        <table>
                            <tr>
                                <td style="width: 65%">姓名：<span class="private_username"></span></td>
                                <td>角色：<span class="private_role"></span></td>
                            </tr>
                            <tr>
                                <td>性别：<span class="private_sex"></span></td>
                                <td>用户ID：<span class="private_user_id"></span></td>
                            </tr>
                            <tr>
                                <td>所在门店：<span class="private_store"></span></td>
                                <td>手机号：<span class="private_telephone"></span></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- 个人中心->修改密码 -->
                <div class="shadow private_reset_passowrd">
                    <div class="prompt">
                        <span>
                            温馨提示:<br />
                            为了保护你的账号安全,请不要把老卡量尺包的密码设置与（论坛、邮箱、聊天工具等）相同；
                        </span>
                    </div>
                    <div class="input_password">
                        <label><img src="{{ asset('Images/reset_pass.png') }}"><input type="password" name="oldpass" placeholder="请输入原密码"></label>
                        <label class="new_password"><img src="{{ asset('Images/reset_pass.png') }}"><input type="password" name="newpass" placeholder="请输入新密码"></label>
                        <label><img src="{{ asset('Images/reset_pass.png') }}"><input type="password" name="confirmpass" placeholder="请确认新密码"></label>
                        <label class="confirm_rule"><span>（需与新密码相同）</span></label>
                        <button onclick="change_password()">确定</button>
                        <span class="forget_password"><b>忘记密码?</b>请拨打客服热线：400 888 888</span>
                    </div>
                </div>
                <!-- 个人中心->数据中心 -->
                <div class="shadow private_data_center">
                    <div class="data_management">
                        <div class="data_center_1"><a href="#recording"><img name="recording" src="{{ asset('Images/recording.png') }}"><span>录音</span></a></div>
                        <div class="data_center_2"><a href="#album"><img name="album" src="{{ asset('Images/album.png') }}"><span>相册</span></a></div>
                        <div class="data_center_3"><img onclick="confirm_clear()" src="{{ asset('Images/clear_data.png') }}"><span>清除空白客户</span></div>
                        <div class="data_center_4"><img src="{{ asset('Images/recover_data.png') }}"><span>恢复历史客户</span></div>
                    </div>
                </div>
                <!-- 个人中心->用户反馈 -->
                <div class="shadow private_feedback">
                    <p>意见反馈</p>
                    <textarea placeholder="请输入你对我们APP的改善意见"></textarea>
                    <button>
                        提交
                    </button>
                </div>
                <!-- 个人中心->关于我们 -->
                <div class="shadow private_about_us">
                    <div class="about_us_img">
                        <img src="{{ asset('Images/u526.jpg') }}">
                    </div>
                    <p>
                        团队精神的形成并不要求团队成员牺牲自我，相反，挥洒个性、表现特长保证了成员共同完成任务目标，而明确的协作意愿和协作方式则产生了真正的内心动力。团队精神是组织文化的一部分，良好的管理可以通过合适的组织形态将每个人安排至合适的岗位，充分发挥集体的潜能。如果没有正确的管理文化，没有良好的从业心态和奉献精神，就不会有团队精神。
                    </p>
                </div>
                <!-- 个人中心->信息推荐 -->
                <div class="shadow private_message">
                    <ul class="message_list">
                        <li>
                            <img src="{{ asset('Images/u521.jpg') }}">
                            <div>
                                <span class="message_title">【全套】量尺宝的使用教程</span><br />
                                <span class="message_date">更新于2016-12-30</span>
                            </div>
                        </li>
                        <li>
                            <img src="{{ asset('Images/u521.jpg') }}">
                            <div>
                                <span class="message_title">【全套】量尺宝的使用教程</span><br />
                                <span class="message_date">更新于2016-12-30</span>
                            </div>
                        </li>
                        <li>
                            <img src="{{ asset('Images/u521.jpg') }}">
                            <div>
                                <span class="message_title">【全套】量尺宝的使用教程</span><br />
                                <span class="message_date">更新于2016-12-30</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel" title="添加临时客户" id="add_customer" data-footer="none">
            <div class="add_customer_interface">
                <form method="post" action="{{ url('/add_customer_do') }}" onsubmit=" return add_customer_do()" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="add_interface">
                        <label>
                            <div class="default_header">
                                <input type="file" name="picture" id="header_img" onchange="upload_header()" >
                                <img src="{{ asset('Images/default.png') }}">
                            </div>
                        </label>
                        <div class="customer_form">
                            <span class="add_username">姓名：<input name="username" type="text" value=" "></span>
                            <span class="add_sex">性别：
                                <label class="sex_man"><input name="sex" type="radio" value="1" checked="true">男<img class="sex_img_man" src="{{ asset('Images/sex@2x.png') }}"><img class="sex_true" src="{{ asset('Images/true.png') }}"></label>
                                <label class="sex_woman"><input name="sex" type="radio" value="0">女<img class="sex_img_woman" src="{{ asset('Images/sex@2x_34.png') }}"><img class="sex_true" style="display: none" src="{{ asset('Images/true.png') }}"></label>
                            </span>
                            <span class="add_address">地址：<input name="address" type="text"></span>
                            <span class="add_telephone">电话：<input name="telephone" type="text"></span>
                            <span class="add_wechat">微信：<input name="wechat" type="text"></span>
                            <span class="add_budget">装修预算：<br />
                                <label class="budget_true">5-8万以下<input type="radio" name="budget" value="1" checked="true"></label>
                                <label>8-12万<input type="radio" name="budget" value="2"></label>
                                <label>12-18万<input type="radio" name="budget" value="3"></label>
                                <label>18-25万<input type="radio" name="budget" value="4"></label>
                                <label>其它<input type="radio" name="budget" value="5"></label>
                            </span>
                            <span class="add_scheme_time">看方案时间：<input name="scheme_time" type="text"></span>
                        </div>
                    </div>
                    <div class="add_customer_button">
                        <button type="submit">保存</button>
                        <button type="reset">取消</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="panel" title="编辑客户信息" id="edit_customer" data-load="loadeEditor">
            <form method="post" action="{{ url('/edit_customer_do') }}" onsubmit=" return add_customer_do()" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="add_customer_interface">
                    <div class="add_interface">
                        <label>
                            <div class="default_header">
                                <input type="file" name="picture" id="header_img" onchange="upload_header()" >
                                <img src="{{ asset('Images/default.png') }}">
                            </div>
                        </label>
                        <div class="customer_form">
                            <span class="add_username">姓名：<input name="edit_username" type="text"></span>
                            <span class="add_sex">性别：
                            <label class="sex_man"><input name="edit_sex" type="radio" value="1" checked="true">男<img class="sex_img_man" src="{{ asset('Images/sex@2x.png') }}"><img style="display: none" class="sex_true" src="{{ asset('Images/true.png') }}"></label>
                            <label class="sex_woman"><input name="edit_sex" type="radio" value="0">女<img class="sex_img_woman" src="{{ asset('Images/sex@2x_34.png') }}"><img style="display: none" class="sex_true" src="{{ asset('Images/true.png') }}"></label>
                        </span>
                            <span class="add_address">地址：<input name="edit_address" type="text"></span>
                            <span class="add_telephone">电话：<input name="edit_telephone" type="text"></span>
                            <span class="add_wechat">微信：<input name="edit_wechat" type="text"></span>
                            <span class="add_budget">装修预算：<br />
                            <label>5-8万以下<input type="radio" name="edit_budget" value="1"></label>
                            <label>8-12万<input type="radio" name="edit_budget" value="2"></label>
                            <label>12-18万<input type="radio" name="edit_budget" value="3"></label>
                            <label>18-25万<input type="radio" name="edit_budget" value="4"></label>
                            <label>其它<input type="radio" name="edit_budget" value="5"></label>
                        </span>
                            <span class="add_scheme_time">看方案时间：<input name="edit_scheme_time" type="text"></span>
                        </div>
                    </div>
                    <div class="add_customer_button">
                        <button type="submit">保存</button>
                        <button type="button" onclick="$.ui.loadContent('#measure',false,false,'slide')">取消</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="panel" title="录音数据" id="recording">
            <div class="private_left">
                <ul class="private">
                    <li class="relay_data stage" name="user">
                        <div>
                            <img src="{{ asset('Images/default.png') }}"><br />
                        </div>
                        <span class="self_name"></span><br />
                        <span class="identity"></span>
                    </li>
                    <li class="relay_data" name="reset_passowrd"><img src="{{ asset('Images/resetpass.png') }}">修改密码</li>
                    <li onclick="$.ui.loadContent('#measure',false,false,'slide')"><img src="{{ asset('Images/customer.png') }}">我的客户</li>
                    <li class="private_data_click"><img src="{{ asset('Images/data.png') }}">数据中心</li>
                    <li onclick="recommend()"><img src="{{ asset('Images/recommend.png') }}">推荐给朋友</li>
                    <li class="relay_data" name="message"><img src="{{ asset('Images/message.png') }}">信息推荐</li>
                    <li class="relay_data" name="about_us"><img src="{{ asset('Images/about_us.png') }}">关于我们</li>
                    <li class="relay_data"><img src="{{ asset('Images/help.png') }}">使用帮助</li>
                    <li class="relay_data"><img src="{{ asset('Images/agreement.png') }}">服务条款</li>
                    <li class="relay_data" name="feedback"><img src="{{ asset('Images/feedback.png') }}">用户反馈</li>
                    <li onclick="set_bluetooth()"><img src="{{ asset('Images/bluetooth.png') }}">蓝牙设置</li>
                    <li class="relay_data"><img src="{{ asset('Images/clear.png') }}">清除缓存</li>
                    <li class="relay_data"><img src="{{ asset('Images/update.png') }}">版本更新</li>
                    <li><img src="{{ asset('Images/meassage.png') }}">服务热线：<span class="meassage_telephone">400 888 888</span></li>
                </ul>
            </div>
            <div class="private_right">
                <div class="private_recording" style="display:block;">
                    <div class="recording_box">
                        <p>2016年12月30日<span>星期五</span></p>
                        <ul class="recording_list">
                            <li><img src="{{ asset('Images/recording_log.png') }}"><span>5` 30</span><span class="record_date">2016-12-30</span><img src="{{ asset('Images/recording_run.png') }}"></li>
                            <li><img src="{{ asset('Images/recording_log.png') }}"><span>5` 30</span><span class="record_date">2016-12-30</span><img src="{{ asset('Images/recording_run.png') }}"></li>
                            <li><img src="{{ asset('Images/recording_log.png') }}"><span>5` 30</span><span class="record_date">2016-12-30</span><img src="{{ asset('Images/recording_run.png') }}"></li>
                        </ul>
                    </div>
                    <div class="recording_box">
                        <p>2016年12月30日<span>星期五</span></p>
                        <ul class="recording_list">
                            <li><img src="{{ asset('Images/recording_log.png') }}"><span>5` 30</span><img src="{{ asset('Images/recording_run.png') }}"></li>
                            <li><img src="{{ asset('Images/recording_log.png') }}"><span>5` 30</span><span class="record_date">2016-12-30</span><img src="{{ asset('Images/recording_run.png') }}"></li>
                            <li><img src="{{ asset('Images/recording_log.png') }}"><span>5` 30</span><span class="record_date">2016-12-30</span><img src="{{ asset('Images/recording_run.png') }}"></li>
                            <li><img src="{{ asset('Images/recording_log.png') }}"><span>5` 30</span><span class="record_date">2016-12-30</span><img src="{{ asset('Images/recording_run.png') }}"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel" title="相册" id="album">
            <div class="private_left">
                <ul class="private">
                    <li class="relay_data stage" name="user">
                        <div>
                            <img src="{{ asset('Images/default.png') }}"><br />
                        </div>
                        <span class="self_name"></span><br />
                        <span class="identity"></span>
                    </li>
                    <li class="relay_data" name="reset_passowrd"><img src="{{ asset('Images/resetpass.png') }}">修改密码</li>
                    <li onclick="$.ui.loadContent('#measure',false,false,'slide')"><img src="{{ asset('Images/customer.png') }}">我的客户</li>
                    <li class="private_data_click"><img src="{{ asset('Images/data.png') }}">数据中心</li>
                    <li onclick="recommend()"><img src="{{ asset('Images/recommend.png') }}">推荐给朋友</li>
                    <li class="relay_data" name="message"><img src="{{ asset('Images/message.png') }}">信息推荐</li>
                    <li class="relay_data" name="about_us"><img src="{{ asset('Images/about_us.png') }}">关于我们</li>
                    <li class="relay_data"><img src="{{ asset('Images/help.png') }}">使用帮助</li>
                    <li class="relay_data"><img src="{{ asset('Images/agreement.png') }}">服务条款</li>
                    <li class="relay_data" name="feedback"><img src="{{ asset('Images/feedback.png') }}">用户反馈</li>
                    <li onclick="set_bluetooth()"><img src="{{ asset('Images/bluetooth.png') }}">蓝牙设置</li>
                    <li class="relay_data"><img src="{{ asset('Images/clear.png') }}">清除缓存</li>
                    <li class="relay_data"><img src="{{ asset('Images/update.png') }}">版本更新</li>
                    <li><img src="{{ asset('Images/meassage.png') }}">服务热线：<span class="meassage_telephone">400 888 888</span></li>
                </ul>
            </div>
            <div class="private_right">
                <div class="private_album" style="display: block">
                    <div class="album_box">
                        <p>2016年12月30日<span>星期五</span><span>共<b>3</b>张</span></p>
                        <ul class="album_list">
                            <li><img src="{{ asset('Images/u521.jpg') }}"></li>
                            <li><img src="{{ asset('Images/u521.jpg') }}"></li>
                            <li><img src="{{ asset('Images/u521.jpg') }}"></li>
                            <li><img src="{{ asset('Images/u521.jpg') }}"></li>
                        </ul>
                    </div>
                    <div class="album_box">
                        <p>2016年12月30日<span>星期五</span><span>共<b>3</b>张</span></p>
                        <ul class="album_list">
                            <li><img src="{{ asset('Images/u521.jpg') }}"></li>
                            <li><img src="{{ asset('Images/u521.jpg') }}"></li>
                            <li><img src="{{ asset('Images/u521.jpg') }}"></li>
                            <li><img src="{{ asset('Images/u521.jpg') }}"></li>
                        </ul>
                    </div>
                    <div class="album_box">
                        <p>2016年12月30日<span>星期五</span><span>共<b>3</b>张</span></p>
                        <ul class="album_list">
                            <li><img src="{{ asset('Images/u521.jpg') }}"></li>
                            <li><img src="{{ asset('Images/u521.jpg') }}"></li>
                            <li><img src="{{ asset('Images/u521.jpg') }}"></li>
                            <li><img src="{{ asset('Images/u521.jpg') }}"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel" title="客户名" id="measure_log" data-load="loadMeasure_log" data-footer="none">
            <div class="measure_log_body">
                <h1 style="background-color: #FFFFFF;border: 0px;height: 76px;padding-top: 36px;;font-size: 1.4em;padding-left:5%">量尺记录:</h1>
                <ul id='room_size'>
                    <li>
                        <div class="measure_picture">
                            <img src="{{ asset('Images/u521.jpg') }}">
                        </div>
                        <span class="log_room_name">客餐厅</span><span class="log_picture_num">2/2张</span>
                    </li>
                    <li>
                        <div class="measure_picture">
                            <img src="{{ asset('Images/u521.jpg') }}">
                        </div>
                        <span class="log_room_name">客餐厅</span><span class="log_picture_num">2/2张</span>
                    </li>
                    <li>
                        <div class="measure_picture">
                            <img src="{{ asset('Images/u521.jpg') }}">
                        </div>
                        <span class="log_room_name">客餐厅</span><span class="log_picture_num">2/2张</span>
                    </li>
                </ul>
            </div>
            <div class="measure_log_bottom">
                <a href="#go_measurement">新建房间</a>
                <img onclick="upload_measure()" style="height: 52px;float: right;margin-right: 2%;margin-top: 4px;margin-bottom: 4px" src="{{ asset('Images/upload_img.png') }}">
            </div>
        </div>
        <div class="panel" title="房间名" id="measure_count" data-load="loadMeasure_count" data-footer="none">
            <div class="directory">
                <ul>
                    <li><img src="{{ asset('Images/camera_img.png') }}"></li>
                    <li><img src="{{ asset('Images/file_img.png') }}"></li>
                    <li><img src="{{ asset('Images/u524.jpg') }}"><span class="curtain">风格主题搭配</span></li>
                    <li><img src="{{ asset('Images/u524.jpg') }}"></li>
                    <li><img src="{{ asset('Images/u524.jpg') }}"><span class="curtain">款式编号</span></li>
                    <li><img src="{{ asset('Images/u524.jpg') }}"></li>
                    <li><img src="{{ asset('Images/recording.png') }}"></li>
                </ul>
            </div>
            <div class="footer_toolbar">
                <span style="float: left">
                    房间预算：
                </span>
                <label><input type="radio" name="room_budget" value="1" checked="true">5-8万以下</label>
                <label><input type="radio" name="room_budget" value="2">8-12万</label>
                <label><input type="radio" name="room_budget" value="3">12-18万</label>
                <label><input type="radio" name="room_budget" value="4">18-25万</label>
                <label><input type="radio" name="room_budget" value="5">其它</label>
                <span class="footer_toolbar_span"><img src="{{ asset('Images/voice.png') }}"><img src="{{ asset('Images/picture.png') }}"></span>
                <a href="#lf" class="go_lf">绘制房间</a>
            </div>
        </div>
        <div class="panel" data-footer="none" data-load="loadLf" data-header="header_lf" id="lf">



            <!-- 顶部工具条 -->
            {{--<div id="lf_stage">--}}

            {{--</div>--}}

            <!-- canvas画布 -->
            <div id="canvas1Box">
                <div id="compassBox">
                    <p>N</p>
                    <span id="compassBor">
					<img id="compass" src="{{ asset('Images/compass.png') }}"/>
				</span>

                </div>
                <canvas id="canvas1">您的设备不支持绘画</canvas>
            </div>

            <!-- 底部工具栏 -->
            <div class="lf_tools">

                <!-- 第一个阶段的工具 -->
                <div id="lf_tool">

                    <!-- 左边工具 -->
                    <div class="btn-group">
                        <button id="lf_move" class="btn"></button>

                        <!-- 墙体阶段 -->
                        <span id="procedure0" class="btnBox btnBoxa">
						<button class="btn" id="lf_tool_rect"></button>					<!--矩形工具-->
						<button class="btn" id="lf_tool_polygon"></button>				<!--T形工具-->
						<button class="btn btna" id="lf_tool_custom"></button>			<!--手绘工具-->
						<button class="btn" id="lf_tool_empty"></button>				<!--清空工具-->
						<button class="btn btn_tape"></button>							<!--录音工具-->
						<button class="btn btn_photo"></button>							<!--图片工具-->
						<button class="btn" id="lf_tool_annul"></button>				<!--撤销工具-->
					</span>

                        <!-- 门窗阶段 -->
                        <span id="procedure1" class="btnBox">
						<button class="btn" id="lf_tool_insertDoor">插入门窗</button>		<!--插入门窗工具-->
						<button class="btn btn_tape"></button>							<!--录音工具-->
						<button class="btn btn_photo"></button>							<!--图片工具-->
					</span>

                        <!-- 量尺阶段 -->
                        <span id="procedure2" class="btnBox">
						<button class="btn parm" id="lf_tool_ceiling">天花高</button>		<!--天花高工具-->
						<button class="btn parm" id="lf_tool_parm">参数设置</button>		<!--门窗参数设置工具-->
						<button class="btn parm" id="lf_tool_wallSize">墙体尺寸</button>	<!--墙体尺寸工具-->
						<button class="btn parm" id="lf_tool_wallLong">墙体总长</button>	<!--墙体总长工具-->
						<button class="btn btn_tape"></button>							<!--录音工具-->
						<button class="btn btn_photo"></button>							<!--图片工具-->
					</span>

                        <!-- 家具阶段 -->
                        <span id="procedure3" class="btnBox">
						<button class="btn" id="lf_tool_insertFurnit"></button>			<!--插入家具工具-->
						<button class="btn" id="lf_tool_suggest"></button>				<!--推荐方案工具-->
						<button class="btn btn_tape"></button>							<!--录音工具-->
						<button class="btn btn_photo"></button>							<!--图片工具-->
						<button class="btn" id="lf_tool_scale"></button>				<!--尺子工具-->
						<button class="btn" id="lf_tool_emptyFurnit"></button>			<!--清空家具工具-->
					</span>
                    </div>

                    <!-- 右边工具 -->
                    <div class="btnGroup">
                        <button class="btn" id="lf_tools_mediacy"></button>					<!--居中工具-->
                        <button class="btn" id="lf_tools_ruler"></button>					<!--标尺工具-->
                        <button class="btn" id="lf_tools_big"></button>						<!--放大工具-->
                        <button class="btn" id="lf_tools_small"></button>					<!--缩小工具-->
                    </div>

                </div>	<!-- id="lf_tool"结束标签 -->

                <!-- 插入门窗弹出框 -->
                <div id="lf_tools_doors">
                    <i id="lf_tools_doors_arrow"></i>
                    <span id="lf_tools_PTC" class="tools"></span>							<!--普通窗-->
                    <span id="lf_tools_PC" class="tools"></span>							<!--飘窗-->
                    <span id="lf_tools_DKM" class="tools"></span>							<!--单开门-->
                    <span id="lf_tools_YTM" class="tools"></span>							<!--阳台门-->
                    <span id="lf_tools_Z" class="tools"></span>								<!--柱-->
                    <span id="lf_tools_L" class="tools"></span>								<!--梁-->
                    <span id="lf_tools_QD" class="tools"></span>							<!--墙洞-->
                    <span id="lf_tools_ZJC" class="tools"></span>							<!--转角窗-->
                    <span id="lf_tools_ZJPC" class="tools"></span>							<!--转角飘窗-->
                    <span id="lf_tools_SKM" class="tools"></span>							<!--双开门-->
                    <span id="lf_tools_TLM" class="tools"></span>							<!--推拉门-->
                    <span id="lf_tools_ZDM" class="tools"></span>							<!--折叠门-->
                </div>

                <!-- 底部工具的弹出菜单 -->
                <div id="lf_tools_furnits">
                    <p>插入家具</p>
                    <div id="lf_tools_furnits_box">
                        <span id="lf_tools_WNTB" class="tools"></span>						<!--万能图标-->
                        <span id="lf_tools_YMWC" class="tools"></span>						<!--1.5米床-->
                        <span id="lf_tools_YMBC" class="tools"></span>						<!--1.8米床-->
                        <span id="lf_tools_DYG" class="tools"></span>						<!--大衣柜-->
                        <span id="lf_tools_DYHYG" class="tools"></span>						<!--大圆弧衣柜-->
                        <span id="lf_tools_DYHYG2" class="tools"></span>					<!--大圆弧衣柜2-->
                        <span id="lf_tools_CTG" class="tools"></span>						<!--床头柜-->
                        <span id="lf_tools_SZT" class="tools"></span>						<!--梳妆台-->
                        <span id="lf_tools_SZ" class="tools"></span>						<!--书桌-->
                        <span id="lf_tools_SG" class="tools"></span>						<!--书柜-->
                        <span id="lf_tools_DSG" class="tools"></span>						<!--电视柜-->
                        <span id="lf_tools_YJ" class="tools"></span>						<!--衣架-->
                    </div>
                </div>

            </div> <!-- class="lf_tools" 结束标签 -->

            <div id="popupUI">

                <div id="furnit_popup" class="popupBox">
                    <p class="popupName">家具</p>
                    <div class="popup_box">

                        <div id="furnit_btn">
                            <button id="furnit_btn_turn" class="popup_btn">旋转</button>
                            <button id="furnit_btn_del" class="popup_btn">删除</button>
                        </div>

                        <hr>

                        <div id="furnit_content">
                            <p class="popup_content_box">
                                <span class="inPopup popup_name">家具名：</span>
                                <input type="text" id="furnit_popup_n" class="inPopup popup_text">
                                <span class="inPopup popup_unit">mm</span>
                            </p>
                            <p class="popup_content_box">
                                <span class="inPopup popup_name">长：</span>
                                <input type="text" id="furnit_popup_l" class="inPopup popup_text">
                                <span class="inPopup popup_unit">mm</span>
                            </p>
                            <p class="popup_content_box">
                                <span class="inPopup popup_name">宽：</span>
                                <input type="text" id="furnit_popup_w" class="inPopup popup_text">
                                <span class="inPopup popup_unit">mm</span>
                            </p>
                        </div>

                        <hr>
                        <div class="furnit_note_box" id="furnit_berth">
                            <span class="furnit_note">停靠：</span>
                            <span id="furnit_berth_btn">
							<i id="furnit_berth_btn_dot"></i>
						</span>
                        </div>

                        <hr>
                        <div class="furnit_note_box">
                            <span class="furnit_note">造型款式：</span>
                            <input type="text" id="furnit_popup_style" class="popup_text" placeholder="请输入款式">
                        </div>

                        <hr>
                        <div class="furnit_note_box">
                            <span class="furnit_note">需求备注：</span>
                            <input type="text" id="furnit_popup_note" class="popup_text" placeholder="请输入备注">
                        </div>

                        <hr>
                        <div id="furnit_okno">
                            <button id="furnit_popup_no">取消</button>
                            <button id="furnit_popup_ok">确定</button>
                        </div>

                    </div>	<!-- popup_box结束标签 -->
                </div>	<!-- furnit_popup结束标签 -->

                <div id="door_popup" class="popupBox">
                    <p class="popupName" id="door_popup_name">门窗</p>
                    <div class="popup_box">
                        <div id="door_popup_content"></div>
                        <div id="door_okBox">
                            <button class="popup_finder">测距仪录入</button>
                            <button class="popup_ok" id="door_popup_ok">确定</button>
                        </div>
                    </div>
                </div>	<!-- door_popup结束标签 -->

                <div id="wall_popup" class="popupBox">
                    <p class="popupName" id="wall_popup_name">墙体</p>
                    <div class="popup_box">
                        <div id="wall_popup_content">
                            <p class="popup_content_box">
                                <span class="inPopup popup_name">尺寸：</span>
                                <input type="number" class="inPopup popup_text popup_number" min="10" id="wall_popup_size">
                                <span class="inPopup popup_unit">mm</span>
                            </p>
                            <p class="popup_content_box">
                                <span class="inPopup popup_name">面积：</span>
                                <input type="number" class="inPopup popup_text popup_number" min="10" id="wall_popup_area">
                                <span class="inPopup popup_unit">m<sup>2</sup></span>
                            </p>
                            <p class="popup_content_box">
                                <span class="inPopup popup_name">天花高度：</span>
                                <input type="number" class="inPopup popup_text popup_number" min="10" id="wall_popup_ceiling">
                                <span class="inPopup popup_unit">mm</span>
                            </p>
                        </div>
                        <div id="wall_okBox">
                            <button class="popup_finder">测距仪录入</button>
                            <button class="popup_ok" id="wall_popup_ok">确定</button>
                        </div>
                    </div>
                </div>	<!-- door_popup结束标签 -->


            </div>	<!-- popupUI结束标签 -->

        </div>
        <div class="panel" id="ssl" data-footer="none" data-load="loadSsl" data-header="none">
            {{--<div id="ssl" style="display:block">--}}
            <div id="ssl_box">
                <img src="{{ asset('Images/1.jpg') }}" id="canvas2Bg">
                <canvas id="canvas2">您的设备不支持绘制</canvas>
            </div>

            <div id="ssl_tools">
                <div id="ssl_items">
                    <span  id="tools_line" class="tools">直线</span>
                    <span  id="tools_text" class="tools">文字</span>
                    <!-- <span  id="tools_addS" class="tools">保存</span>
                    <span  id="tools_addO" class="tools">打开</span> -->
                </div>
                <div id="ssl_edit">
                    <span class="icoFont icoFont-trash"></span>
                    <input type="number" class="ssl_text" placeholder="请输入距离，单位：mm" maxlength="6">
                    <span class="icoFont icoFont-ok"></span>
                </div>
            </div>	<!-- id="ssl_tools"结束标签 -->
            {{--</div>	<!-- id="ssl"结束标签 -->--}}
        </div>
        <div class="panel" data-footer="none" id="design">
            <header style="height:64px">
                <a id="backButton" class="button" style="visibility: visible;position: absolute;z-index:2"> </a>
                <h1 style="position: absolute;top:20px;left:0px;position: absolute;top:0px">选择造款类型</h1>
                <a class="button" style="visibility: visible;position: absolute;right: 20px;top:18px;font-size: 1.4em;z-index:2">确定</a>
            </header>
            <div>
                <div style="width:15%;height:100%;background-color: #f1f1f1;position:absolute;left:0px;border:0px">
                    <ul class="design_left">
                        <li>衣柜</li>
                        <li class="left_pitch_on">衣柜内部结构</li>
                        <li>衣柜功能件</li>
                        <li>移门</li>
                        <li>掩门</li>
                    </ul>
                </div>
                <div style="width:85%;height:80%;position:absolute;right:0px;border:0px">
                    <ul class="design_top">
                        <li class="top_pitch_on">衣柜到顶</li>
                        <li>上掩下移</li>
                        <li>顶柜延伸</li>
                    </ul>
                    <div class="design_explain">
                        <ul class="design_right">
                            <li><img src="{{ asset('Images/u521.jpg') }}"><span class="design_label">款式编号...</span><div class="design_bdge"></div></li>
                            <li><img src="{{ asset('Images/u521.jpg') }}"></li>
                            <li><img src="{{ asset('Images/u521.jpg') }}"></li>
                            <li><img src="{{ asset('Images/u521.jpg') }}"></li>
                            <li><img src="{{ asset('Images/u521.jpg') }}"></li>
                            <li><img src="{{ asset('Images/u521.jpg') }}"></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div style="width: 100%;position: absolute;bottom: 40px;height: 14.5%;padding-top:2%;background-color: #f1f1f1;border-top: 1px solid #d4d4d4">
                <textarea style="height: 100%;width:94%;margin-left: 3%;font-size: 1.4em;border: 0px;background-color: #FFFFFF;outline: none" placeholder="可输入备注信息"></textarea>
            </div>
            <div class="footer_design"><img src="{{ asset('Images/voice_2.png') }}"><img src="{{ asset('Images/picture.png') }}"></div>
        </div>
    </div>
    <div id="navbar">
        <a href="#measure" id='navbar_measure'><img src="{{ asset('Images/f_measure.png') }}"></a>
        <a href="#scheme" id='navbar_scheme'><img src="{{ asset('Images/f_scheme.png') }}"></a>
        <a href="#activity" id='navbar_activity'><img src="{{ asset('Images/f_activity.png') }}"></a>
        <a href="#private" id='navbar_private'><img src="{{ asset('Images/f_private.png') }}"></a>
    </div>
    <div id="bluetooth_set" style="display: none">
        <div class="bluetooth_set">
            <span>使用蓝牙测距仪 <label><input class="mui-switch" type="checkbox"></label></span>
            <span>蓝牙连续标注<label><input class="mui-switch" type="checkbox"></label></span>
        </div>
    </div>
</div>
</body>
    <script type="text/javascript" src="{{ asset('/Js/jquery.cookie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('Js/jquery.divas-1.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/layer/layer.js') }}"></script>

    <script>
        var info = {'prefix':false,'customer_id':false,'theme_id':false,'match_id':false,'room_id':false};
        var sex_headerImg = {
            '0':"{{ asset('Images/woman_header.png') }}",
            '1':"{{ asset('Images/man_header.png') }}"
        };
        var room_name = null;
        //禁止header切换动画
        $.ui.animateHeaders = false;
        //设置后退按钮文字
        $.ui.backButtonText = " ";

        //载入量房与随手量
        canvasInit();

        function loadLf() {
            //量房初始化
            lf.goin();
        }

        function loadSsl() {
            //随手量初始化
            ssl.goin();
        }

        //上传量尺
        function upload_measure() {
            var measure_data = info;
            measure_data['data'] =JSON.parse(sessionStorage.getItem(info.prefix+info.customer_id));
            $.ajax({
                url:"{{ url('/upload_measure') }}",
                type:'post',
                data:data,
                success:function (res) {
                    if(res.status == 1){
                        layer.msg('量尺上传成功!');
                    }
                }
            });
        }

        //量房信息列表绑定点击事件
        $('#room_size>li').on('click',function(){
            room_name = $(this).find('.log_room_name').text();
            $.ui.loadContent('#measure_count',false,false,'slide');
        });

        //进入选择房间
        function go_choose_room() {
            info.theme_id=$('.theme_on').val();
            info.match_id=$('.theme_pitch_on').val();
            $.ui.loadContent('#choose_room',false,false,'slide');
        }

        //设置量尺页面header头
        function loadMeasure_log() {
            var username = $('.customer_on .true_name').find('.username').text();
            $('#room_size>li').on('longTap',edit_room);
            setTimeout(function () {
                $.ui.setTitle(username);
            },1);
        }

        //弹出提示 是否修改房间
        function edit_room() {
            var room_name = $(this).find('.log_room_name').text();
            $("#afui").popup({
                title: room_name,
                cancelText: "修改房间信息",
                cancelCallback: function () {
                    $('#afui').popup({
                        title:'修改房间信息',
                        message:'<label class="edit_room_name">房间名称:<input name="room_name" type="text"></label><label class="edit_room_type">房间类型:<select><option value="1">主卧室</option></select></label>',
                        cancelText: "取消",
                        doneText:'确定'
                    });
                },
                doneText: "删除房间",
                doneCallback: function () {
                    console.log("删除");
                },
                cancelOnly: false
            });
        }

        //设置量尺显示页面header头{
        function loadMeasure_count() {
            setTimeout(function () {
                $.ui.setTitle(room_name);
            },1);
        }

        //图片轮播插件初始化
        function loadeCollocation() {
            if($('.divas-slide-container>li').length > 2){
                $("#slider").divas({
                    slideTransitionClass: "divas-slide-transition-left",
                    titleTransitionClass: "divas-title-transition-left",
                    titleTransitionParameter: "left",
                    titleTransitionStartValue: "-999px",
                    titleTransitionStopValue: "0px",
                    wingsOverlayColor: "rgba(0,0,0,0.6)"
                });
            }else{
                setTimeout(function () {
                    $.ui.loadContent('#scheme');
                }, 1);
            }
        }

        //搭配图片点击事件
        function show_collocation_details() {
            var theme_id = $('.scheme_theme_on').val();
            var match_id = $(this).val();
            $.ajax({
                url: "{{ url('/get_img') }}",
                type: 'POST',
                data: {
                    theme_id:theme_id,
                    match_id:match_id
                },
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                success: function (result) {
                    result = JSON.parse(result);
                    if (result.status == '1' || result.status == 1) {
                        $('.divas-slide-container').html('');
                        var aa = "{{ asset('Images') }}";
                        for(var i=0;i<result.retData.length;i++){
                            $('.divas-slide-container').append('<li class="divas-slide"><img data-src="'+aa+'/'+result.retData[i].picture+'"/></li>');
                        }
                        $.ui.loadContent('#collocation_album',false,false,'slid');
                    }
                }
            });
        }

        //改变footer栏图片
        function change_footer_img() {
            var aa = "{{ asset('Images') }}";
            $('#navbar_measure>img').attr('src',aa+'/f_measure.png');
            $('#navbar_scheme>img').attr('src',aa+'/f_scheme.png');
            $('#navbar_activity>img').attr('src',aa+'/f_activity.png');
            $('#navbar_private>img').attr('src',aa+'/f_private.png');
        }

        //编辑临时客户 sex change事件
        $('input:radio[name=edit_sex]').change(function () {
            $('.sex_true').hide();
            $(this).parent().find('.sex_true').show();
        })

        //添加临时客户 sex change事件
        $('input:radio[name=sex]').click(function () {
            $('.sex_true').hide();
            $(this).parent().find('.sex_true').show();
        })

        //添加临时客户 budget change事件
        $('input:radio[name=edit_budget]').change(function () {
            $(this).parent().parent().find('.budget_true').removeClass('budget_true');
            $(this).parent().attr('class','budget_true');
        })

        //编辑临时客户 budget change事件
        $('input:radio[name=budget]').change(function () {
            $(this).parent().parent().find('.budget_true').removeClass('budget_true');
            $(this).parent().attr('class','budget_true');
        })

        //确定添加临时客户
        function add_customer_do() {
            //var picture = $('input[name=picture]').val();
            var username = $('input[name=username]').val();
            var sex = $('input[name=sex]:checked').val()
            var address = $('input[name=address]').val();
            var telephone = $('input[name=telephone]').val();
            var wechat = $('input[name=wechat]').val();
            var budget = $('input[name=budget]:checked').val();
            var scheme_time = $('input[name=scheme_time]').val();
            if(username == '' || address == '' || telephone == '' || wechat == '' || scheme_time == ''){
                layer.msg('信息需填写完整!', {icon: 5});
                return false;
            }
        }

        //选择房间页面绑定点击事件
        $('.full_screen>ul>li').on('click',function () {
            info.room_id = $(this).val();
            var url = "{{ url('/laoka') }}";
            //window.location.href= url+'?customer_id='+customer_id+'&theme_id='+theme_id+'&match_id='+match_id+'&room_id='+room_id;
            $.ui.loadContent('#lf');
        })

        //个人中心左侧菜单栏绑定点击事件
        $('.relay').on('click',show_private)

        //录音数据,相册左侧菜单栏绑定点击事件
        $('.relay_data').on('click',locacenter)

        //录音数据,相册左侧菜单栏点击事件
        function locacenter() {
            var val = $(this).attr('name');
            $.ui.loadContent('#private',false,false,'slid');
            $('.relay[name='+val+']').trigger('click');
        }

        //弹出confirm  清除空白客户
        function confirm_clear() {
            layer.open({
                type: 1
                ,title: ['清除空白客户','background-color:#ac0100;color:#ffffff;font-size:1.4em']
                ,closeBtn: false
                ,area: '300px;'
                ,shade: 0.8
                ,id: 'LAY_layuipro' //设定一个id，防止重复弹出
                ,resize: false
                ,btn: ['取消', '确定']
                ,btnAlign: 'c'
                ,moveType: 1 //拖拽模式，0或者1
                ,content: '<div style="padding: 50px;text-align: center;line-height: 22px;background-color: #FFFFFF; color: #404041; font-weight: 300;font-size: 1.2em">确定清除空白客户？</div>'
                ,success: function(){
                }
            });
        }

        //设置蓝牙
        function set_bluetooth() {
            var interface=$('#bluetooth_set').html();
            layer.open({
                type: 1
                ,title: ['蓝牙设置','font-size:1.4em;color:#ac0100;height:60px;line-height:60px']
                ,closeBtn: false
                ,area: '400px;'
                ,shade: 0.8
                ,id: 'LAY_layuipro' //设定一个id，防止重复弹出
                ,resize: false
                ,btn: ['确定']
                ,btnAlign: 'c'
                ,moveType: 1 //拖拽模式，0或者1
                ,content: interface
                ,success: function (layero) {
                    var btn = layero.find('.layui-layer-btn');
                    btn.addClass('blue_tooth_set_btn');
                }
            });
        }

        //layer弹出层 （推荐给朋友）
        function recommend() {
            var aa="{{ asset('Images/login_back.png') }}";
            layer.open({
                type: 1,
                skin: 'recommend', //样式类名
                closeBtn: 0, //不显示关闭按钮
                title:['扫描二维码','color:#ac0100;font-size:1.4em'],
                anim: 2,
                shadeClose: true, //开启遮罩关闭
                content: '<img src="'+aa+'">'
            });
        }

        //个人中心左侧菜单栏点击事件
        function show_private() {
            if($(this).attr('name') != $('.private_click').attr('name')){
                $('.private_click').removeClass('private_click');
                if($(this).attr('name') != 'user'){
                    $(this).addClass('private_click');
                }
                $('.shadow').hide();
                $('.private_'+$(this).attr('name')).show();
            }
        }

        //客户详细信息页面 进入量尺/需求确认  按钮点击事件
        function portal() {
            var val = $('.check_on').val();
            info.customer_id = $('input[name=customer_id]').val();
            if(val == 3){
                info.prefix = 'temporary';
            }else{
                info.prefix = 'formal';
                if(val == 2){
                    $.ui.loadContent('#measure_log',false,false,'slide');
                    return false;
                }
            }
            $.ui.loadContent('#go_measurement',false,false,'slide');
        }

        //客户页面加载触发事件
        function loadeCustomer() {
            change_footer_img();
            var aa = "{{ asset('Images') }}";
            $('#navbar_measure>img').attr('src',aa+'/t_measure.png');
            if(!$('.customer_on').val() && $('.customer_on').val() != 0){
                var val = $('.check_on').val();
                list_customer(val,false);
            }
        }

        //进入量尺页面触发事件
        function loadeMenu() {
            if(!$('.theme_on').val()){
                show_menu(0);
            }
        }

        //进入风格页面触发事件
        function loadeTheme() {
            change_footer_img();
            var aa = "{{ asset('Images') }}";
            $('#navbar_scheme>img').attr('src',aa+'/t_scheme.png');
            if(!$('.room_on').val()){
                get_menu(0);
                get_room(0);
            }
        }

        //进入个人中心触发事件
        function loadUser() {
            change_footer_img();
            var aa = "{{ asset('Images') }}";
            var user_data = '<?php echo $user?>';
            $('#navbar_private>img').attr('src',aa+'/t_private.png');
            if(user_data){
                user_data = JSON.parse(user_data);
                if(!$('.self_name').text()){
                    var sex = new Array();
                    var brief = user_data.u_id;
                    sex[0] = '女';
                    sex[1] = '男';
                    if(user_data.img){
                        $('.stage>img').attr('src',user_data.img);
                        $('.private_headerImg>img').attr('src',user_data.img);
                    }
                    $('.self_name').text(user_data.realname);
                    $('.private_username').text(user_data.realname);
                    $('.private_user_id').text(user_data.u_id);
                    $('.private_store').text(user_data.shop_name);
                    if(user_data.telephone){
                        $('.private_telephone').text(user_data.telephone);
                    }else{
                        $('.private_telephone').text('暂未提供');
                    }
                    if(user_data.group_name){
                        $('.private_role').text(user_data.group_name);
                        brief += '　'+user_data.group_name;
                    }else{
                        $('.private_role').text('暂未提供');
                        brief += '　暂未提供';
                    }
                    $('.identity').text(brief);
                    if(user_data.sex){
                        $('.private_sex').text(sex[user_data.sex]);
                    }else{
                        $('.private_sex').text('暂未提供');
                    }
                }
                $('#p_menu').parent().height($('#p_menu').parent().parent().height());
                $('#p_menu').parent().css('overflow','auto');

                $("#p_menu").on("swipe",function(){
                    var event = event || window.event;
                    var cy = event.touches[0].pageY;

                    $("#p_menu").on("touchmove",function(){
                        var event = event || window.event;
                        var my = event.touches[0].pageY;
                        var offsetC = $("#p_menu").offset();
                        var juli = Math.floor((my - cy)/8);
                        if(offsetC.top+juli > 120){
                            $("#p_menu").offset({top:120,left:offsetC.left});
                        }else if(offsetC.top+juli<120){
                            if(offsetC.top < $("#p_menu").parent().height()-$("#p_menu").height()+120 || offsetC.top+juli < $("#p_menu").parent().height()-$("#p_menu").height()+120){
                                $("#p_menu").offset({top:$("#p_menu").parent().height()-$("#p_menu").height()+120,left:offsetC.left});
                            }else{
                                $("#p_menu").offset({top:offsetC.top+juli,left:offsetC.left});
                            }
                        }
                    });
                    $("#p_menu").on("touchend",function(){
                        $("#p_menu").off("touchmove");
                        $("#p_menu").off("touchend");
                    });
                });
            }else{
                window.location.href='{{ url("/login") }}';
            }
        }

        //进入活动中心触发事件
        function loadActivity() {
            change_footer_img();
            var aa = "{{ asset('Images') }}";
            $('#navbar_activity>img').attr('src',aa+'/t_activity.png');
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
                                if(pid == 0){
                                    if(i == 0){
                                        $('.choose>ul').append('<li class="pitch_on" value = "'+ data.retData[i].id+'"><span class="choose_li_header">'+data.retData[i].name+'</span><div><img src="'+aa+'/'+data.retData[i].cover+'" class=""><img class="badge_img" src="'+aa+'/'+'2x_80.png" ></div><p class="explain"> <span>设计理念</span>　　'+data.retData[i].explain+'</p></li>');
                                    }else{
                                        $('.choose>ul').append('<li value="'+ data.retData[i].id+'"><span class="choose_li_header">'+data.retData[i].name+'</span><div><img src="'+aa+'/'+data.retData[i].cover+'"><img class="badge_img" src="'+aa+'/'+'2x_61.png" ></div><p class="explain"> <span>设计理念</span>　　'+data.retData[i].explain+'</p></li>');
                                    }
                                }
                            }
                            $('.choose>ul>li').on('click',check_style);
                            loadeMenu();
                        }
                    }
                });
            }
        }

        //选择房间页面加载事件
        function loadeRoom() {
            if(info.theme_id > 0 && info.match_id > 0){
                $.ajax({
                    url:"{{ url('/get_img') }}",
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                    },
                    data:{
                        theme_id:info.theme_id,
                        match_id:info.match_id
                    },
                    type:'post',
                    success:function (data) {
                        data = JSON.parse(data);
                        if(data.status){
                            var aa = "{{ asset("Images") }}";
                            var j=0;
                            for(var i=0;i<6;i++){
                                j = i + 1;
                                if(!data.retData[i] || !data.retData[i].picture){
                                    $('.full_screen>ul>li[value="'+j+'"]').find('img').attr('src',aa+'/u52'+j+'.jpg');
                                }else{
                                    $('.full_screen>ul>li[value="'+j+'"]').find('img').attr('src',aa+'/'+data.retData[i].picture);
                                }
                            }
                        }
                    }
                });
            }else{
                setTimeout(function () {
                    $.ui.loadContent('#measure');
                }, 1);
            }
        }

        //编辑客户信息页面加载事件
        function loadeEditor() {
            var designer=$('.data_list').find('input[name=customer_id]').val();
            var data = JSON.parse(sessionStorage.getItem('customers'));
            $('#edit_city').css('display','none');
            $('#edit_districe').css('display','none');
            if(designer && designer !='undefined'){
                $('#edit_customer').find('input[name=edit_designer]').val(data[designer].c_id);
                $('#edit_customer').find('input[name=edit_username]').val(data[designer].c_name);
                $('#edit_customer').find('input[name=edit_address]').val(data[designer].complete);
                $('#edit_customer').find('input[name=edit_telephone]').val(data[designer].c_phone_num);
                $('#edit_customer').find('input[name=edit_wechat]').val(data[designer].wechat);
                $('#edit_customer').find('input[name=edit_scheme_time]').val(data[designer].create_date);
                $('#edit_customer').find('input:radio[name="edit_sex"][value="'+data[designer - 1].sex+'"]').prop("checked",true);
                $('#edit_customer').find('input:radio[name="edit_sex"][value="'+data[designer - 1].sex+'"]').parent().find('.sex_true').show();;
                $('#edit_customer').find('input:radio[name="edit_budget"][value="'+data[designer - 1].budget+'"]').prop("checked",true);
                $('#edit_customer').find('input:radio[name="edit_budget"][value="'+data[designer - 1].budget+'"]').parent().attr('class','budget_true');
            }else{
                setTimeout(function () {
                    $.ui.loadContent('#measure');
                }, 1);
            }

        }

        //选择风格页面点击事件
        function check_style() {
            if($(this).attr('class') != 'pitch_on'){
                $('.pitch_on').find('.badge_img').attr('src',"{{ asset('Images/2x_61.png') }}");
                $('.pitch_on').removeClass('pitch_on');
                $(this).attr('class','pitch_on');
                $(this).find('.badge_img').attr('src',"{{ asset('Images/2x_80.png') }}");
                loadeMenu();
                $('.style_list').find('[value='+$(this).val()+']').trigger('click');

            }
        }

        //选择房间页面 点击打开蓝牙
        function open_Bluetooth() {
            $.ui.loadContent("#open_bluetooth", false, false, "none");
        }

        //获取客户列表
        function list_customer(val,_this) {
            if(_this && val == $('.check_on').val()){
                return false;
            }
            if(_this && val != $('.check_on').val()){
                $('.check_on').removeAttr("class");
                $(_this).attr('class','check_on');
            }
            $.ajax({
                url: "{{ url('/get_customer') }}",
                type: 'POST',
                data: {
                    val:val
                },
                success: function (result) {
                    var aa = "{{ asset('Images/recycle.png') }}";
                    $('.customer_list').html("");
                    result = jQuery.parseJSON(result);
                    console.log(result);
                    if(result.status == '101'){
                        window.location.href="{{ url('/') }}";
                    }
                    if (result.status == 1) {
                        sessionStorage.setItem('customers', JSON.stringify(result.retData.data));
                        if (val == 1) {
                            var j = 0;
                            for (var i = 0; i < result.retData.data.length; i++) {
                                if(!result.retData.data[i].plan_measure_date){
                                    if(j == 0){
                                        j++;
                                        customer_details(i,val);
                                    }
                                    $('.customer_list').append('<li value="'+i+'"><div class="thumbnail_small"><img src="'+sex_headerImg[0]+'"></div><div class="true_name"> <span class="username">'+result.retData.data[i].c_name+'</span><span class="contact">'+result.retData.data[i].c_phone_num+'</span></div></li>');
                                }
                            }
                        }else if (val == 2) {
                            var j = 0;
                            for (var i = 0; i < result.retData.data.length; i++) {
                                if(result.retData.data[i].plan_measure_date){
                                    if(j == 0){
                                        j++;
                                        customer_details(i,val);
                                    }
                                    $('.customer_list').append('<li value="'+i+'"><div class="thumbnail_small"><img src="'+sex_headerImg[0]+'"></div><div class="true_name"> <span class="username">'+result.retData.data[i].c_name+'</span><span class="contact">'+result.retData.data[i].c_phone_num+'</span></div></li>');
                                }
                            }
                        } else if (val == 3) {
                            for (var i = 0; i < result.retData.data.length; i++) {
                                if(i == 0){
                                    customer_details(i,val);
                                }
                                $('.customer_list').append('<li value="'+i+'"><div class="thumbnail_small"><img src="'+sex_headerImg[result.retData.data[i].sex]+'"></div><div class="true_name"> <span class="username">'+result.retData.data[i].c_name+'</span><span class="contact">'+result.retData.data[i].c_phone_num+'</span></div><button class="check_to_del"><img src="'+aa+'"></button></li>');
                            }
                        }
                        //客户列表绑定左滑动事件
                        $('.customer_list>li:not(.loss_customer)').bind('swipeLeft',del_customer);
                        //删除按钮点击事件
                        $('.check_to_del').on('click',del_customer_do);
                        //客户列表点击事件
                        $('.customer_list>li').on('click',show_customer);

                        $('.customer_list>:first').attr('class','customer_on');
                    }else{
                        $('.customer_list').append('<li class="loss_customer">'+result.retErr+'</li>');
                        $('.data_list').css('display','none');
                        $('.data_center').css('display','none');
                        $('.go_measure').css('display','none');
                    }
                }
            });

            //给客户列表绑定滑动事件
            $('#customer_list').on("touchstart",function(){
                var event = event || window.event;
                var cy = event.touches[0].pageY;

                $("#customer_list").on("touchmove",function(){
                    var event = event || window.event;
                    var my = event.touches[0].pageY;
                    var offsetC = $("#customer_list").offset();
                    var juli = Math.floor((my - cy)/8);
                    console.log(offsetC.top);
                    if(offsetC.top+juli > 200){
                        $("#customer_list").offset({top:200,left:offsetC.left});
                    }else if(offsetC.top+juli<0){
                        if(offsetC.top < $("#customer_list").parent().height()-$("#customer_list").height() || offsetC.top+juli < $("#customer_list").parent().height()-$("#customer_list").height()){
                            $("#customer_list").offset({top:$("#customer_list").parent().height()-$("#customer_list").height()+120,left:offsetC.left});
                        }else{
                            $("#customer_list").offset({top:offsetC.top+juli,left:offsetC.left});
                        }
                    }
                });
                $("#customer_list").on("touchend",function(){
                    $("#customer_list").off("touchmove");
                    $("#customer_list").off("touchend");
                });
            });
        }

        //客户列表滑动事件
        function del_customer() {
            $('.is_del_customer').removeClass('is_del_customer');
            $(this).addClass('is_del_customer');
        }

        //删除客户事件
        function del_customer_do() {
            var _this = this;
            $.ajax({
                url:'del_customer',
                data:{
                    id:$(this).parent().val()
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type:'post',
                success:function (data) {
                    if(data){
                        $(_this).parent().remove();
                    }else{
                        layer.msg('删除失败!', function(){});
                    }
                }
            });
        }

        //显示客户详细信息
        function customer_details(i,val) {
            var data = JSON.parse(sessionStorage.getItem('customers'));
            console.log(data[i]);
            if(data[i]){
                $('.header_img>img').attr('src',sex_headerImg[data[i].is_paid]);
                if(val == 2){
                    $('.go_measure>a').text('需求核对');
                }else{
                    $('.go_measure>a').text('进入量尺');
                }
                var rule_time = data[i]['measure_time'] ? data[i]['measure_time'] : '未量尺';
                var sex = new Array();
                sex[0] = '女';
                sex[1] = '男';
                var budget = new Array();
                budget[1] = '5-8万';
                budget[2] = '8-12万';
                budget[3] = '12-18万';
                budget[4] = '18-25万';
                budget[5] = '25万以上';
                budget[6] = '其它';
                $('.data_list').find('input[name=customer_id]').val(data[i].c_id);
                $('.data_list>table>tbody').find('tr:eq(0)').find('td').text(data[i].c_name);
                $('.data_list>table>tbody').find('tr:eq(1)').find('td').text(sex[data[i]['sex']]);
                $('.data_list>table>tbody').find('tr:eq(2)').find('td').text(data[i]['address']);
                $('.data_list>table>tbody').find('tr:eq(3)').find('td').text(data[i].c_phone_num);
                $('.data_list>table>tbody').find('tr:eq(4)').find('td').text(data[i]['wechat']);
                $('.data_list>table>tbody').find('tr:eq(5)').find('td').text(rule_time);
                $('.data_list>table>tbody').find('tr:eq(6)').find('td').text(budget[data[i]['budget']]);
                $('.data_list>table>tbody').find('tr:eq(7)').find('td').text(data[i]['plan_measure_date']);

                $('.data_list').css('display','block');
                $('.data_center').css('display','block');
                $('.go_measure').css('display','block');
            }
        }

        //客户点击事件
        function show_customer() {
            var i = $(this).val();
            var a = $('.is_del_customer').val();
            if(a && a == i){
                return false;
            }
            if(a && a != i){
                $('.is_del_customer').removeClass('is_del_customer');
            }else{
                var val = $('.check_on').attr('value');
                if(i != $('.customer_on').val()){
                    $('.customer_on').removeClass();
                    $(this).attr('class','customer_on');
                }
                customer_details(i,val);
            }
        }

        //风格页面获取风格主题列表
        function get_menu(pid) {
            $('.scheme_left>ul').html('');
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
                        for(var i=0;i<data.retData.length;i++){
                            if(pid == 0 && $('.scheme_style_list').length == 1){
                                if(i == 0){
                                    get_menu(data.retData[i].id);
                                    $('.scheme_style_list').append('<li class="scheme_style_on" value="'+data.retData[i].id+'"><span>'+data.retData[i].name+'</span></li>');
                                }else{
                                    $('.scheme_style_list').append('<li value="'+data.retData[i].id+'"><span>'+data.retData[i].name+'</span></li>');
                                }
                            }else{
                                if(i == 0){
                                    $('.scheme_left>ul').append('<li class="scheme_theme_on" value="'+data.retData[i].id+'">'+data.retData[i].name+'</li>');
                                    show_collocation(data.retData[i].id,1);
                                }else{
                                    $('.scheme_left>ul').append('<li value="'+data.retData[i].id+'">'+data.retData[i].name+'</li>');
                                }
                            }
                        }
                        if(pid == 0){
                            $('.scheme_style_list>li').on('click',change_style);
                        }else{
                            $('.scheme_left>ul>li').on('click',change_theme);
                            change_img();
                        }
                    }
                }
            });
        }

        //风格页面  风格点击事件
        function change_style() {
            if($(this).val() != $('.scheme_style_on').val()){
                $('.scheme_style_on').removeClass();
                $(this).attr('class','scheme_style_on');
                get_menu($(this).val());
            }
        }

        //风格页面 主题点击事件
        function change_theme() {
            if($(this).val() != $('.scheme_theme_on').val()){
                $('.scheme_theme_on').removeClass();
                $(this).attr('class','scheme_theme_on');
                change_img();
            }
        }

        //获取房间结构列表
        function get_room(pid){
            $.ajax({
                url:"{{ url('/get_room') }}",
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
                        for(var i=0;i<data.retData.length;i++){
                            if(pid == 0){
                                if(i == 0){
                                    //get_menu(data.retData[i].id);
                                    $('.li_room').append('<li class="room_on" value="'+data.retData[i].id+'"><span>'+data.retData[i].name+'</span></li>');
                                }else{
                                    $('.li_room').append('<li value="'+data.retData[i].id+'"><span>'+data.retData[i].name+'</span></li>');
                                }
                            }
                        }
                        $('.li_room>li').on('click',change_room);
                    }
                }
            });
        }

        //房间点击事件
        function change_room() {
            if($(this).val() != $('.room_on').val()){
                $('.room_on').removeClass();
                $(this).attr('class','room_on');
                change_img();
            }
        }

        //显示房间设计
        function change_img() {
            var style_id = $('.scheme_style_on').val();
            var theme_id = $('.scheme_theme_on').val();
            var room_id = $('.room_on').val();
            $('.scheme_screen>ul').html('');
            $.ajax({
                url: "{{ url('/get_img') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                data: {
                    style_id: style_id,
                    theme_id:theme_id,
                    room_id:room_id
                },
                type: 'post',
                success:function (data) {
                    data = JSON.parse(data);
                    if(data.status){
                        var aa = "{{ asset("Images") }}";
                        var j = 0;
                        for(var i=0;i<data.retData.length;i++){
                            j = i + 1;
                            $('.scheme_screen>ul').append('<li value="'+data.retData[i].match_id+'"><img src="'+aa+'/'+data.retData[0].picture+'" class="img-thumbnail"><span>搭配'+ j +'</span></li>');
                        }
                    }
                    //风格主题页面绑定点击事件
                    $('.scheme_screen>ul>li').on('click',show_collocation_details);
                }
            });
        }

        //进入量尺 获取风格主题菜单
        function show_menu(pid) {
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
                        for(var i=0;i<data.retData.length;i++){
                            if(pid == 0){
                                if(i == 0){
                                    $('.style_list').html('');
                                    show_menu(data.retData[i].id);
                                    $('.style_list').append('<li class="style_on" value="'+data.retData[i].id+'"><span>'+data.retData[i].name+'</span></li>');
                                }else{
                                    $('.style_list').append('<li value="'+data.retData[i].id+'"><span>'+data.retData[i].name+'</span></li>');
                                }
                            }else{
                                if(i == 0){
                                    $('.left>ul').html('');
                                    $('.left>ul').append('<li class="theme_on" value="'+data.retData[i].id+'">'+data.retData[i].name+'</li>');
                                    show_collocation(data.retData[i].id);
                                }else{
                                    $('.left>ul').append('<li value="'+data.retData[i].id+'">'+data.retData[i].name+'</li>');
                                }
                            }
                        }
                        if(pid == 0){
                            $('.style_list>li').on('click',style_click);
                        }else{
                            $('.left>ul>li').on('click',theme_click);
                        }
                    }
                }
            });
        }

        //进入量尺页面 风格点击事件
        function style_click() {
            if($(this).val() == $('.style_list').find('.style_on').val()){
                return false;
            }
            $('.style_list').find('.style_on').removeClass();
            $(this).attr('class','style_on');
            show_menu($(this).val());
        }

        //进入量尺页面 主题点击事件
        function theme_click() {
            if($(this).val() == $('.left').find('.theme_on').val()){
                return false;
            }
            $('.left').find('.theme_on').removeClass();
            $(this).attr('class','theme_on');
            $('.screen>ul').html('');
            show_collocation($(this).val(),1);
        }

        //进入量尺页面  显示搭配
        function show_collocation(theme_id) {
            $.ajax({
                url:"{{ url('/get_img') }}",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                type:'post',
                data:{
                    theme_id:theme_id
                },
                success:function (data) {
                    $('.screen>ul').html('');
                    data = JSON.parse(data);
                    var aa = "{{ asset("Images") }}";
                    if(data.status){
                        var j = 0;
                        for(var i=0;i<data.retData.length;i++){
                            j = i + 1;
                            if(i == 0){
                                $('.screen>ul').append('<li value="'+data.retData[i].match_id+'" class="theme_pitch_on"><img src="'+aa+'/'+data.retData[0].picture+'" class="img-thumbnail"><img class="img_badge" src="'+aa+'/2x_80.png" ><span>搭配'+j+'</span></li>');
                            }else{
                                $('.screen>ul').append('<li value="'+data.retData[i].match_id+'"><img src="'+aa+'/'+data.retData[0].picture+'" class="img-thumbnail"><img class="img_badge" src="'+aa+'/2x_61.png" ><span>搭配'+j+'</span></li>');
                            }
                        }
                    }
                    $('.screen>ul>li').on('click',collocation_click);
                }
            });
        }

        //进入量尺页面 搭配点击事件
        function collocation_click() {
            if($(this).attr('class') != 'theme_pitch_on'){
                $('.theme_pitch_on>.img_badge').attr('src',"{{ asset('Images/2x_61.png') }}");
                $('.theme_pitch_on').removeClass('theme_pitch_on');
                $(this).attr('class','theme_pitch_on');
                $(this).find('.img_badge').attr('src',"{{ asset('Images/2x_80.png') }}");
            }
        }

        //修改密码
        function change_password() {
            var oldpass = $('input[name=oldpass]').val();
            var newpass = $('input[name=newpass]').val();
            var confirmpass = $('input[name=confirmpass]').val();
            if(newpass != ''){
                if(newpass != confirmpass){
                    layer.msg(" 两次输入的密码不一致! (ง •̀_•́)ง", {icon: 5});
                }
                $.post("{{ url('/change_password') }}",{password:oldpass,newpass:newpass,re_newpass:confirmpass},function(data){
                    data = JSON.parse(data);
                    if(data.status == 1){
                        window.history.back(-1);
                        layer.msg(' 修改密码成功!', {icon: 6});
                        $('input[name=oldpass]').val('');
                        $('input[name=newpass]').val('');
                        $('input[name=confirmpass]').val('');
                    }else{
                        layer.msg(data.retErr, { icon: 5});
                    }
                });
            }
        }

        //添加会员 获取省
        function getProvince() {
            $.ajax({
                url:"{{ url('get_city') }}",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type:'POST',
                data:{
                    parent_id:0
                },
                success:function (data) {
                    data = JSON.parse(data);
                    document.getElementById("province").options.length = 1;
                    for(var i=0;i<data.length;i++){
                        document.getElementById("province").add(new Option(data[i].name,data[i].id));
                    }
                }
            });
        }

        //添加会员 获取市/县
        function get_city(e) {
            if(e){
                var parent_id = $('select[name=province] option:selected').val();
            }else{
                var parent_id = $('select[name=city] option:selected').val();
            }

            if(parent_id){
                $.ajax({
                    url:"{{ url('get_city') }}",
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type:'POST',
                    data:{
                        parent_id:parent_id
                    },
                    success:function (data) {
                        data = JSON.parse(data);
                        if(e){
                            document.getElementById("city").options.length = 0;
                            document.getElementById("districe").options.length = 0;
                            for(var i=0;i<data.length;i++){
                                document.getElementById("city").add(new Option(data[i]['name'],data[i]['id']));
                            }
                            $('#city').css('display','inline');
                            get_city(false);
                        }else{
                            document.getElementById("districe").length = 0;
                            for(var i=0;i<data.length;i++){
                                document.getElementById("districe").add(new Option(data[i]['name'],data[i]['id']));
                            }
                            $('#districe').css('display','inline');
                        }
                    }
                });
            }else{
                document.getElementById("city").options.length = 0;
                document.getElementById("districe").options.length = 0;
                $('#city').css('display','none');
                $('#districe').css('display','none');
            }
        }

        //修改会员
        function get_Province() {
            $.ajax({
                url:"{{ url('get_city') }}",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type:'POST',
                data:{
                    parent_id:0
                },
                success:function (data) {
                    data = JSON.parse(data);
                    document.getElementById("edit_province").options.length = 1;
                    for(var i=0;i<data.length;i++){
                        document.getElementById("edit_province").add(new Option(data[i].name,data[i].id));
                    }
                }
            });
        }

        //修改会员
        function change_city(e) {
            if(e){
                var parent_id = $('#edit_customer').find('select[name=province] option:selected').val();
            }else{
                var parent_id = $('#edit_customer').find('select[name=city] option:selected').val();
            }

            if(parent_id){
                $.ajax({
                    url:"{{ url('get_city') }}",
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type:'POST',
                    data:{
                        parent_id:parent_id
                    },
                    success:function (data) {
                        data = JSON.parse(data);
                        if(e){
                            document.getElementById("edit_city").options.length = 0;
                            document.getElementById("edit_districe").options.length = 0;
                            for(var i=0;i<data.length;i++){
                                document.getElementById("edit_city").add(new Option(data[i]['name'],data[i]['id']));
                            }
                            $('#edit_city').css('display','inline');
                            change_city(false);
                        }else{
                            document.getElementById("edit_districe").length = 0;
                            for(var i=0;i<data.length;i++){
                                document.getElementById("edit_districe").add(new Option(data[i]['name'],data[i]['id']));
                            }
                            $('#edit_districe').css('display','inline');
                        }
                    }
                });
            }else{
                document.getElementById("edit_city").options.length = 0;
                document.getElementById("edit_districe").options.length = 0;
                $('#edit_city').css('display','none');
                $('#edit_districe').css('display','none');
            }
        }
        
        //添加客户
        function add_formal_customer() {
            $.ajax({
                url:"http://roco.honghaiweb.com/Api/index.php/App/Customer/addClient",
                type:'POST',
                data: {
                    act_id: 323,
                    act_name:'12345678',
                    session_id:$.cookie('session_id'),
                    auth_key:$.cookie('auth_key')
                },
                success:function(data){
                    data = JSON.parse(data)
                    alert(data.retErr);
                }
            });
        }

        //上传文件到服务器
        function upload_fiel_do() {
            $.ajax({
                ulr:'http://roco.honghaiweb.com/Api/index.php/App/Customer/addClient',
                type:'POST',
                data: {
                    session_id:$.cookie('session_id'),
                    auth_key:$.cookie('auth_key')
                },
                success:function (data) {
                    console.log(data);
                },
                error:function () {
                    alert('aaa');
                    return false;
                }
            });
        }
    </script>
</html>
