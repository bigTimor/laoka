﻿<!DOCTYPE html>
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

          //  $.feat.nativeTouchScroll=true;
          
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
                    $("#afui").get(0).className=search;
                    console.log(search);
                });
            }
            
            var webRoot = "./";
            // $.os.android=true;
            //$.ui.autoLaunch = false;
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


            if($.os.android||$.os.ie||search=="android"){
                $.ui.ready(function(){
                    $("#main .list").append("<li><a id='toggleAndroidTheme'>Toggle Theme Color</a></li>");
                    var $el=$("#afui");
                    $("#toggleAndroidTheme").bind("click",function(e){
                        if($el.hasClass("light"))
                            $el.removeClass("light");
                        else
                            $el.addClass("light");
                    });
                });
            }                        
        </script>

</head>
    <body>
        <div id="afui">
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
                        <div class="buoy_camera"><img src="{{ asset('Images/voice.png') }}"></div>
                        <div class="buoy_voice"><img src="{{ asset('Images/voice.png') }}"></div>
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
                        <div class="buoy_camera"><img src="{{ asset('Images/voice.png') }}"></div>
                        <div class="buoy_voice"><img src="{{ asset('Images/voice.png') }}"></div>
                    </div>
                </div>
                <div id="customer_edit" class="panel" title="编辑客户" data-footer="none">
                    <ul class="customer_details">
                        <li class="customer_header"><div><img src="{{ asset('Images/man_header.png') }}"></div></li>
                        <li>姓名<label><input type="text" name="edit_username"></label></li>
                        <li>性别</li>
                        <li>地址<label><input type="text" name="edit_address"></label></li>
                        <li>电话<label><input type="text" name="edit_telephone" value="2333"></label></li>
                        <li>微信号<label><input type="text" name="edit_wetchat"></label></li>
                        <li>量尺时间<label><input type="text" name="edit_measure_time"></label></li>
                        <li>预算</li>
                        <li>看方案时间<label><input type="text" name="edit_scheme_time"></label></li>
                    </ul>
                    <input type="hidden" name="edit_id" value="">
                    <p class="bottom_button">
                        <a class="go_edit_customer" href="javascript:" onclick="edit_customer_do()">确定</a>
                        <a class="reset_edit" href="javascript:" onclick="">取消</a>
                    </p>
                </div>
                <div id="add_customer" class="panel" title="编辑临时客户" data-footer="none">
                    <ul class="customer_details">
                        <li class="customer_header"><div><img src="{{ asset('Images/man_header.png') }}"></div></li>
                        <li><span class="mandatory">*</span>姓名<label><input type="text" name="edit_username"></label></li>
                        <li><span class="mandatory">*</span>性别</li>
                        <li><span class="mandatory">*</span>地址<label><input type="text" name="edit_address"></label></li>
                        <li><span class="mandatory">*</span>电话<label><input type="text" name="edit_telephone" value="2333"></label></li>
                        <li><span class="mandatory">*</span>微信号<label><input type="text" name="edit_wetchat"></label></li>
                        <li><span class="mandatory">*</span>预算</li>
                        <li>看方案时间<label><input type="text" name="edit_scheme_time"></label></li>
                    </ul>
                    <input type="hidden" name="edit_id" value="">
                    <p class="bottom_button">
                        <a class="go_edit_customer" href="javascript:" onclick="edit_customer_do()">确定</a>
                        <a class="reset_edit" href="javascript:" onclick="">取消</a>
                    </p>
                </div>
                <!---------------------------------------------->
                <div title="AppFramework" id="af" class="panel" data-nav="menu_AppFramework" data-header="testheader">
                    <!-- <header><span>This is an inline header in a panel.  Below is an inline footer</span></header>-->
                    <h2 class='expanded' onclick='showHide(this,"AppFramework_info");'>AppFramework</h2>

                    <p id='AppFramework_info'>AppFramework is a blazingly fast query selector tool that is optmimized for HTML5 browsers.</p>
                    <ul class="list">
                        <li>
                            <a id="tester"  onClick="$.ui.scrollToBottom('af')" class='flipAnimation'>Go To Bottom</a>
                        </li>
                        <li>
                            <a href="#af1">$ Selector</a>
                        </li>
                        <li>
                            <a href="#af2">$().length()</a>
                        </li>
                        <li>
                            <a href="#af3">$().find()</a>
                        </li>
                        <li>
                            <a href="#af4">$().html()</a>
                        </li>
                        <li>
                            <a href="#af5">$().text()</a>
                        </li>
                        <li>
                            <a href="#af6">$().css()</a>
                        </li>
                        <li>
                            <a href="#af7">$().empty()</a>
                        </li>
                        <li>
                            <a href="#af8">$().hide()</a>
                        </li>
                        <li>
                            <a href="#af9">$().show()</a>
                        </li>
                        <li>
                            <a href="#af10">$().toggle()</a>
                        </li>
                        <li>
                            <a href="#af11">$().val()</a>
                        </li>
                        <li>
                            <a href="#af12">$().attr()</a>
                        </li>
                        <li>
                            <a href="#af13">$().removeAttr()</a>
                        </li>
                        <li>
                            <a href="#af14">$().remove()</a>
                        </li>
                        <li>
                            <a href="#af15">$().addClass()</a>
                        </li>
                        <li>
                            <a href="#af16">$().removeClass()</a>
                        </li>
                        <li>
                            <a href="#af17">$().hasClass()</a>
                        </li>
                        <li>
                            <a href="#af18">$().bind()</a>
                        </li>
                        <li>
                            <a href="#af19">$().unbind()</a>
                        </li>
                        <li>
                            <a href="#af20">$().trigger()</a>
                        </li>
                        <li>
                            <a href="#af21">$().append()</a>
                        </li>
                        <li>
                            <a href="#af22">$().prepend()</a>
                        </li>
                        <li>
                            <a href="#af32">$().get(0)</a>
                        </li>
                        <li>
                            <a href="#af31">$().offset()</a>
                        </li>
                        <li>
                            <a href="#afparent">$().parent()</a>
                        </li>
                        <li>
                            <a href="#afserialize">$().serialize()</a>
                        </li>
                        <li>
                            <a href="#af33">$.isArray()</a>
                        </li>
                        <li>
                            <a href="#af34">$.isFunction()</a>
                        </li>
                        <li>
                            <a href="#af23">$.jsonP()</a>
                        </li>
                        <li>
                            <a href="#af24">$.ajax()</a>
                        </li>
                        <li>
                            <a href="#af25">$.get(0)</a>
                        </li>
                        <li>
                            <a href="#af26">$.post()</a>
                        </li>
                        <li>
                            <a href="#af27">$.getJSON()</a>
                        </li>
                        <li>
                            <a href="#af28">$.param()</a>
                        </li>
                        <li>
                            <a href="#af29">$.parseJSON()</a>
                        </li>
                        <li>
                            <a href="#af30">$.os</a>
                        </li>
                        <li>
                            <a  onClick="$.ui.scrollToTop('af')">Go To Top</a>
                        </li>
                    </ul>
                    <footer>
                        <a href="#main" id='navbar_home' class='icon home'>Home <span class='af-badge lr'>12</span>
                        </a>
                    </footer>
                </div>
                <div id="afserialize" class="panel" title="$().serialize" data-nav="menu_AppFramework">
                    <script>
                        function serializeForm() {
                            alert($("#form").serialize());
                        }
                    </script>$("#form").serialize() - will return a key/value pair string of the form elements
                    <br>
                    <Br>
                    <form id="form" onsubmit="return false">Name:
                        <input type='text' class='af-ui-forms' name='name' value='John Smith'>
                        <br>
                        <input type='checkbox' class='af-ui-forms' value='yes' checked name='human'>
                        <label for='human'>Are you human?</label>
                        <br>
                        <br>Gender: <span><select id='serialize_gender' name="gender"><option value='m'>Male</option><option value='f'>Female</option><select></span>
                        <br>
                        <br>
                        <br>
                        <input type="button" onclick="serializeForm()" value="Serialize">
                    </form>
                </div>
                <!-- af> af Selector -->
                <div id="af1" class="panel" title="$()" data-nav="menu_AppFramework">   <span id="aftest2">This is some html</span>
                    <br />
                    <br />
                    <a class="button"  onclick="alert($('#aftest2')[0])">Click to get Object</a>
                    <br />
                    <br />
                    <a class="button"  onclick="alert($('#aftest2').html())">Click to get Content</a>
                </div>
                <!-- af> af length() -->
                <div id="af2" class="panel" title=".length()" data-nav="menu_AppFramework">
                    <div class='af2'>Div 1 (class="af2")</div>
                    <div class='af2'>Div 2 (class="af2")</div>
                    <div class='af2'>Div 3 (class="af2")</div>
                    <div class='af4'>Div 4 (class="af4")</div>
                    <br />
                    <a class="button"  onclick="alert($('.af2').length)">Click to get the Length by classname</a>
                </div>
                <!-- af> af find() -->
                <div id="af3" class="panel" title=".find()" data-nav="menu_AppFramework">$("#div").find("li") find all element(s) inside a container
                    <br />
                    <br />
                    <ul class="list">
                        <li id='find1'>Item 1</li>
                        <li>Item 2</li>
                    </ul>
                    <a class="button"  onclick="alert($('#af3').find('li').length)">Click to get the count of li's in the div</a>
                    <br />
                    <br />
                </div>
                <!-- af> af html() -->
                <div id="af4" class="panel" title=".html()" data-nav="menu_AppFramework">$("#div").html() allows you to get or set a contents HTML.
                    <br />
                    <br />
                    <div id="af4_content" style='border:1px solid black'>This is some content</div>
                    <br />
                    <br />
                    <a class="button"  onclick='alert($("#af4_content").html())'>Get Content</a>|
                    <a  class="button" onclick='$("#af4_content").html("New Content")'>Set Content</a>
                </div>
                <!-- af> af text() -->
                <div id="af5" class="panel" title=".text()" data-nav="menu_AppFramework">$("#div").text() allows you to get or set a contents text.
                    <br />
                    <br />
                    <div id="af5_content" style='border:1px solid black'><span>This is some text</span> other text</div>
                    <br />
                    <br />
                    <a class="button"  onclick='alert($("#af5_content").text())'>Get Text</a>|
                    <a class="button"  onclick='$("#af5_content").text("New Text")'>Set Text</a>
                </div>
                <!-- af> af css() -->
                <div id="af6" class="panel" title=".css()" data-nav="menu_AppFramework">$("#div").css() - allows you to get or set a CSS property.
                    <br />
                    <br />
                    <div style="background:red;color:white;border:1px solid black" id="af6_content">This is some content</div>
                    <br />
                    <br />
                    <a class="button"  onclick='alert($("#af6_content").css("background"))'>Get background color</a>
                    <br />
                    <a class="button"  onclick='$("#af6_content").css("background","green")'>Set background color</a>
                </div>
                <!-- af> af empty() -->
                <div id="af7" class="panel" title=".empty()" data-nav="menu_AppFramework">$("#div").empty() - will empty out the contents of the element.
                    <br />
                    <br />
                    <div id="af7_content" style="border:1px solid black">This is some content</div>
                    <br/>
                    <br/>
                    <a class="button"  onclick='$("#af7_content").empty()'>$().empty()</a>
                </div>
                <!-- af> af hide() -->
                <div id="af8" class="panel" title=".hide()" data-nav="menu_AppFramework">$("#div").hide() - will set the elements display property to "none".
                    <br />
                    <br />
                    <div id="af8_content" style="border:1px solid black">This is some content</div>
                    <br/>
                    <a class="button"  onclick='$("#af8_content").hide()'>Hide the div</a>
                </div>
                <!-- af> af show() -->
                <div id="af9" class="panel" title=".show()" data-nav="menu_AppFramework">$("#div").show() - will set the elements display property to "block".
                    <br />
                    <br />
                    <div id="af9_content" style="border:1px solid black;display:none;">This is some content</div>
                    <br/>
                    <a class="button"  onclick='$("#af9_content").show()'>Show the div</a>
                </div>
                <!-- af> af toggle() -->
                <div id="af10" class="panel" title=".toggle()" data-nav="menu_AppFramework">$("#div").toggle() - will toggle the elements display property.
                    <br />
                    <br />
                    <div id="af10_content" style="border:1px solid black;display:block;">This is some content</div>
                    <br/>
                    <br />
                    <a class="button"  onclick='$("#af10_content").toggle()'>Toggle a div</a>
                </div>
                <!-- af> af val() -->
                <div id="af11" class="panel" title=".val()" data-nav="menu_AppFramework">$("#div").val() - will get or set the value of an HTML element.
                    <br />
                    <br />
                    <input type="text" id="af11_input" size=15>
                    <br />
                    <br />
                    <a class="button"  onclick='alert($("#af11_input").val())'>Get Value</a>
                    <br />
                    <a class="button"  onclick='($("#af11_input").val("set value"))'>Set Value</a>
                </div>
                <!-- af> af attr() -->
                <div id="af12" class="panel" title=".attr()" data-nav="menu_AppFramework">$("#div").attr() - will get or set an attribute of an HTML element.
                    <br />
                    <br />
                    <div id="af12_content" data-test="foo">The data-test attribute is set to "foo" - data-test="foo"</div>
                    <br />
                    <br />
                    <a class="button"  onclick='alert($("#af12_content").attr("data-test"))'>Get Attribute Value</a>
                    <br />
                    <a class="button"  onclick='($("#af12_content").attr("data-test","bar"))'>Set Attribute Value</a>
                </div>
                <!-- af> af removeAttr() -->
                <div id="af13" class="panel" title=".removeAttr()" data-nav="menu_AppFramework">$("#div").removeAttr() - will remove an attribute of an HTML element.
                    <br />
                    <br />
                    <div id="af13_content" data-test="foo">The data-test attribute is set to "foo" - data-test="foo"</div>
                    <br />
                    <a class="button"  onclick='alert($("#af13_content").attr("data-test"))'>Get Attribute Value</a>
                    <br />
                    <a class="button"  onclick='($("#af13_content").removeAttr("data-test"))'>Remove Attribute Value</a>
                </div>
                <!-- af> af remove() -->
                <div id="af14" class="panel" title=".remove()" data-nav="menu_AppFramework">$("#div").remove() - will remove an element from the parent container.
                    <br />
                    <br />
                    <div id="af14_content" style="border:1px solid black">This is content that will be removed from the DOM.</div>
                    <br />
                    <a class="button"  onclick='$("#af14_content").remove()'>Remove the Element</a>
                </div>
                <!-- af> af addClass() -->
                <div id="af15" class="panel" title=".addClass()" data-nav="menu_AppFramework">$("#div").addClass() - adds a css class to the element.
                    <br />
                    <br />
                    <div style='border:1px solid black' id="af15_content">This is some content</div>
                    <br />
                    <br />
                    <a class="button"  onclick='($("#af15_content").addClass("class16"))'>Add a Class</a>
                </div>
                <!-- af> af removeClass() -->
                <div id="af16" class="panel" title=".removeClass()" data-nav="menu_AppFramework">$("#div").removeClass() - removes a css class to the element.
                    <br />
                    <br />
                    <div style='border:1px solid black' id="af16_content" class="class16">This is some content</div>
                    <br />
                    <a class="button"  onclick='($("#af16_content").removeClass("class16"))'>Remove the Class</a>
                </div>
                <!-- af> af hassClass() -->
                <div id="af17" class="panel" title=".hasClass()" data-nav="menu_AppFramework">$("#div").hassClass() - returns a boolean if an element has a class.
                    <br />
                    <br />
                    <div style='border:1px solid black' id="af17_content" class="class16">This is some content</div>
                    <br />
                    <a class="button"  onclick='alert($("#af17_content").hasClass("class16"))'>Check if it has the class</a>
                </div>
                <!-- af> af bind() -->
                <div id="af18" class="panel" title=".bind()" data-nav="menu_AppFramework">$("#div").bind() - binds an event to an element.
                    <br />
                    <br />
                    <a class="button"  id="af18_content">Test Link to bind event to</a>
                    <br />
                    <br />
                    <a class="button"  onclick='$("#af18_content").bind("click",function(evt){alert("I was clicked");});alert("click event is bound");'>Bind Event</a>
                    <br />
                </div>
                <!-- af> af unbind() -->
                <div id="af19" class="panel" title=".unbind()" data-nav="menu_AppFramework">$("#div").unbind() - unbinds an event from an element.
                    <br />
                    <br />
                    <a class="button"  id="af19_content">This is a test link</a>
                    <br />
                    <br />
                    <a class="button"  onclick='$("#af19_content").bind("click",function(){alert("I was clicked");});alert("click event is bound");'>Bind Event</a>
                    <br />
                    <a class="button"  onclick='$("#af19_content").unbind("click")'>Unbind Event</a>
                </div>
                <!-- af> af trigger() -->
                <div id="af20" class="panel" title=".trigger()" data-nav="menu_AppFramework">$("#div").trigger() - triggers an event on an element.
                    <br />
                    <br />
                    <a id="af20_content"  onclick="alert('I was clicked')">Click to test me</a>
                    <br />
                    <br />
                    <a class="button"  onclick='$("#af20_content").trigger("click")'>Trigger Event</a>
                </div>
                <!-- af> af append() -->
                <div id="af21" class="panel" title=".append()" data-nav="menu_AppFramework">$("#div").append() - appends an element or content.
                    <br />
                    <br />
                    <div id="af21_content">I'll append content after the &lt;hr>
                        <hr>
                    </div>
                    <br />
                    <br />
                    <a class="button"  onclick='$("#af21_content").append("<span>Some more content<br /></span>");'>Append Content</a>
                </div>
                <!-- af> af prepend() -->
                <div id="af22" class="panel" title=".prepend()" data-nav="menu_AppFramework">$("#div").prepend() - prepends an element or content.
                    <br />
                    <br />
                    <div id="af22_content">
                        <hr>I'll prepend content before the &lt;hr></div>
                    <br />
                    <br />
                    <a class="button"  onclick='$("#af22_content").prepend("<span>Some more content<br /></span>");'>Prepend Content</a>
                </div>
                <!-- af> af offset() -->
                <div id="af31" class="panel" title=".offset()" data-nav="menu_AppFramework">
                    <script>
                        function getElementOffset() {
                            var data = $("#af31").offset();
                            alert("Top: " + data.top + " - Left: " + data.left);
                        }
                    </script>$("#div").offset() - Gets the left and top offset of an element.
                    <br />
                    <br />
                    <a class="button"  onclick='getElementOffset()'>Get Offsett</a>
                </div>
                <!-- af> af get(0) -->
                <div id="af32" class="panel" title=".get(0)" data-nav="menu_AppFramework">$("#div").get(0) - Get's an individual element by index.
                    <br />
                    <br />
                    <script>
                        function getElementByIndex() {
                            var obj = $(".panel").get(0);
                            alert("This is the first panel = " + obj.id);
                        }
                    </script>
                    <a class="button"  onclick='getElementByIndex();'>Get first panel</a>
                </div>
                <!-- af> af jsonP() -->
                <div id="af23" class="panel" title=".jsonP()" data-nav="menu_AppFramework">$.jsonP(url:"URL", success:function(){}, timeout:"1000", error:function(){} ) - makes a jsonP call for cross domain scripting
                    <br />
                    <br />
                    <div id="af23_content" style="border:1px solid black;">This will get updated with content from the jsonP call</div>
                    <br />
                    <br />
                    <a class="button"  onclick="$.jsonP({url:'http://jsfiddle.net/echo/jsonp/?test=some+html+content&callback=?',success:function(data){$('#af23_content').html(data.test)}});">Make jsonP call</a>
                </div>
                <!-- af> af ajax() -->
                <div id="af24" class="panel" title=".ajax()" data-nav="menu_AppFramework">$.ajax(url:"URL", success:function(){}, timeout:"1000", error:function(){} ) - makes an Ajax call
                    <br />
                    <br />
                    <script type="text/javascript">
                        function doAjax() {
                            $.ajax({
                                url: webRoot + 'ajax.html',
                                success: function (data) {
                                    $('#af24_content').html(data)
                                }
                            });
                        }
                    </script>
                    <div id="af24_content" style="border:1px solid black;">This will get updated with content from the ajax call</div>
                    <br />
                    <br />
                    <a class="button"  onclick="doAjax()">Make Ajax Call</a>
                </div>
                <!-- af> af get(0) -->
                <div id="af25" class="panel" title=".get(0)" data-nav="menu_AppFramework">$.get(url:"URL", success:function(){}, timeout:"1000", error:function(){} ) - makes an Ajax call
                    <br />
                    <br />
                    <script type="text/javascript">
                        function doget() {
                            $.get(webRoot + 'ajax.html', function (data) {
                                $('#af25_content').html(data)
                            });
                        }
                    </script>
                    <div id="af25_content" style="border:1px solid black;">This will get updated with content from the ajax call</div>
                    <br />
                    <br />
                    <a class="button"  onclick="doget()">Make Get Call</a>
                </div>
                <!-- af> af post() -->
                <div id="af26" class="panel" title=".post()" data-nav="menu_AppFramework">$.post(url,data:{foo:"bar"}, success:function(){}, timeout:"1000",error: function(){} ) - makes an Ajax call
                    <br />
                    <br />
                    <script type="text/javascript">
                        function doPost() {
                            $.post(webRoot + 'ajax.html', {
                                foo: "bar"
                            }, function (data) {
                                $('#af26_content').html(data)
                            });
                        }
                    </script>
                    <div id="af26_content" style="border:1px solid black;">This will get updated with content from the ajax call</div>
                    <br />
                    <br />
                    <a class="button"  onclick="doPost()">Make Post Call</a>
                </div>
                <!-- af> af getJSON() -->
                <div id="af27" class="panel" title=".getJSON()" data-nav="menu_AppFramework">$.getJSON(url,data,success); - Makes a XMLHpttRequest GET request and returns a JSON object.
                    <br />
                    <br />
                    <script>
                        function doJSON() {
                            $.getJSON(webRoot + 'json.html', function (data) {
                                $('#af27_content').html(JSON.stringify(data))
                            });
                        }
                    </script>
                    <div style="border:1px solid black" id="af27_content">Returned object</div>
                    <br />
                    <a class="button"  onclick="doJSON()">Make GetJson Call</a>
                </div>
                <!-- af> af serialize() -->
                <div id="af28" class="panel" title=".param()">$.param() - serializes an object into key/value pairs for a querystring.
                    <br />
                    <br />  <code>
                                    var obj= {foo:"foo",bar:"bar"};
                                </code>
                    <br />
                    <br />
                    <script>
                        function doSerialize() {
                            var obj = {
                                foo: "foo",
                                bar: "bar"
                            };
                            $("#af28_content").html($.param(obj));
                        }
                    </script>
                    <div id="af28_content" style="border:1px solid black">Serialized parameters will show here.</div>
                    <br />
                    <br />
                    <a class="button"  onclick="doSerialize()">Make param Call</a>
                </div>
                <!-- af> af parseJSON() -->
                <div id="af29" class="panel" title=".parseJSON()" data-nav="menu_AppFramework">$.parseJSON() - parses a string and converts it into a JSON object. Uses the native JSON parser, but is added for backwards compatibility.
                    <br>
                    <br>    <code>
                                    var obj='{"foo":"bar"}';
                                </code>

                    <script>
                        function doParseJson() {
                            var obj = '{"foo":"bar"}';
                            alert($.parseJSON(obj));
                        }
                    </script>
                    <br>
                    <a class="button"  onclick="doParseJson()">Parse JSON string</a>
                </div>
                <!-- af> os -->
                <div id="af30" class="panel" title=".os" data-nav="menu_AppFramework">$.os - holds information about the OS of the device, and if it is a webkit browser
                    <br>
                    <br>    <div class="samplecode" >
                                    $.os.webkit  = <script>document.write($.os.webkit);</script><br>
                                    $.os.android = <script>document.write($.os.android);</script><br>
                                    $.os.ipad = <script>document.write($.os.ipad);</script><br>
                                    $.os.iphone = <script>document.write($.os.iphone);</script><br>
                                    $.os.ios = <script>document.write($.os.ios);</script><br>
                                    $.os.webos = <script>document.write($.os.webos);</script><br>
                                    $.os.touchpad = <script>document.write($.os.touchpad);</script><br>
                                    $.os.blackberry = <script>document.write($.os.blackberry);</script><br>
                                    $.os.opera = <script>document.write($.os.opera);</script><br>
                                    $.os.fennec = <script>document.write($.os.fennec);</script><br>
                                </div>

                </div>
                <!-- af> isArray -->
                <div id="af33" class="panel" title=".isArray()" data-nav="menu_AppFramework">$.isArray(param) - returns a boolean if the parameter is an array.
                    <br>
                    <br>    <div class="samplecode">var notArrayTest="foo";<br>
                                    var isArrayTest=[];

                                </div>

                    <script>
                        var notArrayTest = "foo";
                        var isArrayTest = [];

                        function isNotAnArray() {
                            alert($.isArray(notArrayTest));
                        }

                        function isAnArray() {
                            alert($.isArray(isArrayTest));
                        }
                    </script>
                    <br>
                    <a class="button"  onclick="isNotAnArray()">test notArrayTest</a>
                    <br>
                    <a class="button"  onclick="isAnArray()">test isArrayTest</a>
                    <br>
                </div>
                <!-- af> isFunction -->
                <div id="af34" class="panel" title=".isFunction()" data-nav="menu_AppFramework">$.isFunction(param) - returns a boolean if the parameter is a function.
                    <br>
                    <br>    <div class="samplecode">
                                    var notFunctionTest="foo";<br>
                                    var isFunctionTest=function(){};

                                </div>

                    <script>
                        var notFunctionTest = "foo";
                        var isFunctionTest = [];

                        function notAFunction() {
                            alert($.isArray(notFunctionTest));
                        }

                        function isAFunction() {
                            alert($.isArray(isFunctionTest));
                        }
                    </script>
                    <br>
                    <a class="button"  onclick="notAFunction()">test notFunctionTest</a>
                    <br>
                    <a class="button"  onclick="isAFunction()">test isFunctionTest</a>
                    <br>
                </div>
                <div id="afparent" class="panel" title=".parent()" data-nav="menu_AppFramework">This returns the parent elements for the previously found elements in the container <div class="samplecode">
                                    $("#afparent").parent();
                                </div>
