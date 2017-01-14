/******************  jqmobi框架设置  *********************/
$.ui.animateHeaders = false;        //禁止header切换动画

$.ui.backButtonText = " ";          //设置后退按钮文字


/******************  设置全局变量  ***********************/
var info = {"customer_id":-1,"theme_id":-1,"match_id":-1,"room_id":-1};
var is_loadedCustomer = false;




/*******************  绑定事件    **********************/

//客户分类列表绑定点击事件
$('.customer_classify>li').bind('click',show_customer_list);



/******************      事件      ********************/

//量房加载事件
function loadLf() {
    lf.goin();
}

//随手量加载事件
function loadSsl() {
    ssl.goin();
}

// 显示客户列表
function show_customer_list() {
    var a = $('.customer_classify_check_on').val();
    var b = $(this).val();
    if(a != 'undefind' &&  a==b ){
        return false;
    }
    if(a != 'undefind'){
        $('.customer_classify_check_on').removeClass('customer_classify_check_on');
    }
    $(this).addClass('customer_classify_check_on');
    $('.customer_list').hide();
    switch (b){
        case 1:
            $('.temporary_customer').show();
            break;
        case 2:
            $('.waiting_customer').show();
            break;
        case 3:
            $('.old_customer').show();
            break;
    }
}

//客户列表滑动事件
function del_customer() {
    $('.is_del_customer').removeClass('is_del_customer');
    $(this).addClass('is_del_customer');
}

//客户列表点击事件
function customer_click(event) {
    var a = $('.is_del_customer').val();
    var b = $(this).val();
    if(a > -1){
        $('.is_del_customer').removeClass('is_del_customer');
    }else{
        var source = $('.customer_classify_check_on').val();
        if(source == 1){
           var data = JSON.parse(sessionStorage.getItem('temporary_customer'));
        }else{
            var data = JSON.parse(sessionStorage.getItem('customers'));
            if(source == 2){
                $('#customer_edit').find('.go_measure').text('需求核对');
            }
        }
        for(var i=0;i<data.length;i++){
            if(data[i].id == b){
                console.log(data[i]);
                var sex = new Array();
                sex[0] = '女';
                sex[1] = '男';
                $('input[name=customer_id]').val(data[i].id);
                $('#customer_username').text(data[i].username);
                $('#customer_sex').text(sex[data[i].sex]);
                $('#customer_address').text(data[i].address);
                $('#customer_telephone').text(data[i].telephone);
                $('#customer_wetchat').text(data[i].wetchat);
                $('#customer_measure_time').text(data[i].measure_time);
                $('#customer_budget').text(data[i].budget);
                $('#customer_scheme_time').text(data[i].scheme_time);
            }
        }
        $.ui.loadContent('#customer_details',false,false,'slide');
    }
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

//点击编辑客户事件
function go_editor_button() {
    if($('input[name=customer_id]').val()){
        $('input[name=edit_id]').val($('input[name=customer_id]').val());
        $('input[name=edit_username]').val($('#customer_username').text());
        $('input[name=edit_address]').val($('#customer_address').text());
        $('input[name=edit_telephone]').val($('#customer_telephone').text());
        $('input[name=edit_wetchat]').val($('#customer_wetchat').text());
        $('input[name=edit_measure_time]').val($('#customer_measure_time').text());
        $('input[name=edit_scheme_time]').val($('#customer_scheme_time').text());
        $.ui.loadContent('#customer_edit',false,false,'slide');
    }
}

//添加临时客户 sex change事件
$('input:radio[name=sex]').change(function () {
    $('.sex_true').hide();
    $(this).parent().find('.sex_true').show();
});

//添加临时客户,选择预算
function choose_dudget() {
    $("#afui").actionsheet('<a  class="cancel">选择装修预算</a><div class="choose_budget"><label><input type="radio" name="budget" value="1">5-8万以下</label> <label><input type="radio" name="budget" value="2">8-12万</label> <label><input type="radio" name="budget" value="3">12-18万</label> <label><input type="radio" name="budget" value="4">18-25万</label> <label><input type="radio" name="budget" value="5">其它</label></div>');
    $('input[name=budget]').on('change',function () {
        $('.budget').text($(this).parent().text());
        $('input[name=hidden_budget]').val($(this).val());
    })
}

//选择风格下一步
function next_measure() {
    var style_id = $('.pitch_on').val();
    show_collocation(style_id);
}


//改变footer栏图片
function change_footer_img() {
    $('#navbar_measure>img').attr('src','../Images/f_measure.png');
    $('#navbar_scheme>img').attr('src','../Images//f_scheme.png');
    $('#navbar_activity>img').attr('src','../Images//f_activity.png');
    $('#navbar_private>img').attr('src','../Images//f_private.png');
}

//客户详细信息页面 进入量尺/需求确认按钮点击事件
function portal() {
    var val = $(this).text();
    if(val == '需求核对'){
        $.ui.loadContent('#measure_log',false,false,'slide');
    }else{
        $.ui.loadContent('#go_measurement',false,false,'slide');
        info.customer_id = $('input[name=customer_id]').val();
    }
}
