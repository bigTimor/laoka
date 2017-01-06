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
function customer_click() {
    var a = $('.is_del_customer').val();
    var b = $(this).val();
    if(a && a != b){
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

//提交编辑客户信息
function edit_customer_do() {
    
}

//改变footer栏图片
function change_footer_img() {
    $('#navbar_measure>img').attr('src','../Images/f_measure.png');
    $('#navbar_scheme>img').attr('src','../Images//f_scheme.png');
    $('#navbar_activity>img').attr('src','../Images//f_activity.png');
    $('#navbar_private>img').attr('src','../Images//f_private.png');
}