The parent id for this div is "content". Let's verify it.
                    <br>
                    <a  onclick="alert($('#afparent').parent().get(0).id);" class="button">Get Parent ID</a>
                </div>
                <!-- ------------------------------------------ -->
                <!-- ------------------------------------------ -->
                <!-- App Framework UI -->
                <div title="App Framework UI" id="afuidemo" class="panel" data-footer='footerui' data-tab="navbar_ui">
                        <h2 class='expanded' onclick='showHide(this,"AFUI_info");'>App Framework UI</h2>
                    <p id='AFUI_info'>App Framework UI is the User Interface/User Experience library for mobile applications. It uses HTML5 and CSS3 for animations and transitions. We built the kitchen sink using App Framework UI. It is comprised of components from the Plugins library
                        and additional features.
                        <br>* Fixed navigation bar
                        <br>* Auto scrolling content panels
                        <br>* Optional footer to segment your application
                        <br>
                    </p>
                    <ul class="list">
                        <li>
                            <a href="#aftransitions">Transitions</a>
                        </li>
                        <li>
                            <a href="#afforms">Form Styles</a>
                        </li>
                        <li>
                            <a href="#afgrid">Grid System</a>
                        </li>
                        <li>
                            <a href="#uiapi">$.ui API</a>
                        </li>
                         <li>
                            <a href="#uiinsetlist">Inset List</a>
                        </li>
                         <li>
                            <a href="#uibuttons">Buttons</a>
                        </li>
                        <li>
                            <a href="#uifooter">Custom Footers</a>
                        </li>
                        <li>
                            <a href="#uiside">Side Navigation Menu</a>
                        </li>
                        <li>
                            <a href="#uiicons">Vector Icons</a>
                        </li>
                        <li>
                            <a href="ajax.html" data-persist-ajax="true" data-refresh-ajax="true" title="Remote Page" data-pull-scroller="true">Load External Content</a>
                        </li>
                        <li>
                            <a href="http://www.AppFramework.com" target="_blank">Open a new page</a>
                        </li>
                        <li>
                            <a href="#uidefer">Defer loading</a>
                        </li>
                    </ul>
                </div>
                <div id="uiicons" title="Vector Icons" class="panel">
                        <h2 class='expanded' onclick='showHide(this,"icons_info");'>Vector Icons</h2>
                    <p id='icons_info'>App Framework UI provides Vector icons to use throughout your app. Simply add the icon class, along with the image class name and additional sizes you want.
                        <br>.mini -  .7em high
                        <br>.big - 1.5em hight
                        <br>The default is 1em.
                        <br>
                    </p>
                    <ul class="list">
                        <li>
                            <a  class="icon home">Home</a>
                        </li>
                        <li>
                            <a  class="icon home mini">Home Mini</a>
                        </li>
                        <li>
                            <a  class="icon pencil big">Pencil</a>
                        </li>
                        <li>
                            <a  class="icon picture big">Picture</a>
                        </li>
                        <li>
                            <a  class="icon camera big">Camera</a>
                        </li>
                        <li>
                            <a  class="icon headset big">Headset</a>
                        </li>
                        <li>
                            <a  class="icon paper big">Paper</a>
                        </li>
                        <li>
                            <a  class="icon stack big">Stack</a>
                        </li>
                        <li>
                            <a  class="icon folder big">Folder</a>
                        </li>
                        <li>
                            <a  class="icon tag big">Tag</a>
                        </li>
                        <li>
                            <a  class="icon basket big">Basket</a>
                        </li>
                        <li>
                            <a  class="icon phone big">Phone</a>
                        </li>
                        <li>
                            <a  class="icon mail big">Mail</a>
                        </li>
                        <li>
                            <a  class="icon location big">Location</a>
                        </li>
                        <li>
                            <a  class="icon clock big">Clock</a>
                        </li>
                        <li>
                            <a  class="icon calendar big">Calendar</a>
                        </li>
                        <li>
                            <a  class="icon message big">Message</a>
                        </li>
                        <li>
                            <a  class="icon chat big">Chat</a>
                        </li>
                        <li>
                            <a  class="icon user big">User</a>
                        </li>
                        <li>
                            <a  class="icon loading big">Loading</a>
                        </li>
                        <li>
                            <a  class="icon refresh big">Refresh</a>
                        </li>
                        <li>
                            <a  class="icon magnifier big">Magnifier</a>
                        </li>
                        <li>
                            <a  class="icon key big">Key</a>
                        </li>
                        <li>
                            <a  class="icon settings big">Settings</a>
                        </li>
                        <li>
                            <a  class="icon graph big">Graph</a>
                        </li>
                        <li>
                            <a  class="icon trash big">Trash</a>
                        </li>
                        <li>
                            <a  class="icon pin big">Pin</a>
                        </li>
                        <li>
                            <a  class="icon target big">Target</a>
                        </li>
                        <li>
                            <a  class="icon download big">Download</a>
                        </li>
                        <li>
                            <a  class="icon upload big">Upload</a>
                        </li>
                        <li>
                            <a  class="icon star big">Star</a>
                        </li>
                        <li>
                            <a  class="icon heart big">Heart</a>
                        </li>
                        <li>
                            <a  class="icon warning big">Warning</a>
                        </li>
                        <li>
                            <a  class="icon add big">Add</a>
                        </li>
                        <li>
                            <a  class="icon remove big">Remove</a>
                        </li>
                        <li>
                            <a  class="icon question big">Question</a>
                        </li>
                        <li>
                            <a  class="icon info big">Info</a>
                        </li>
                        <li>
                            <a  class="icon error big">Error</a>
                        </li>
                        <li>
                            <a  class="icon check big">Check</a>
                        </li>
                        <li>
                            <a  class="icon minimize big">Minimize</a>
                        </li>
                        <li>
                            <a  class="icon close big">Close</a>
                        </li>
                        <li>
                            <a  class="icon up big">Up</a>
                        </li>
                        <li>
                            <a  class="icon down big">Down</a>
                        </li>
                        <li>
                            <a  class="icon left big">Left</a>
                        </li>
                        <li>
                            <a  class="icon right big">Right</a>
                        </li>
                        <li>
                            <a  class="icon tools big">Tools</a>
                        </li>
                        <li>
                            <a  class="icon html5 big">HTML5</a>
                        </li>
                        <li>
                            <a  class="icon css big">CSS</a>
                        </li>
                        <li>
                            <a  class="icon js big">JS</a>
                        </li>
                        <li>
                            <a  class="icon cloud big">Cloud</a>
                        </li>
                        <li>
                            <a  class="icon tv big">TV</a>
                        </li>
                        <li>
                            <a  class="icon wifi big">Wifi</a>
                        </li>
                        <li>
                            <a  class="icon new big">New</a>
                        </li>
                        <li>
                            <a  class="icon mic big">Mic</a>
                        </li>
                        <li>
                            <a  class="icon database big">Database</a>
                        </li>
                        <li>
                            <a  class="icon busy big">Busy</a>
                        </li>
                        <li>
                            <a  class="icon bug big">Bug</a>
                        </li>
                        <li>
                            <a  class="icon lamp big">Lamp</a>
                        </li>
                    </ul>
                </div>
                <div id="uidefer" title="Defer Loading" class="panel">Deferred loading requires a web browser for Ajax to work. What we do is load the html after $.ui.ready is called, so you can speed up the initial loading time of your app.</div>
                <div id="uiside" title="Side Menu Navigation" class="panel" data-footer="footerui"> <b>Side Menu Navigation</b>
                    <br>If you are on a tablet, you'll already see the side menu. If you are on a phone, click the "Powered by AppFramework" button to expand it.
                    <br>
                    <Br>Side menu's are created using the &lt;nav&gt; tags. You can set the id and then refer to them on each panel by setting the data-menu='id' property. The side menu's will only show if you have &lt;nav&gt; defined.</div>
                <div id="uifooter" title="Custom Footers"
                class="panel" data-footer='footerui'>
                    <p>You should notice that the footer is no longer the default. It is specific to App Framework UI, with options for Transitions, UI and API</p>You can create custom fotoers using the &lt;footer&gt; tag. You then set the id on each panel to change them using
                    the data-footer='id' property.</div>
                <div id="afgrid" title="Grid System" class="panel" data-footer="footerui">
                    <p>You can specify the following types of grids</p>
                    <ul class="list inset">
                        <li>col2 - 50% (2x2)</li>
                        <li>col3 - 33.3% (3x3)</li>
                        <li>col1-3 - 33.3% (33.3% for 3 column)</li>
                        <li>col2-3 - 66% (66.6% for 3 column)</li>
                    </ul>
                    On phones, the grid system will always default to a single row.  On tablets, it will display inline.

                    <h2>2 column</h2>
                    <div class="grid">
                        <div class="col2">This is the left column</div>
                        <div class="col2">This is the right column</div>
                    </div>

                    <h2>3 column</h2>
                    <br>
                    <div class="grid">
                        <div class="col3">This is the left column</div>
                        <div class="col3">This is the middle column</div>
                        <div class="col3">This is the right column</div>
                    </div>

                    <h2>1-3/2-3 column</h2>
                    <br>
                    <div class="grid">
                        <div class="col1-3">This is the left column</div>

                        <div class="col2-3">This is the right column</div>
                    </div>

                    <h2>2-3/1-3 column</h2>
                    <br>
                    <div class="grid">
                        <div class="col2-3">This is the left column</div>

                        <div class="col1-3">This is the right column</div>
                    </div>


                </div>
                <div id="afforms" title="Form Styles" class="panel" data-footer='footerui'>
                <div class="formGroupHead">Standard</div>
                <form>
                    <input type="range" >
                    <input type="text" placeholder="test">
                    <input type="search" placeholder="search">
                    <textarea rows="6" placeholder="Enter your address"></textarea>
                </form>

                <div class="formGroupHead">Grouping</div>
                <form>
                    <div class="input-group">
                        <input type="text" placeholder="test">
                        <input type="search" placeholder="search">
                        <textarea rows="6" placeholder="Enter your address"></textarea>
                    </div>
                </form>
                <div class="formGroupHead">Labeled</div>
                <form>
                    <label for="test1">First Name</label><input id="test1" type="text" placeholder="test">
                    <label for="test2">Search</label><input  id="test2" type="search" placeholder="search">
                    <label for="test3">Info Name</label><textarea  id="test3" rows="6" placeholder="Enter your address"></textarea>
                </form>
        <form>
            <div class="input-group">
                <label for="test1">First Name</label><input id="test1" type="text" placeholder="test">
                <label for="test2">Search</label><input  id="test2" type="search" placeholder="search">
                <label for="test3">Info Name</label><textarea  id="test3" rows="6" placeholder="Enter your address"></textarea>

                <input type="submit" class="button" value="Submit" style='float:right;'>
            </div>
        </form>

        <div class="formGroupHead">Radios</div>
        <form>
            <div class="input-group">
                <label>Gender</label><input id="aaaa" type="radio" name="test" value="1"><label for="aaaa">Male</label>
                <input id="bbbb" type="radio" name="test" value="2"><label for="bbbb">Female</label>
                <input id="cccc" type="radio" name="test" value="3"><label for="cccc">N/A </label>
                <br style="clear:both">
                <input type="submit" class="button" value="Submit" style='float:right;'>
            </div>
        </form>
        <div class="formGroupHead">Checkbox and Button</div>
        <form>
            <div class="input-group">
                <label>Gender</label><input id="aaaaa" type="checkbox" name="test2" value="1"><label for="aaaaa">Male</label>
                <input id="bbbbb" type="checkbox" name="test2" value="2"><label for="bbbbb">Female</label>
                <input id="ccccc" type="checkbox" name="test2" value="3"><label for="ccccc">N/A </label>
                <br style="clear:both">
                <input type="submit" class="button" value="Submit" style='float:right;'>
            </div>
        </form>

        <div class="formGroupHead">Toggle Switches</div>
        <form>
            <div class="input-group">
                <label>Gender</label><input id="toggle1" type="checkbox" name="toggle1" value="1" class="toggle"><label for="toggle1" data-on="On" data-off="Off"><span></span></label>
                <input id="toggle2" type="radio" name="toggle2" value="1" class="toggle"><label for="toggle2" data-on="Yes" data-off="No"><span></span></label>
                <input id="toggle3" type="radio" name="toggle2" value="1" class="toggle"><label for="toggle3" data-on="Yes" data-off="No"><span></span></label>

            </div>
        </form>

                </div>
                <div title="Transitions" id="aftransitions" class="panel" data-footer='footerui'>
                        <h2 class='expanded' onclick='showHide(this,"AFUI_transitions");'>App Framework UI</h2>
                    <p id='AFUI_transitions'>   <strong>af.ui transitions</strong> the following are transitions built in. You can easily add/extend with your own. Set the data-transition attribute on an anchor to change the transition.</p>
                    <ul class="list">
                        <li>
                            <a href="#transition1" data-transition="slide">Slide</a>
                        </li>
                        <li>
                            <a href="#transition2" data-transition="up">Slide Up</a>
                        </li>
                        <li>
                            <a href="#transition3" data-transition="down">Slide Down</a>
                        </li>
                        <li>
                            <a href="#transition4" data-transition="pop">Pop</a>
                        </li>
                        <li>
                            <a href="#transition5" data-transition="flip">Flip</a>
                        </li>
                        <li>
                            <a href="#transition6" data-transition="fade">Fade</a>
                        </li>
                        <li>
                            <a href="#transition7">Default Modal</a>
                        </li>
                        <li>
                            <a href="#transition8">Custom Modal</a>
                        </li>
                    </ul>
                    <br/>
                    <br/>
                </div>
                <div id="uiinsetlist" title="App Framework UI Inset list" class="panel" data-footer='footerui'>
                    Inset lists have a margin and rounded corners
                    <ul class="list inset">
                        <li>
                            <a href="#uigoback">.goBack()</a>
                        </li>
                        <li>
                            <a href="#uiclearhistory">.clearHistory()</a>
                        </li>
                        <li class="divider">
                           This is a divider
                        </li>
                        <li>
                            <a href="#uiaddcontentdiv">.addContentDiv ()</a>
                        </li>
                        <li>
                            <a href="#uisettitle">.setTitle(text)</a>
                        </li>
                        <li>
                            <a href="#uisetbackbutton">.setBackButtonText()</a>
                        </li>
                        <li>
                            <a href="#uishowmask">.showMask()</a>
                        </li>
                        <li>
                            <a href="#uihidemask">.hideMask()</a>
                        </li>
                        <li>
                            <a href="#uiloadcontent">.loadContent();</a>
                        </li>
                        <li>
                            <a href="#uilaunch">.launch();</a>
                        </li>
                        <li>
                            <a href="#uiready">.ready();</a>
                        </li>
                        <li>
                            <a href="#uibadge">.updateBadge();</a>
                        </li>
                        <li>
                            <a href="#uiremovebadge">.removeBadge();</a>
                        </li>
                        <li>
                            <a href="#uitoggleheader">.toggleHeaderMenu();</a>
                        </li>
                        <li>
                            <a href="#uitoggleside">.toggleSideMenu();</a>
                        </li>
                        <li>
                            <a href="#uitogglenav">.toggleNavMenu();</a>
                        </li>
                        <li>
                            <a href="#uiactionsheet">.actionsheet()</a>
                        </li>
                        <li>
                            <a href="#uiscrolltotop">.scrollToTop()</a>
                        </li>
                        <li>
                            <a href="#uiscrolltobottom">.scrollToBottom()</a>
                        </li>
                    </ul>
                </div>
                <div id="uibuttons" title="App Framework UI Buttons" class="panel" data-footer='footerui'>
                    Below are different types of buttons<br><br>
                    <a class="button">Test</a><br><br>
                    <a class="button red previous">Test red</a><br><br>
                    <a class="button red next">Test red</a><br><br>
                    <a class="button icon pencil">Test block</a><br><br><br>
                    <a class="button block">Test block</a><br><br><br>
                    Grouped horizontal
                    <br><br>
                    <div class="button-grouped" style='width:300px'>
                        <a class="button">Test</a>
                        <a class="button">Test</a>
                        <a class="button">Test</a>
                    </div>
                    <br><br>
                    grouped vertical<br><br>
                    <div class="button-grouped vertical" style="width:200px;">
                        <a class="button icon pencil">Test</a>
                        <a class="button">Test</a>
                        <a class="button">Test</a>
                    </div>
                    <br><br>
                    Grouped flexbox and tabbed (tabbed keeps pressed state)<br><br>
                    <div class="button-grouped flex tabbed">
                        <a class="button icon cloud">App Framework Button Groups</a>
                        <a class="button">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                        <a class="button">Test</a>
                    </div>
                    <br><br>
                    Colors<br><br>
                    <a class="button yellow">Yellow</a><br><br>
                    <a class="button red">Red</a><br><br>
                    <a class="button green">Green</a><br><br>
                    <a class="button orange">Orange</a><br><br>
                    <a class="button slate">Slate</a><br><br>
                    <a class="button black">Black</a><br><br>
                    <a class="button gray">Gray</a><br><br>

                </div>
                <div id="uiapi" title="App Framework UI API" class="panel" data-pull-scroller='true' data-footer='footerui'>
                    <ul class="list">
                        <li>
                            <a href="#uigoback">.goBack()</a>
                        </li>
                        <li>
                            <a href="#uiclearhistory">.clearHistory()</a>
                        </li>
                        <li>
                            <a href="#uiaddcontentdiv">.addContentDiv ()</a>
                        </li>
                        <li>
                            <a href="#uisettitle">.setTitle(text)</a>
                        </li>
                        <li>
                            <a href="#uisetbackbutton">.setBackButtonText()</a>
                        </li>
                        <li>
                            <a href="#uishowmask">.showMask()</a>
                        </li>
                        <li>
                            <a href="#uihidemask">.hideMask()</a>
                        </li>
                        <li>
                            <a href="#uiloadcontent">.loadContent();</a>
                        </li>
                        <li>
                            <a href="#uilaunch">.launch();</a>
                        </li>
                        <li>
                            <a href="#uiready">.ready();</a>
                        </li>
                        <li>
                            <a href="#uibadge">.updateBadge();</a>
                        </li>
                        <li>
                            <a href="#uiremovebadge">.removeBadge();</a>
                        </li>
                        <li>
                            <a href="#uitoggleheader">.toggleHeaderMenu();</a>
                        </li>
                        <li>
                            <a href="#uitoggleside">.toggleSideMenu();</a>
                        </li>
                        <li>
                            <a href="#uitogglenav">.toggleNavMenu();</a>
                        </li>
                        <li>
                            <a href="#uiactionsheet">.actionsheet()</a>
                        </li>
                        <li>
                            <a href="#uiscrolltotop">.scrollToTop()</a>
                        </li>
                        <li>
                            <a href="#uiscrolltobottom">.scrollToBottom()</a>
                        </li>
                    </ul>
                </div>
                <div id="uibadge" title="updateBadge" class="panel" data-footer='footerui'>Updates a badge with the given value or creates one.
                    <br>Position can be <div class="samplecode">
                            bl - bottom left<br>
                            tl - top left<br>
                            br - bottom right<br>
                            tr - top right (default)<br>
                        </div>

                    <ul class="list">
                        <li id='libadge'>
                            <a >Badge</a>
                        </li>
                    </ul>   <div class="samplecode">
                            $.ui.updateBadge("#libadge","Badge Created","bl");
                        </div>

                    <a  onclick="$.ui.updateBadge('#libadge','Badge Created','tl');" class="button">Create Badge</a>
                    <br>
                </div>
                <div id="uiremovebadge" title="removeBadge" class="panel" data-footer='footerui'>Removes a badge.
                    <ul class="list">
                        <li id='libadge2'>
                            <a >Badge</a>
                        </li>
                    </ul>   <div class="samplecode">
                            $.ui.removeBadge("#target");
                        </div>

                    <a  onclick="$.ui.updateBadge('#libadge2','2','tl');" class="button">Create Badge</a>
                    <br>
                    <a  onclick="$.ui.removeBadge('#libadge2');" class="button">Remove Badge</a>
                </div>
                <div id="uiready" title="Ready" class="panel" data-footer='footerui'>Execute a function when $.ui.launch has completed  <div class="samplecode">
                            $.ui.ready(function(){});
                        </div>

                </div>
                <div id="uigoback" title="Go Back" class="panel" data-footer='footerui'>You can use this command to go back in history. <div class="samplecode">
                            $.ui.goBack()
                        </div>

                    <a  onclick="$.ui.goBack()" class="button">Go Back</a>
                </div>
                <div id="uilaunch" title="Launch" class="panel" data-footer='footerui'>You can use this command to launch your App Framework UI app if you set autoLaunch=false;    <div class="samplecode">
                            $.ui.autoLaunch=false;<br>
                            $.ui.golaunch()
                        </div>

                </div>
                <div id="uiclearhistory" title="Clear History" class="panel" data-footer='footerui'>You can use this command to clear the history stack manually    <div class="samplecode">
                            $.ui.clearHistory()
                        </div>

                    <a  onclick="$.ui.clearHistory()" class="button">Clear History Stack</a>
                </div>
                <div id="uiaddcontentdiv" title="Add Content Div" class="panel" data-footer='footerui'>You can use this command to add a new div programatically. This will setup scrolling, etc.   <div class="samplecode">
                            $.ui.addContentDiv(id, content,title, pullToRefresh, refreshFunc)
                        </div>

                    <script>
                        function addDiv() {
                            $.ui.addContentDiv("myAddedDiv", "I was added dynamically", "Added Div");
                            $("#addContent").show();
                            $("#addContentButton").hide();
                        }
                    </script>   <span id="addContent" style='display:none'>
                            <a href="#myAddedDiv" class="button">View new div</a>
                            <br/>
                        </span>

                    <a id='addContentButton'  onclick="addDiv();" class="button">Add Content Div</a>
                </div>
                <div id="uisettitle" title="Set Title" class="panel" data-footer='footerui'>This will set the page title of the current page programatically. It will not be retained.  <div class="samplecode">
                            $.ui.setTitle('Title Change');
                        </div>

                    <a  onclick="$.ui.setTitle('Title Change');" class="button">Change Title</a>
                </div>
                <div id="uisetbackbutton" title="Change Back Button Text" class="panel" data-footer='footerui'>This will set the back button text. You can also override this at the start, which we have done. <div class="samplecode">
                            $.ui.setBackButtonText('GO BACK');<br><br>

                            $.ui.backButtonText="Back" //override
                        </div>

                </div>
                <div id="uishowmask" title="Show Mask" class="panel" data-footer='footerui'>This will show the loading mask. You can trigger this manually for long operations. <div class="samplecode">
                            $.ui.showMask();
                        </div>

                    <script>
                        function showMask(text) {

                            $.ui.showMask(text);
                            window.setTimeout(function () {
                                $.ui.hideMask();
                            }, 2000);
                        }
                    </script>
                    <a  onclick="showMask('Mask will hide in 2 seconds')" class="button">Show Mask</a>
                </div>
                <div id="uihidemask" title="Hide Mask" class="panel" data-footer='footerui'>This will hide the loading mask. You can trigger this manually for long operations. <div class="samplecode">
                            $.ui.hideMask();
                        </div>

                    <a  onclick="$.ui.showMask()" class="button">Show Mask</a>|
                    <a  onclick="$.ui.hideMask()" class="button">Hide Mask</a>
                </div>
                <div id="uiloadcontent" title="Load Div" class="panel" data-footer='footerui'>This allows you to programatically trigger a page transition/navigation event.    <div class="samplecode">
                            $.ui.loadContent()
                        </div>

                    <a  onclick="$.ui.loadContent('uiapi',false,false,'flip')" class="button">Load $.ui API page with a flip</a>
                </div>
                <div id="uitoggleheader" title="Toggle Header" class="panel" data-footer="footerui">This allows you to hide/show the header bar if you have one. When you do this, the content area will expand up for you. <div class="samplecode">
                            $.ui.toggleHeaderMenu();
                        </div>

                    <a  onclick="$.ui.toggleHeaderMenu()" class="button">Toggle Header Menu</a>
                </div>
                <div id="uitogglenav" title="Toggle Footer Nav" class="panel" data-footer="footerui">This lets you toggle the footer navigation menu if you have one. when you do this, the content area will expand down for you.
                    <br>You can also do this by setting data-footer="none" on the panel <div class="samplecode">
                            $.ui.toggleNavMenu();
                        </div>

                    <a  onclick="$.ui.toggleNavMenu()" class="button">Toggle Nav Menu</a>
                </div>
                <div id="uitoggleside" title="Toggle Side Nav" class="panel" data-footer="footerui">This lets you toggle the side navigation menu if you have one. On a tablet, this will be persistent by default. <div class="samplecode">
                            $.ui.toggleSideNav();
                        </div>

                    <a  onclick="$.ui.toggleSideMenu();" class="button">Toggle Side Menu</a>
                </div>
                <div id="uiactionsheet" title="Actionsheet" class="panel" data-footer='footerui'>This is a shortcut to the actionsheet plugin. This will wire it correctly to App Framework UI div  <div class="samplecode">
                            $.ui.actionsheet()
                        </div>

                    <br>
                    <br>
                    <a  onclick="$.ui.actionsheet('<a href=\'javascript:;\' class=\'button\'>Test</a>')" class="button">Show a custom sheet</a>
                    <br/>
                    <br/>
                </div>
                <div id="uiscrolltotop" title="Scroll to Top" class="panel" data-footer='footerui'>This allows you to scroll to the top of a page. Scroll to the bottom for the link.   <div class="samplecode">
                            $.ui.scrollToTop(div_id)
                        </div>

                    <br>
                    <br>Keep scrolling down.
                    <br>
                    <br>
                    <br>
                    <br>Keep scrolling down.
                    <br>
                    <br>
                    <br>
                    <br>Keep scrolling down.
                    <br>
                    <br>
                    <br>
                    <br>Keep scrolling down.
                    <br>
                    <br>
                    <br>
                    <br>Keep scrolling down.
                    <br>
                    <br>
                    <br>
                    <br>Keep scrolling down.
                    <br>
                    <br>
                    <br>
                    <br>Keep scrolling down.
                    <br>
                    <br>
                    <br>
                    <br>Keep scrolling down.
                    <br>
                    <br>
                    <br>
                    <br>Keep scrolling down.
                    <br>
                    <br>
                    <br>
                    <br>Keep scrolling down.
                    <br>
                    <br>
                    <br>
                    <br>Keep scrolling down.
                    <br>
                    <br>
                    <br>
                    <br>
                    <a  onclick="$.ui.scrollToTop('uiscrolltotop')" class="button">Scroll to Top</a>
                    <br/>
                    <br/>
                </div>
                <div id="uiscrolltobottom" title="Scroll to Bottom" class="panel" data-footer='footerui'>This allows you to scroll to the top of a page. Scroll to the bottom for the link. <div class="samplecode">
                            $.ui.scrollToTop(div_id)
                        </div>

                    <a  onclick="$.ui.scrollToBottom('uiscrolltobottom')" class="button">Scroll to Bottom</a>
                    <br>
                    <br>Keep scrolling down.
                    <br>
                    <br>
                    <br>
                    <br>Keep scrolling down.
                    <br>
                    <br>
                    <br>
                    <br>Keep scrolling down.
                    <br>
                    <br>
                    <br>
                    <br>Keep scrolling down.
                    <br>
                    <br>
                    <br>
                    <br>Keep scrolling down.
                    <br>
                    <br>
                    <br>
                    <br>Keep scrolling down.
                    <br>
                    <br>
                    <br>
                    <br>Keep scrolling down.
                    <br>
                    <br>
                    <br>
                    <br>Keep scrolling down.
                    <br>
                    <br>
                    <br>
                    <br>Keep scrolling down.
                    <br>
                    <br>
                    <br>
                    <br>Keep scrolling down.
                    <br>
                    <br>
                    <br>
                    <br>Keep scrolling down.
                    <br>
                    <br>
                    <br>
                    <br>
                    <br/>
                    <br/>
                </div>
                <!-- App Framework UI> API -->
                <!-- App Framework UI> Transitions -->
                <div title="Slide" id="transition1" class="panel splashscreen" data-footer='footerui' style="padding-left:0px">
                    <div style="text-align:center;width:100%;color:white;font-size:40px">App Framework Slide Transition</div>
                </div>
                <div title="Slide Up" id="transition2" class="panel splashscreen" data-footer='footerui' style="padding-left:0px">
                     <div style="text-align:center;width:100%;color:white;font-size:40px">App Framework Slide Up Transition</div>
                </div>
                <div title="Slide Down" id="transition3" class="panel splashscreen" data-footer='footerui' style="padding-left:0px">
                     <div style="text-align:center;width:100%;color:white;font-size:40px">App Framework Slide Down Transition</div>
                </div>
                <div title="Pop" id="transition4" class="panel splashscreen" data-footer='footerui' style="padding-left:0px">
                    <div style="text-align:center;width:100%;color:white;font-size:40px">App Framework Pop Transition</div>
                </div>
                <div title="Flip" id="transition5" class="panel splashscreen" data-footer='footerui' style="padding-left:0px">
                    <div style="text-align:center;width:100%;color:white;font-size:40px">App Framework Flip Transition</div>
                </div>
                <div title="Fade" id="transition6" class="panel splashscreen" data-footer='footerui' style="padding-left:0px">
                    <div style="text-align:center;width:100%;color:white;font-size:40px">App Framework Fade Transition</div>
                </div>
                <div title="Modal" id="transition7" class="panel" data-modal="true" data-unload="unloadedPanel">
                    I'm a default modal window, with no footer and header with a close button
                </div>
                <div title="Modal" id="transition8" class="panel" data-modal="true" data-unload="unloadedPanel">
                    <header>
                        <h1>Custom Modal</h1>
                    </header>
                    I'm a custom modal window
                    <br>
                    <br>
                    A button with onclick='$.ui.hideModal()' can to be added on modal to close.
                    <br>
                    <br>
                    data-header="none" on the panel will hide the header in modal
                    <br>
                    <br>
                    <br>Check the input box out below.
                    <br>
                    <input type="text" class="af-ui-forms" id="modal_test">
                    <footer>
                        <a href="#" onclick='$.ui.hideModal()' class="icon home">Test</a>
                    </footer>
                </div>                        
                <!-- ------------------------------------------ -->
                <!-- ------------------------------------------ -->
                <!-- Plugins -->
                <div title="Plugins" id="afweb" class="panel" data-header="testheader">
                        <h2 class='expanded' onclick='showHide(this,"afweb_info");'>Plugins</h2>
                    <p id='afweb_info'>This is our plugin library of widgets to assist you with developing mobile applications. Some of these are used in App Framework UI.</p>
                    <ul class="list">
                        <li>
                            <a href="#webslider">af.scroller</a>
                        </li>

                        <li>
                            <a href="#webselect">af.selectBox</a>
                        </li>
                        <li>
                            <a href="#webpassword">af.passwordBox</a>
                        </li>
                        <li>
                            <a href="#webanimate">af.css3animate</a>
                        </li>
                        <li>
                            <a href="#webactionsheet">af.actionsheet</a>
                        </li>
                        <li>
                            <a href="#webpopup">af.popup</a>
                        </li>
                        <li>
                            <a href="#touchevents">Touch events</a>
                        </li>
                    </ul>
                    <br/>
                    <br/>
                </div>
                <!-- Plugins> af.scroller -->
                <div title="Scroller" class="panel" id="webslider">
                    <script>
                        var myScroller;
                        $.ui.ready(function () {
                            myScroller = $("#webslider").scroller(); //Fetch the scroller from cache
                            //Since this is a App Framework UI scroller, we could also do
                            // myScroller=$.ui.scrollingDivs['webslider'];
                            myScroller.addInfinite();
                            myScroller.addPullToRefresh();
                            myScroller.runCB=true;
                            $.bind(myScroller, 'scrollend', function () {
                                console.log("scroll end");
                            });

                            $.bind(myScroller, 'scrollstart', function () {
                                console.log("scroll start");
                            });
                            $.bind(myScroller,"scroll",function(position){
                                
                            })
                            $.bind(myScroller, "refresh-trigger", function () {
                                console.log("Refresh trigger");
                            });
                            var hideClose;
                            $.bind(myScroller, "refresh-release", function () {
                                var that = this;
                                console.log("Refresh release");
                                clearTimeout(hideClose);
                                hideClose = setTimeout(function () {
                                    console.log("hiding manually refresh");
                                    that.hideRefresh();
                                }, 5000);
                                return false; //tells it to not auto-cancel the refresh
                            });

                            $.bind(myScroller, "refresh-cancel", function () {
                                clearTimeout(hideClose);
                                console.log("cancelled");
                            });
                            myScroller.enable();

                            $.bind(myScroller, "infinite-scroll", function () {
                                var self = this;
                                console.log("infinite triggered");
                                $(this.el).append("<div id='infinite' style='border:2px solid black;margin-top:10px;width:100%;height:20px'>Fetching content...</div>");
                                $.bind(myScroller, "infinite-scroll-end", function () {
                                    $.unbind(myScroller, "infinite-scroll-end");
                                    self.scrollToBottom();
                                    setTimeout(function () {
                                        $(self.el).find("#infinite").remove();
                                        self.clearInfinite();
                                        $(self.el).append("<div>This was loaded via inifinite scroll<br>More Content</div>");
                                        self.scrollToBottom();
                                    }, 3000);
                                });
                            });
                            $("#webslider").css("overflow", "auto");
                            

                            
                        });
                    </script>
                                       <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta, lorem sit amet feugiat lacinia, mi dui sodales eros, id lacinia mauris urna eu est. Proin pulvinar, augue sed convallis elementum, magna diam pharetra magna, id vestibulum est eros
                        vitae ante. Ut auctor erat a tellus venenatis eu fermentum lorem scelerisque. Cras dignissim leo ornare massa sollicitudin sit amet pulvinar turpis hendrerit. Morbi hendrerit nunc eget turpis luctus id ultricies lorem consequat. Donec eu lacus sed mauris
                        sollicitudin laoreet. Cras vitae sodales diam. Donec mollis, libero ut pellentesque dignissim, risus orci ornare nisi, sed eleifend enim purus malesuada neque. Nulla tellus sem, scelerisque sed sagittis id, eleifend venenatis ligula. Vivamus placerat
                        neque sit amet metus ultricies facilisis. Nulla a odio magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed commodo quam eu enim lacinia vitae ultrices nulla mollis. Aenean eget lectus turpis, at ultrices
                        leo. Nulla vehicula magna in risus ornare vestibulum. Integer gravida magna quam. Donec augue ante, fringilla non congue eu, aliquam lacinia nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas nisl
                        ante, suscipit ut suscipit nec, dictum sit amet orci. Maecenas fermentum sapien turpis, sit amet eleifend justo. Aenean auctor interdum sem sed tincidunt. Aliquam ullamcorper malesuada fermentum. Nunc consectetur, ipsum et pulvinar ultrices, lorem nibh
                        egestas sapien, at egestas lorem metus sit amet lacus. Maecenas non feugiat orci. Curabitur imperdiet tempus lacus, volutpat fermentum diam convallis a. In hac habitasse platea dictumst. Pellentesque nec ipsum diam, at consectetur elit. Duis feugiat ullamcorper
                        libero tincidunt aliquet. Sed leo nisl, iaculis non pellentesque nec, scelerisque vel felis</div>
                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta, lorem sit amet feugiat lacinia, mi dui sodales eros, id lacinia mauris urna eu est. Proin pulvinar, augue sed convallis elementum, magna diam pharetra magna, id vestibulum est eros
                        vitae ante. Ut auctor erat a tellus venenatis eu fermentum lorem scelerisque. Cras dignissim leo ornare massa sollicitudin sit amet pulvinar turpis hendrerit. Morbi hendrerit nunc eget turpis luctus id ultricies lorem consequat. Donec eu lacus sed mauris
                        sollicitudin laoreet. Cras vitae sodales diam. Donec mollis, libero ut pellentesque dignissim, risus orci ornare nisi, sed eleifend enim purus malesuada neque. Nulla tellus sem, scelerisque sed sagittis id, eleifend venenatis ligula. Vivamus placerat
                        neque sit amet metus ultricies facilisis. Nulla a odio magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed commodo quam eu enim lacinia vitae ultrices nulla mollis. Aenean eget lectus turpis, at ultrices
                        leo. Nulla vehicula magna in risus ornare vestibulum. Integer gravida magna quam. Donec augue ante, fringilla non congue eu, aliquam lacinia nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas nisl
                        ante, suscipit ut suscipit nec, dictum sit amet orci. Maecenas fermentum sapien turpis, sit amet eleifend justo. Aenean auctor interdum sem sed tincidunt. Aliquam ullamcorper malesuada fermentum. Nunc consectetur, ipsum et pulvinar ultrices, lorem nibh
                        egestas sapien, at egestas lorem metus sit amet lacus. Maecenas non feugiat orci. Curabitur imperdiet tempus lacus, volutpat fermentum diam convallis a. In hac habitasse platea dictumst. Pellentesque nec ipsum diam, at consectetur elit. Duis feugiat ullamcorper
                        libero tincidunt aliquet. Sed leo nisl, iaculis non pellentesque nec, scelerisque vel felis</div>
                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta, lorem sit amet feugiat lacinia, mi dui sodales eros, id lacinia mauris urna eu est. Proin pulvinar, augue sed convallis elementum, magna diam pharetra magna, id vestibulum est eros
                        vitae ante. Ut auctor erat a tellus venenatis eu fermentum lorem scelerisque. Cras dignissim leo ornare massa sollicitudin sit amet pulvinar turpis hendrerit. Morbi hendrerit nunc eget turpis luctus id ultricies lorem consequat. Donec eu lacus sed mauris
                        sollicitudin laoreet. Cras vitae sodales diam. Donec mollis, libero ut pellentesque dignissim, risus orci ornare nisi, sed eleifend enim purus malesuada neque. Nulla tellus sem, scelerisque sed sagittis id, eleifend venenatis ligula. Vivamus placerat
                        neque sit amet metus ultricies facilisis. Nulla a odio magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed commodo quam eu enim lacinia vitae ultrices nulla mollis. Aenean eget lectus turpis, at ultrices
                        leo. Nulla vehicula magna in risus ornare vestibulum. Integer gravida magna quam. Donec augue ante, fringilla non congue eu, aliquam lacinia nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas nisl
                        ante, suscipit ut suscipit nec, dictum sit amet orci. Maecenas fermentum sapien turpis, sit amet eleifend justo. Aenean auctor interdum sem sed tincidunt. Aliquam ullamcorper malesuada fermentum. Nunc consectetur, ipsum et pulvinar ultrices, lorem nibh
                        egestas sapien, at egestas lorem metus sit amet lacus. Maecenas non feugiat orci. Curabitur imperdiet tempus lacus, volutpat fermentum diam convallis a. In hac habitasse platea dictumst. Pellentesque nec ipsum diam, at consectetur elit. Duis feugiat ullamcorper
                        libero tincidunt aliquet. Sed leo nisl, iaculis non pellentesque nec, scelerisque vel felis</div>
                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta, lorem sit amet feugiat lacinia, mi dui sodales eros, id lacinia mauris urna eu est. Proin pulvinar, augue sed convallis elementum, magna diam pharetra magna, id vestibulum est eros
                        vitae ante. Ut auctor erat a tellus venenatis eu fermentum lorem scelerisque. Cras dignissim leo ornare massa sollicitudin sit amet pulvinar turpis hendrerit. Morbi hendrerit nunc eget turpis luctus id ultricies lorem consequat. Donec eu lacus sed mauris
                        sollicitudin laoreet. Cras vitae sodales diam. Donec mollis, libero ut pellentesque dignissim, risus orci ornare nisi, sed eleifend enim purus malesuada neque. Nulla tellus sem, scelerisque sed sagittis id, eleifend venenatis ligula. Vivamus placerat
                        neque sit amet metus ultricies facilisis. Nulla a odio magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed commodo quam eu enim lacinia vitae ultrices nulla mollis. Aenean eget lectus turpis, at ultrices
                        leo. Nulla vehicula magna in risus ornare vestibulum. Integer gravida magna quam. Donec augue ante, fringilla non congue eu, aliquam lacinia nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas nisl
                        ante, suscipit ut suscipit nec, dictum sit amet orci. Maecenas fermentum sapien turpis, sit amet eleifend justo. Aenean auctor interdum sem sed tincidunt. Aliquam ullamcorper malesuada fermentum. Nunc consectetur, ipsum et pulvinar ultrices, lorem nibh
                        egestas sapien, at egestas lorem metus sit amet lacus. Maecenas non feugiat orci. Curabitur imperdiet tempus lacus, volutpat fermentum diam convallis a. In hac habitasse platea dictumst. Pellentesque nec ipsum diam, at consectetur elit. Duis feugiat ullamcorper
                        libero tincidunt aliquet. Sed leo nisl, iaculis non pellentesque nec, scelerisque vel felis</div>
                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta, lorem sit amet feugiat lacinia, mi dui sodales eros, id lacinia mauris urna eu est. Proin pulvinar, augue sed convallis elementum, magna diam pharetra magna, id vestibulum est eros
                        vitae ante. Ut auctor erat a tellus venenatis eu fermentum lorem scelerisque. Cras dignissim leo ornare massa sollicitudin sit amet pulvinar turpis hendrerit. Morbi hendrerit nunc eget turpis luctus id ultricies lorem consequat. Donec eu lacus sed mauris
                        sollicitudin laoreet. Cras vitae sodales diam. Donec mollis, libero ut pellentesque dignissim, risus orci ornare nisi, sed eleifend enim purus malesuada neque. Nulla tellus sem, scelerisque sed sagittis id, eleifend venenatis ligula. Vivamus placerat
                        neque sit amet metus ultricies facilisis. Nulla a odio magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed commodo quam eu enim lacinia vitae ultrices nulla mollis. Aenean eget lectus turpis, at ultrices
                        leo. Nulla vehicula magna in risus ornare vestibulum. Integer gravida magna quam. Donec augue ante, fringilla non congue eu, aliquam lacinia nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas nisl
                        ante, suscipit ut suscipit nec, dictum sit amet orci. Maecenas fermentum sapien turpis, sit amet eleifend justo. Aenean auctor interdum sem sed tincidunt. Aliquam ullamcorper malesuada fermentum. Nunc consectetur, ipsum et pulvinar ultrices, lorem nibh
                        egestas sapien, at egestas lorem metus sit amet lacus. Maecenas non feugiat orci. Curabitur imperdiet tempus lacus, volutpat fermentum diam convallis a. In hac habitasse platea dictumst. Pellentesque nec ipsum diam, at consectetur elit. Duis feugiat ullamcorper
                        libero tincidunt aliquet. Sed leo nisl, iaculis non pellentesque nec, scelerisque vel felis</div>
                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta, lorem sit amet feugiat lacinia, mi dui sodales eros, id lacinia mauris urna eu est. Proin pulvinar, augue sed convallis elementum, magna diam pharetra magna, id vestibulum est eros
                        vitae ante. Ut auctor erat a tellus venenatis eu fermentum lorem scelerisque. Cras dignissim leo ornare massa sollicitudin sit amet pulvinar turpis hendrerit. Morbi hendrerit nunc eget turpis luctus id ultricies lorem consequat. Donec eu lacus sed mauris
                        sollicitudin laoreet. Cras vitae sodales diam. Donec mollis, libero ut pellentesque dignissim, risus orci ornare nisi, sed eleifend enim purus malesuada neque. Nulla tellus sem, scelerisque sed sagittis id, eleifend venenatis ligula. Vivamus placerat
                        neque sit amet metus ultricies facilisis. Nulla a odio magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed commodo quam eu enim lacinia vitae ultrices nulla mollis. Aenean eget lectus turpis, at ultrices
                        leo. Nulla vehicula magna in risus ornare vestibulum. Integer gravida magna quam. Donec augue ante, fringilla non congue eu, aliquam lacinia nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas nisl
                        ante, suscipit ut suscipit nec, dictum sit amet orci. Maecenas fermentum sapien turpis, sit amet eleifend justo. Aenean auctor interdum sem sed tincidunt. Aliquam ullamcorper malesuada fermentum. Nunc consectetur, ipsum et pulvinar ultrices, lorem nibh
                        egestas sapien, at egestas lorem metus sit amet lacus. Maecenas non feugiat orci. Curabitur imperdiet tempus lacus, volutpat fermentum diam convallis a. In hac habitasse platea dictumst. Pellentesque nec ipsum diam, at consectetur elit. Duis feugiat ullamcorper
                        libero tincidunt aliquet. Sed leo nisl, iaculis non pellentesque nec, scelerisque vel felis</div>
                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta, lorem sit amet feugiat lacinia, mi dui sodales eros, id lacinia mauris urna eu est. Proin pulvinar, augue sed convallis elementum, magna diam pharetra magna, id vestibulum est eros
                        vitae ante. Ut auctor erat a tellus venenatis eu fermentum lorem scelerisque. Cras dignissim leo ornare massa sollicitudin sit amet pulvinar turpis hendrerit. Morbi hendrerit nunc eget turpis luctus id ultricies lorem consequat. Donec eu lacus sed mauris
                        sollicitudin laoreet. Cras vitae sodales diam. Donec mollis, libero ut pellentesque dignissim, risus orci ornare nisi, sed eleifend enim purus malesuada neque. Nulla tellus sem, scelerisque sed sagittis id, eleifend venenatis ligula. Vivamus placerat
                        neque sit amet metus ultricies facilisis. Nulla a odio magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed commodo quam eu enim lacinia vitae ultrices nulla mollis. Aenean eget lectus turpis, at ultrices
                        leo. Nulla vehicula magna in risus ornare vestibulum. Integer gravida magna quam. Donec augue ante, fringilla non congue eu, aliquam lacinia nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas nisl
                        ante, suscipit ut suscipit nec, dictum sit amet orci. Maecenas fermentum sapien turpis, sit amet eleifend justo. Aenean auctor interdum sem sed tincidunt. Aliquam ullamcorper malesuada fermentum. Nunc consectetur, ipsum et pulvinar ultrices, lorem nibh
                        egestas sapien, at egestas lorem metus sit amet lacus. Maecenas non feugiat orci. Curabitur imperdiet tempus lacus, volutpat fermentum diam convallis a. In hac habitasse platea dictumst. Pellentesque nec ipsum diam, at consectetur elit. Duis feugiat ullamcorper
                        libero tincidunt aliquet. Sed leo nisl, iaculis non pellentesque nec, scelerisque vel felis</div>
                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta, lorem sit amet feugiat lacinia, mi dui sodales eros, id lacinia mauris urna eu est. Proin pulvinar, augue sed convallis elementum, magna diam pharetra magna, id vestibulum est eros
                        vitae ante. Ut auctor erat a tellus venenatis eu fermentum lorem scelerisque. Cras dignissim leo ornare massa sollicitudin sit amet pulvinar turpis hendrerit. Morbi hendrerit nunc eget turpis luctus id ultricies lorem consequat. Donec eu lacus sed mauris
                        sollicitudin laoreet. Cras vitae sodales diam. Donec mollis, libero ut pellentesque dignissim, risus orci ornare nisi, sed eleifend enim purus malesuada neque. Nulla tellus sem, scelerisque sed sagittis id, eleifend venenatis ligula. Vivamus placerat
                        neque sit amet metus ultricies facilisis. Nulla a odio magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed commodo quam eu enim lacinia vitae ultrices nulla mollis. Aenean eget lectus turpis, at ultrices
                        leo. Nulla vehicula magna in risus ornare vestibulum. Integer gravida magna quam. Donec augue ante, fringilla non congue eu, aliquam lacinia nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas nisl
                        ante, suscipit ut suscipit nec, dictum sit amet orci. Maecenas fermentum sapien turpis, sit amet eleifend justo. Aenean auctor interdum sem sed tincidunt. Aliquam ullamcorper malesuada fermentum. Nunc consectetur, ipsum et pulvinar ultrices, lorem nibh
                        egestas sapien, at egestas lorem metus sit amet lacus. Maecenas non feugiat orci. Curabitur imperdiet tempus lacus, volutpat fermentum diam convallis a. In hac habitasse platea dictumst. Pellentesque nec ipsum diam, at consectetur elit. Duis feugiat ullamcorper
                        libero tincidunt aliquet. Sed leo nisl, iaculis non pellentesque nec, scelerisque vel felis</div>
                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta, lorem sit amet feugiat lacinia, mi dui sodales eros, id lacinia mauris urna eu est. Proin pulvinar, augue sed convallis elementum, magna diam pharetra magna, id vestibulum est eros
                        vitae ante. Ut auctor erat a tellus venenatis eu fermentum lorem scelerisque. Cras dignissim leo ornare massa sollicitudin sit amet pulvinar turpis hendrerit. Morbi hendrerit nunc eget turpis luctus id ultricies lorem consequat. Donec eu lacus sed mauris
                        sollicitudin laoreet. Cras vitae sodales diam. Donec mollis, libero ut pellentesque dignissim, risus orci ornare nisi, sed eleifend enim purus malesuada neque. Nulla tellus sem, scelerisque sed sagittis id, eleifend venenatis ligula. Vivamus placerat
                        neque sit amet metus ultricies facilisis. Nulla a odio magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed commodo quam eu enim lacinia vitae ultrices nulla mollis. Aenean eget lectus turpis, at ultrices
                        leo. Nulla vehicula magna in risus ornare vestibulum. Integer gravida magna quam. Donec augue ante, fringilla non congue eu, aliquam lacinia nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas nisl
                        ante, suscipit ut suscipit nec, dictum sit amet orci. Maecenas fermentum sapien turpis, sit amet eleifend justo. Aenean auctor interdum sem sed tincidunt. Aliquam ullamcorper malesuada fermentum. Nunc consectetur, ipsum et pulvinar ultrices, lorem nibh
                        egestas sapien, at egestas lorem metus sit amet lacus. Maecenas non feugiat orci. Curabitur imperdiet tempus lacus, volutpat fermentum diam convallis a. In hac habitasse platea dictumst. Pellentesque nec ipsum diam, at consectetur elit. Duis feugiat ullamcorper
                        libero tincidunt aliquet. Sed leo nisl, iaculis non pellentesque nec, scelerisque vel felis</div>
                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta, lorem sit amet feugiat lacinia, mi dui sodales eros, id lacinia mauris urna eu est. Proin pulvinar, augue sed convallis elementum, magna diam pharetra magna, id vestibulum est eros
                        vitae ante. Ut auctor erat a tellus venenatis eu fermentum lorem scelerisque. Cras dignissim leo ornare massa sollicitudin sit amet pulvinar turpis hendrerit. Morbi hendrerit nunc eget turpis luctus id ultricies lorem consequat. Donec eu lacus sed mauris
                        sollicitudin laoreet. Cras vitae sodales diam. Donec mollis, libero ut pellentesque dignissim, risus orci ornare nisi, sed eleifend enim purus malesuada neque. Nulla tellus sem, scelerisque sed sagittis id, eleifend venenatis ligula. Vivamus placerat
                        neque sit amet metus ultricies facilisis. Nulla a odio magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed commodo quam eu enim lacinia vitae ultrices nulla mollis. Aenean eget lectus turpis, at ultrices
                        leo. Nulla vehicula magna in risus ornare vestibulum. Integer gravida magna quam. Donec augue ante, fringilla non congue eu, aliquam lacinia nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas nisl
                        ante, suscipit ut suscipit nec, dictum sit amet orci. Maecenas fermentum sapien turpis, sit amet eleifend justo. Aenean auctor interdum sem sed tincidunt. Aliquam ullamcorper malesuada fermentum. Nunc consectetur, ipsum et pulvinar ultrices, lorem nibh
                        egestas sapien, at egestas lorem metus sit amet lacus. Maecenas non feugiat orci. Curabitur imperdiet tempus lacus, volutpat fermentum diam convallis a. In hac habitasse platea dictumst. Pellentesque nec ipsum diam, at consectetur elit. Duis feugiat ullamcorper
                        libero tincidunt aliquet. Sed leo nisl, iaculis non pellentesque nec, scelerisque vel felis</div>
                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta, lorem sit amet feugiat lacinia, mi dui sodales eros, id lacinia mauris urna eu est. Proin pulvinar, augue sed convallis elementum, magna diam pharetra magna, id vestibulum est eros
                        vitae ante. Ut auctor erat a tellus venenatis eu fermentum lorem scelerisque. Cras dignissim leo ornare massa sollicitudin sit amet pulvinar turpis hendrerit. Morbi hendrerit nunc eget turpis luctus id ultricies lorem consequat. Donec eu lacus sed mauris
                        sollicitudin laoreet. Cras vitae sodales diam. Donec mollis, libero ut pellentesque dignissim, risus orci ornare nisi, sed eleifend enim purus malesuada neque. Nulla tellus sem, scelerisque sed sagittis id, eleifend venenatis ligula. Vivamus placerat
                        neque sit amet metus ultricies facilisis. Nulla a odio magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed commodo quam eu enim lacinia vitae ultrices nulla mollis. Aenean eget lectus turpis, at ultrices
                        leo. Nulla vehicula magna in risus ornare vestibulum. Integer gravida magna quam. Donec augue ante, fringilla non congue eu, aliquam lacinia nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas nisl
                        ante, suscipit ut suscipit nec, dictum sit amet orci. Maecenas fermentum sapien turpis, sit amet eleifend justo. Aenean auctor interdum sem sed tincidunt. Aliquam ullamcorper malesuada fermentum. Nunc consectetur, ipsum et pulvinar ultrices, lorem nibh
                        egestas sapien, at egestas lorem metus sit amet lacus. Maecenas non feugiat orci. Curabitur imperdiet tempus lacus, volutpat fermentum diam convallis a. In hac habitasse platea dictumst. Pellentesque nec ipsum diam, at consectetur elit. Duis feugiat ullamcorper
                        libero tincidunt aliquet. Sed leo nisl, iaculis non pellentesque nec, scelerisque vel felis</div>
                </div>

                <!-- Plugins> af.selectBox -->
                <div title="Select" class="panel" id="webselect" scrolling="yes">
                    <script>
                        var init_select = function () {
                           // $.selectBox.getOldSelects("selectTest");
                           // $.selectBox.getOldSelects("selectTest2");
                        };
                        window.addEventListener("load", init_select, false);
                    </script>On android devices, this will change select boxes to a custom control to fix a bug in Webkit with css3 transform3d.
                    <br />
                    <br />
                    <div id="selectTest" style="-webkit-transform: translate3d(0, 0, 0)">
                        <!-- content goes here-->
                        <br>    <span>
                                                    <select id="test" style="-webkit-appearance: listbox;">
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </span>
                        <br />
                        <br />
                        <br />
                        <br />
                    </div>
                    <div id="selectTest2" style="position:relative;top:10;">    <span>
                                                    <select id="test2">
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                        <option value="11">1One</option>
                                                        <option value="22">2Two</option>
                                                        <option value="33">3Three</option>
                                                        <option value="43">4Three</option>
                                                        <option value="53">5Three</option>
                                                        <option value="63">6Three</option>
                                                        <option value="73">7Three</option>
                                                    </select>
                                                </span>

                        <br>
                        <br>
                        <br>This is disabled
                        <br>    <span>
                                                    <select id="test3" disabled>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                        <option value="11">1One</option>
                                                        <option value="22">2Two</option>
                                                        <option value="33">3Three</option>
                                                        <option value="43">4Three</option>
                                                        <option value="53">5Three</option>
                                                        <option value="63">6Three</option>
                                                        <option value="73">7Three</option>
                                                    </select>
                                                </span>

                        <br>
                        <br>
                        <br>This is a multi select box test
                        <br>    <span>
                                                    <select id="test4" multiple="multiple">
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                        <option value="11">1One</option>
                                                        <option value="22">2Two</option>
                                                        <option value="33">3Three</option>
                                                        <option value="43">4Three</option>
                                                        <option value="53">5Three</option>
                                                        <option value="63">6Three</option>
                                                        <option value="73">7Three</option>
                                                    </select>
                                                </span>

                    </div>
                    <br/>
                    <br/>This is just some filler content
                    <br>
                    <br>This is just some filler content
                    <br>
                    <br>This is just some filler content
                    <br>
                    <br>
                </div>
                <!-- Plugins> af.passwordBox -->
                <div title="Password" class="panel" id="webpassword">
                    <script>
                        var pwFixer = new $.passwordBox();
                        var init_password = function () {
                            var succ = pwFixer.getOldPasswords("selectPassword");

                            $("#showPassword").show();
                        };
                        window.addEventListener("load", init_password, false);

                        var pwState = false;

                        function ShowHidePW() {

                            if (!pwState) {
                                pwFixer.changePasswordVisiblity(1, "one");
                                pwState = true;
                            } else {
                                pwFixer.changePasswordVisiblity(0, "one");
                                pwState = false;
                            }
                        }
                    </script>On android devices, this replaces password boxes with a custom control to fix the Webkit css3 transform3d bug. you can also show/hide passwords.
                    <br />
                    <br />
                    <div id="selectPassword" style=" -webkit-transform: translate3d(0, 0, 0)">  <span><input type="password" id="one" name="one" placeholder="Password" style="width:200px;color:black;"></span>

                        <br />  <span id="showPassword" style="display:none">
                         <div class="input">
                            <label>Toggle:</label><input type="checkbox" id="showpw" onClick="ShowHidePW()"> <label for="showpw" ></label></span>
                        </div>

                       

                    </div>
                </div>
                <!-- Plugins> af.css3animate -->
                <div title="Animate" class="panel" id="webanimate" style="overflow:hidden;">
                    <script>
                        function moveOnce() {
                            $("#animate").css3Animate({
                                width: "100px",
                                height: "100px",
                                x: "20%",
                                y: "30%",
                                time: "1000ms",
                                opacity: .5,
                                callback: function () {
                                    reset()
                                }
                            });
                        }

                        function reset() {
                            $("#animate").css3Animate({
                                y: 0,
                                x: 0,
                                opacity: 1,
                                width: "50px",
                                height: "50px",
                                time: "0ms"
                            });
                        }

                        function moveTwice() {
                            $("#animate").css3Animate({
                                x: 20,
                                y: 30,
                                time: "300ms",
                                callback: function () {
                                    window.setTimeout(function () {
                                        $("#animate").css3Animate({
                                            x: 20,
                                            y: 30,
                                            time: "500ms",
                                            previous: true,
                                            callback: function () {
                                                reset();
                                            }
                                        });
                                    }, 300);

                                }
                            });
                        }

                        function animQueue() {
                            var tmp = new $.css3AnimateQueue();
                            tmp.push({
                                id: "animate",
                                x: 20,
                                y: 30,
                                time: "300ms"
                            });
                            tmp.push({
                                id: "animate",
                                x: 20,
                                y: 30,
                                time: "500ms",
                                previous: true
                            });
                            tmp.push({
                                id: "animate",
                                x: 0,
                                y: 0,
                                time: "0ms"
                            });
                            tmp.push({
                                id: "animate",
                                x: 20,
                                y: 30,
                                time: "300ms"
                            });
                            tmp.push({
                                id: "animate",
                                x: 20,
                                y: 30,
                                time: "500ms",
                                previous: true
                            });
                            tmp.push(function () {
                                reset()
                            });
                            tmp.run();
                        }
                    </script>
                    <a class="button"  onClick="moveOnce()">Move Once</a>|
                    <a class="button"  onClick="moveTwice()">Move Twice</a>|
                    <a class="button"  onClick="animQueue()">Queue</a>
                    <br />
                    <div id="animate" style="width: 50px; height: 50px; border: 1px solid black; background: red"></div>
                </div>
                <!-- ------------------------------------------ -->
                <!-- Plugins> afActionSheet -->
                <div title="Action Sheet" class="panel" id="webactionsheet">
                    <script>
                        function showCustomHtmlSheet() {
                            $("#afui").actionsheet('<a  >Back</a><a  onclick="alert(\'hi\');" >Show Alert 3</a><a  onclick="alert(\'goodbye\');">Show Alert 4</a>');
                        }

                        function showCustomJsonSheet() {
                            $("#afui").actionsheet(
                            [{
                                text: 'back',
                                cssClasses: 'red',
                                handler: function () {
                                    $.ui.goBack();
                                }
                            }, {
                                text: 'show alert 5',
                                cssClasses: 'blue',
                                handler: function () {
                                    alert("hi");
                                }
                            }, {
                                text: 'show alert 6',
                                cssClasses: '',
                                handler: function () {
                                    alert("goodbye");
                                }
                            }]);
                        }
                    </script>This creates a slide in action sheet from the bottom.
                    <br />
                    <br />
                    <a class="button"  onClick="showCustomHtmlSheet()">Show Custom Html Sheet</a>
                    <a class="button"  onClick="showCustomJsonSheet()">Show Custom Json Sheet</a>
                </div>
                <div title="Popup" class="panel" id="webpopup">
                    <script>
                        function showPopup1() {
                            $("#afui").popup("I'm replacing an alert box");
                        }

                        function showPopup2() {
                            $("#afui").popup({
                                title: "Alert! Alert!",
                                message: "This is a test of the emergency alert system!! Don't PANIC!",
                                cancelText: "Cancel me",
                                cancelCallback: function () {
                                    console.log("cancelled");
                                },
                                doneText: "I'm done!",
                                doneCallback: function () {
                                    console.log("Done for!");
                                },
                                cancelOnly: false
                            });
                        }

                        function showPopup3() {
                            $("#afui").popup({
                                title: "Login",
                                message: "Username: <input type='text' class='af-ui-forms'><br>Password: <input type='text' class='af-ui-forms' style='webkit-text-security:disc'>",
                                cancelText: "Cancel",
                                cancelCallback: function () {},
                                doneText: "Login",
                                doneCallback: function () {
                                    alert("Logging in")
                                },
                                cancelOnly: false
                            });
                        }
                    </script>This creates a popup dialog to interact with users. You can pass in an HTML string, which acts (and replaces) an alert dialog. You can also pass in an object to get more interaction.
                    <br>
                    <br>
                    <a class="button" onClick="showPopup1()">Alert style diaglog</a>
                    <br>
                    <a class="button" onClick="showPopup2()">Detailed ineraction</a>
                    <br>
                    <a class="button" onClick="showPopup3()">HTML markup</a>
                    <br>
                </div>
                <div class="panel" title="touch events" id="touchevents">
                <script>
                $(document).ready(function(){
                    $("#taptest").bind("tap",function(){
                        alert("I was tapped");
                    })
                    $("#singletaptest").bind("singleTap",function(){
                        alert("I was single tapped");
                    })
                    $("#longtaptest").bind("longTap",function(){
                        alert("I was a long tap");
                    })
                    $("#doubletaptest").bind("doubleTap",function(){
                        alert("I was a double tap");
                    })
                    $("#swipetest").bind("swipe",function(){
                        alert("I was a swiped");
                    })
                });
                </script>
                    <h2>Touch Events</h2>

                    <ul class="list">
                        <li><a id='taptest' >Tap Test</a></li>
                        <li><a id='longtaptest' >Long Tap Test</a></li>
                        <li><a id='singletaptest' >Single Tap Test</a></li>
                        <li><a id='doubletaptest' >Double Tap Test</a></li>
                        <li><a id='swipetest' >Swipe Test</a></li>
                    </ul>
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
        </div>
        
            <footer id='footerui'>
                <a href="#main" id='navbar_home' class='icon home'>Home <span class='af-badge lr'>6</span></a>
                <a href="#aftransitions" id='navbar_js' class="icon stack">Trans</a>
                <a href="#afuidemo" id='navbar_ui' class="icon picture">ui</a>
                <a href="#uiapi" id='navbar_plugins' class="icon info">api</a>
            </footer>
            <footer id='footerui2'>
                <a href="#main" id='navbar_home' class='icon home'>Home <span class='af-badge lr'>6</span></a>
                <a href="#aftransitions" id='navbar_js' class="icon stack">Trans</a>
                <a href="#afuidemo" id='navbar_ui' class="icon picture">ui</a>
                <a href="#uiapi" id='navbar_plugins' class="icon info">api</a>
            </footer>
            <header id="testheader">
                <a id="backButton" onclick="$.ui.goBack()" class='button'>Back</a>
                    <h1>Custom Header</h1>
                <a class="button icon settings" style="float:right">Button</a>
            </header>
            <!-- ------------------------------------------ -->
            <nav>
                <ul class="list">
                    <li class="divider" class="icon home">Home</li>
                    <li>
                        <a href="#af">Selectors</a>
                    </li>
                 <li class="divider">UI</li>
                    <li>
                        <a href="#aftransitions">Transitions</a>
                    </li>
                    <li>
                        <a href="#afuidemo">UI Elements</a>
                    </li>
                    <li>
                        <a href="#uiapi">APIs</a>
                    </li>
                 <li class="divider">Plugins</li>
                    <li>
                        <a href="#webslider">Scroller</a>
                    </li>
                    <li>
                        <a href="#webanimate">CSS3 animation</a>
                    </li>
                     <li>
                        <a href="#webactionsheet">Action sheet</a>
                    </li>

                 <li class="divider">Menus</li>
                    <li>
                        <a  onclick="$.ui.toggleHeaderMenu();">Toggle Header</a>
                    </li>
                    <li>
                        <a  onclick="$.ui.toggleSideMenu()">Toggle Side</a>
                    </li>
                    <li>
                        <a  onclick="$.ui.toggleNavMenu()">Toggle Footer</a>
                    </li>
                </ul>
            </nav>
            <nav id="menu_AppFramework">
                <ul class="list">
                     <li class="divider">Selector</li>
                    <li>
                        <a href="#af1">$()</a>
                    </li>
                    <li>
                        <a href="#af2">$().length()</a>
                    </li>
                    <li>
                        <a href="#af3">$().find()</a>
                    </li>
                    <li>
                        <a href="#af4">$().html()</a>
                    </li>
                    <li>
                        <a href="#af5">$().text()</a>
                    </li>
                    <li>
                        <a href="#af6">$().css()</a>
                    </li>
                    <li>
                        <a href="#af7">$().empty()</a>
                    </li>
                    <li>
                        <a href="#af8">$().hide()</a>
                    </li>
                    <li>
                        <a href="#af9">$().show()</a>
                    </li>
                    <li>
                        <a href="#af10">$().toggle()</a>
                    </li>
                    <li>
                        <a href="#af11">$().val()</a>
                    </li>
                    <li>
                        <a href="#af12">$().attr()</a>
                    </li>
                    <li>
                        <a href="#af13">$().removeAttr()</a>
                    </li>
                    <li>
                        <a href="#af14">$().remove()</a>
                    </li>
                    <li>
                        <a href="#af15">$().addClass()</a>
                    </li>
                    <li>
                        <a href="#af16">$().removeClass()</a>
                    </li>
                    <li>
                        <a href="#af17">$().hasClass()</a>
                    </li>
                    <li>
                        <a href="#af18">$().bind()</a>
                    </li>
                    <li>
                        <a href="#af19">$().unbind()</a>
                    </li>
                    <li>
                        <a href="#af20">$().trigger()</a>
                    </li>
                    <li>
                        <a href="#af21">$().append()</a>
                    </li>
                    <li>
                        <a href="#af22">$().prepend()</a>
                    </li>
                    <li>
                        <a href="#af32">$().get(0)</a>
                    </li>
                    <li>
                        <a href="#af31">$().offset()</a>
                    </li>
                    <li>
                        <a href="#afparent">$().parent()</a>
                    </li>
                    <li>
                        <a href="#af33">$().isArray()</a>
                    </li>
                    <li>
                        <a href="#af34">$().isFunction()</a>
                    </li>
                    <li>
                        <a href="#af23">$.jsonP()</a>
                    </li>
                    <li>
                        <a href="#af24">$.ajax()</a>
                    </li>
                    <li>
                        <a href="#af25">$.get(0)</a>
                    </li>
                    <li>
                        <a href="#af26">$.post()</a>
                    </li>
                    <li>
                        <a href="#af27">$.getJSON()</a>
                    </li>
                    <li>
                        <a href="#af28">$.param()</a>
                    </li>
                    <li>
                        <a href="#af29">$.parseJSON()</a>
                    </li>
                    <li>
                        <a href="#af30">$.os</a>
                    </li>
                </ul>
            </nav>
        </div>

    </body>
    <script type="text/javascript" src="{{ asset('/Js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('Js/phone.js') }}"></script>
    <script>
        //男性客户头像图片与女性客户头像图片
        var sex_headerImg = {
            '0':"{{ asset('Images/woman_header.png') }}",
            '1':"{{ asset('Images/man_header.png') }}"
        };

        // 客户页面加载事件
        function loadedCustomer() {
            change_footer_img();
            $('#navbar_measure>img').attr('src','../Images//t_measure.png');

            if(is_loadedCustomer){
                return false;
            }
            var aa = "{{ asset('Images/recycle.png') }}";
            //临时客户列表
            $.ajax({
                url: 'get_customer',
                type: 'POST',
                data: {
                    designer: $.cookie('user_id')
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function (result) {
                    result = JSON.parse(result);
                    $('.temporary_customer').html("");
                    if (result.status && result.retData.length > 0) {
                        sessionStorage.setItem('temporary_customer', JSON.stringify(result.retData));
                        for (var i = 0; i < result.retData.length; i++) {
                            $('.temporary_customer').append('<li value="'+result.retData[i].id+'"><div class="list_header_portrait" ><img src="'+sex_headerImg[result.retData[i].sex]+'"></div><div class="message_title"><span class="username">'+result.retData[i].username+'</span><span class="contact">'+result.retData[i].telephone+'</span></div><button class="check_to_del"><img src="'+aa+'"></button></li>');
                        }
                        //客户列表绑定左滑动事件
                        $('.customer_list>li:not(.loss_customer)').bind('swipeLeft',del_customer);
                        //客户列表绑定点击事件
                        $('.customer_list>li:not(.loss_customer)').bind('click',customer_click);
                        //删除按钮绑定点击事件
                        $('.check_to_del').bind('click',del_customer_do);
                    }else{
                        $('.temporary_customer').append('<li class="loss_customer">暂无客户!</li>');
                    }
                }
            });

            //已量尺客户跟未量尺客户
            $.ajax({
                url: 'http://roco.honghaiweb.com/Api/index.php/App/Customer/clientList',
                type: 'POST',
                data: {
                    session_id:$.cookie('session_id'),
                    auth_key:$.cookie('auth_key')
                },
                success: function (result) {
                    result = JSON.parse(result);
                    if (result.status == '101') {
                        window.location.href = '/login';
                    }
                    $('.old_customer').html("");
                    $('.waiting_customer').html("");
                    if (result.status && result.status != 102 && result.retData.length > 0) {
                        sessionStorage.setItem('customers', JSON.stringify(result.retData));
                        for (var i = 0; i < result.retData.length; i++) {
                            if(!result.retData[i].measure_time){
                                $('.waiting_customer').append('<li value="'+result.retData[i].id+'"><div class="list_header_portrait" ><img src="'+sex_headerImg[result.retData[i].sex]+'"></div><div class="message_title"><span class="username">'+result.retData[i].username+'</span><span class="contact">'+result.retData[i].telephone+'</span></div><button class="check_to_del"><img src="'+aa+'"></button></li>');
                            }
                            if(result.retData[i].measure_time){
                                $('.old_customer').append('<li value="'+result.retData[i].id+'"><div class="list_header_portrait" ><img src="'+sex_headerImg[result.retData[i].sex]+'"></div><div class="message_title"><span class="username">'+result.retData[i].username+'</span><span class="contact">'+result.retData[i].telephone+'</span></div><button class="check_to_del"><img src="'+aa+'"></button></li>');
                            }
                        }
                        //客户列表绑定左滑动事件
                        $('.customer_list>li:not(.loss_customer)').bind('swipeLeft',del_customer);
                        //客户列表绑定点击事件
                        $('.customer_list>li:not(.loss_customer)').bind('click',customer_click);
                    }
                    if($('.old_customer').html() == ''){
                        $('.old_customer').append('<li class="loss_customer">暂无客户!</li>');
                    }
                    if($('.waiting_customer').html() == ''){
                        $('.waiting_customer').append('<li class="loss_customer">暂无客户!</li>');
                    }
                }
            });
            $('.customer_classify>li[value=2]').trigger("click");
            is_loadedCustomer = true;
        }

    </script>
</html>